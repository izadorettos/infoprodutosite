<?php
session_start();

// Simulação de processamento de pagamento
// Na vida real, aqui você chamaria a API da Stripe, Hotmart, Eduzz, etc.

// Simulamos que o pagamento foi aprovado
$_SESSION['pago'] = true;

// Gerar token de segurança
$token = bin2hex(random_bytes(16));
$_SESSION['secure_token'] = $token;

// Redireciona para o cadastro com o token
header("Location: cadastro.php?secure_token=" . $token);
exit;
?>
