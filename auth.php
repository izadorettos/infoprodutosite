<?php
session_start();
require_once 'db.php';

// Se o usuário não está logado na sessão, verifica o cookie "Lembrar-me"
if (!isset($_SESSION['user_id']) && isset($_COOKIE['remember_me'])) {
    $token = $_COOKIE['remember_me'];

    $stmt = $pdo->prepare("SELECT id, nome FROM usuarios WHERE token_login = ?");
    $stmt->execute([$token]);
    $user = $stmt->fetch();

    if ($user) {
        // Redefine a sessão com os dados do usuário
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['nome'];
    } else {
        // Token inválido ou expirado, remove o cookie
        setcookie('remember_me', '', time() - 3600, "/", "", false, true);
    }
}

// Verifica se o usuário está logado (seja pela sessão original ou pelo cookie)
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
