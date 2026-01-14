<?php
session_start();
require_once 'db.php';

// Verificar se o pagamento foi feito antes de registrar
if (!isset($_SESSION['pago']) || $_SESSION['pago'] !== true) {
    header("Location: checkout.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $senha = $_POST['password'] ?? '';

    if (empty($nome) || empty($email) || empty($senha)) {
        header("Location: cadastro.php?error=" . urlencode("Todos os campos são obrigatórios."));
        exit;
    }

    try {
        // Verificar se o e-mail já existe
        $stmt = $pdo->prepare("SELECT id FROM usuarios WHERE email = ?");
        $stmt->execute([$email]);
        
        if ($stmt->fetch()) {
            header("Location: cadastro.php?error=" . urlencode("Este e-mail já está em uso."));
            exit;
        }

        // Criptografar a senha
        $hash = password_hash($senha, PASSWORD_DEFAULT);

        // Inserir novo usuário com status_pagamento 'pago' (Garantia Dupla)
        $sql = "INSERT INTO usuarios (nome, email, senha, status_pagamento) VALUES (?, ?, ?, 'pago')";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nome, $email, $hash]);

        // Limpar a sessão de pagamento e token após o uso para segurança
        unset($_SESSION['pago']);
        unset($_SESSION['secure_token']);

        // Redirecionar para login com mensagem de sucesso
        $msg = "Conta criada com sucesso! Faça login para continuar.";
        header("Location: login.php?success=" . urlencode($msg));
        exit;

    } catch (PDOException $e) {
        $error = "Erro no banco de dados. Tente novamente mais tarde.";
        header("Location: cadastro.php?error=" . urlencode($error));
        exit;
    }
} else {
    header("Location: cadastro.php");
    exit;
}
?>
