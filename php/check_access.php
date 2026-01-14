<?php
// Arquivo: php/check_access.php
// Este arquivo deve ser incluído APÓS o auth.php ou onde $_SESSION['user_id'] já existir

require_once 'db.php';

if (isset($_SESSION['user_id'])) {
    try {
        // Verificar status de pagamento no banco em tempo real
        $stmt = $pdo->prepare("SELECT pago FROM usuarios WHERE id = ?");
        $stmt->execute([$_SESSION['user_id']]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Se não encontrou usuário ou pago é 0/false/null
        if (!$user || $user['pago'] != 1) {
            // Opcional: Destruir sessão se quiser forçar logout
            // session_destroy(); 
            
            // Redirecionar para o checkout
            header("Location: checkout.php?error=" . urlencode("Seu acesso ainda não foi liberado. Por favor, finalize o pagamento."));
            exit;
        }
    } catch (PDOException $e) {
        // Em caso de erro no banco, falha segura (não libera)
        header("Location: checkout.php?error=" . urlencode("Erro ao verificar assinatura. Contate o suporte."));
        exit;
    }
} else {
    // Se não tiver ID na sessão, não está logado
    header("Location: login.php");
    exit;
}
?>
