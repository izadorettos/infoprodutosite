<?php
session_start();

// Verificar se o formulário foi enviado via POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: ../checkout.php?error=" . urlencode("Acesso inválido"));
    exit;
}

// Receber e validar dados do formulário
$nome_cartao = trim($_POST['nome_cartao'] ?? '');
$cpf = trim($_POST['cpf'] ?? '');
$numero_cartao = trim($_POST['numero_cartao'] ?? '');
$validade = trim($_POST['validade'] ?? '');
$cvv = trim($_POST['cvv'] ?? '');

// Validar se todos os campos foram preenchidos
if (empty($nome_cartao) || empty($cpf) || empty($numero_cartao) || empty($validade) || empty($cvv)) {
    header("Location: ../checkout.php?error=" . urlencode("Por favor, preencha todos os campos"));
    exit;
}

// Validar formato do CPF (deve ter 14 caracteres com pontos e traço)
if (strlen($cpf) !== 14) {
    header("Location: ../checkout.php?error=" . urlencode("CPF inválido"));
    exit;
}

// Validar formato do cartão (mínimo 13 dígitos)
$numero_cartao_clean = preg_replace('/\s/', '', $numero_cartao);
if (strlen($numero_cartao_clean) < 13 || strlen($numero_cartao_clean) > 16) {
    header("Location: ../checkout.php?error=" . urlencode("Número de cartão inválido"));
    exit;
}

// Validar formato da data de expiração (MM/AA)
if (strlen($validade) !== 5 || !preg_match('/^\d{2}\/\d{2}$/', $validade)) {
    header("Location: ../checkout.php?error=" . urlencode("Data de validade inválida"));
    exit;
}

// Validar CVV (3 dígitos)
if (strlen($cvv) !== 3 || !ctype_digit($cvv)) {
    header("Location: ../checkout.php?error=" . urlencode("CVV inválido"));
    exit;
}

// Validação adicional: Algoritmo de Luhn no servidor
function luhnCheck($cardNumber) {
    $sum = 0;
    $isEven = false;
    
    // Remove espaços
    $cardNumber = preg_replace('/\s/', '', $cardNumber);
    
    // Percorre de trás para frente
    for ($i = strlen($cardNumber) - 1; $i >= 0; $i--) {
        $digit = intval($cardNumber[$i]);
        
        if ($isEven) {
            $digit *= 2;
            if ($digit > 9) {
                $digit -= 9;
            }
        }
        
        $sum += $digit;
        $isEven = !$isEven;
    }
    
    return ($sum % 10) === 0;
}

// Validar cartão com Luhn
if (!luhnCheck($numero_cartao_clean)) {
    header("Location: ../checkout.php?error=" . urlencode("Número de cartão inválido"));
    exit;
}

// Simulação de processamento de pagamento
// Na vida real, aqui você chamaria a API da Stripe, Hotmart, Eduzz, etc.
// Exemplo: $response = processarPagamento($numero_cartao, $validade, $cvv, 297.00);

// Simular delay de comunicação com o banco (2 segundos)
sleep(2);

// Simulação: 90% de aprovação, 10% de rejeição
$random = rand(1, 100);

if ($random <= 10) {
    // 10% de chance de rejeição
    $error_messages = [
        "Pagamento recusado. Verifique os dados do cartão.",
        "Saldo insuficiente. Tente outro cartão.",
        "Transação não autorizada pelo banco emissor.",
        "Cartão bloqueado. Entre em contato com seu banco.",
        "Limite de crédito excedido."
    ];
    
    $error = $error_messages[array_rand($error_messages)];
    header("Location: ../checkout.php?error=" . urlencode($error));
    exit;
}

// 90% de chance: Pagamento aprovado
$_SESSION['pago'] = true;
$_SESSION['pagamento_aprovado'] = true; // TRAVA RIGOROSA: Somente com isso o cadastro é permitido

// Armazenar dados do pagamento na sessão (opcional, para referência)
$_SESSION['payment_data'] = [
    'card_holder' => $nome_cartao,
    'cpf' => $cpf,
    'card_last4' => substr($numero_cartao_clean, -4),
    'amount' => 297.00,
    'date' => date('Y-m-d H:i:s'),
    'transaction_id' => 'TXN-' . strtoupper(bin2hex(random_bytes(8)))
];

// Gerar token de segurança
$token = bin2hex(random_bytes(16));
$_SESSION['secure_token'] = $token;

// Redireciona para o cadastro com o token
header("Location: ../cadastro.php?secure_token=" . $token);
exit;
?>
