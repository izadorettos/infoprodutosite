<?php
session_start();
require_once 'db.php';

// Limpar token no banco de dados se o usuário estiver logado
if (isset($_SESSION['user_id'])) {
    $stmt = $pdo->prepare("UPDATE usuarios SET token_login = NULL WHERE id = ?");
    $stmt->execute([$_SESSION['user_id']]);
}

// Destruir sessão e cookie
session_unset();
session_destroy();
setcookie('remember_me', '', time() - 3600, "/", "", false, true);

header("Location: login.php");
exit;
?>

