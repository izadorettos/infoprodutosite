<?php
if (session_status() === PHP_SESSION_NONE) {

    session_start();
}
require_once 'db.php';

// Permite ignorar o redirecionamento se o parâmetro 'home' estiver presente
if (isset($_GET['home'])) {
    return;
}

// Se o usuário já está logado na sessão ou tem um cookie válido, redireciona para aulas.php

if (isset($_SESSION['user_id'])) {
    header("Location: aulas.php");
    exit;
}

if (isset($_COOKIE['remember_me'])) {
    $token = $_COOKIE['remember_me'];
    $stmt = $pdo->prepare("SELECT id, nome FROM usuarios WHERE token_login = ?");
    $stmt->execute([$token]);
    $user = $stmt->fetch();

    if ($user) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['nome'];
        header("Location: aulas.php");
        exit;
    }
}
