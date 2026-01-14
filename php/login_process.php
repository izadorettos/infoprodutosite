<?php
session_start();
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $senha = $_POST['password'] ?? '';

    if (!empty($email) && !empty($senha)) {
        // Buscar também o status de pagamento
        $stmt = $pdo->prepare("SELECT id, nome, senha, pago FROM usuarios WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($senha, $user['senha'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['nome'];
            $_SESSION['usuario_pago'] = $user['pago']; // Cache do status de pagamento

            // Funcionalidade Lembrar-me
            if (isset($_POST['lembrar'])) {
                $token = bin2hex(random_bytes(32));
                
                // Salva o token no banco de dados
                $stmt = $pdo->prepare("UPDATE usuarios SET token_login = ? WHERE id = ?");
                $stmt->execute([$token, $user['id']]);

                // Define o cookie por 30 dias (HttpOnly para segurança)
                setcookie('remember_me', $token, time() + (30 * 24 * 60 * 60), "/", "", false, true);
            }

            header("Location: aulas.php");
            exit;
        } else {

            $error = "E-mail ou senha incorretos.";
            header("Location: login.php?error=" . urlencode($error));
            exit;
        }
    }
}
?>
