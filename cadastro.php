<?php
session_start();
// O arquivo redirect_if_logged.php vai redirecionar se já estiver logado
require_once 'php/redirect_if_logged.php';

// Proteção de Acesso (Segurança)
// 1. Verifica se o pagamento foi confirmado e autorizado
if (!isset($_SESSION['pago']) || $_SESSION['pago'] !== true || !isset($_SESSION['autorizado_cadastrar']) || $_SESSION['autorizado_cadastrar'] !== true) {
    header("Location: checkout.php?error=" . urlencode("Acesso restrito. Realize o pagamento para acessar."));
    exit;
}

// 2. Verifica se o token da URL coincide com o da sessão
if (!isset($_GET['secure_token']) || !isset($_SESSION['secure_token']) || $_GET['secure_token'] !== $_SESSION['secure_token']) {
    // Token inválido ou tentativa de acesso direto
    header("Location: checkout.php?error=" . urlencode("Sessão inválida ou expirada."));
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finalizar Cadastro - Mestria Digital</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/all.min.css">
    <style>
        .login-page {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: radial-gradient(circle at top right, #0071e310, transparent),
                radial-gradient(circle at bottom left, #0071e310, transparent),
                var(--bg-primary);
            padding: 20px;
        }

        .login-card {
            width: 100%;
            max-width: 400px;
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            padding: 40px;
            border-radius: 30px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.3);
            text-align: center;
        }

        .login-logo {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 30px;
            color: var(--text-primary);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .login-header h1 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .login-header p {
            color: var(--text-secondary);
            font-size: 14px;
            margin-bottom: 30px;
        }

        .success-banner {
            background: #d4edda;
            color: #155724;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .form-group {
            text-align: left;
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-size: 12px;
            font-weight: 600;
            color: var(--text-secondary);
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .form-group input {
            width: 100%;
            padding: 15px 20px;
            background: rgba(0, 0, 0, 0.03);
            border: 1px solid transparent;
            border-radius: 12px;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .form-group input:focus {
            outline: none;
            background: white;
            border-color: var(--accent-blue);
            box-shadow: 0 0 0 4px rgba(0, 113, 227, 0.1);
        }

        .error-message {
            color: #ff3b30;
            font-size: 14px;
            margin-bottom: 20px;
        }

        .btn-login {
            width: 100%;
            padding: 15px;
            font-size: 16px;
            font-weight: 600;
            margin-top: 10px;
        }

        .login-footer {
            margin-top: 30px;
            font-size: 14px;
            color: var(--text-secondary);
        }

        .login-footer a {
            color: var(--accent-blue);
            font-weight: 500;
        }
    </style>
</head>

<body>
    <?php include 'php/header.php'; ?>

    <div class="login-page">
        <div class="login-card">
            
            <div class="login-logo">
                <i class="fas fa-crown" style="color: var(--accent-blue);"></i>
                <span>Mestria Digital</span>
            </div>
            
            <div class="success-banner">
                <i class="fas fa-check-circle"></i> Pagamento Confirmado!
            </div>

            <div class="login-header">
                <h1>Finalizar Cadastro</h1>
                <p>Crie sua conta para acessar o conteúdo.</p>
            </div>

            <?php if (isset($_GET['error'])): ?>
                <div class="error-message">
                    <?php echo htmlspecialchars($_GET['error']); ?>
                </div>
            <?php endif; ?>

            <form action="php/registro_process.php" method="POST">
                <div class="form-group">
                    <label>Nome Completo</label>
                    <input type="text" name="nome" placeholder="Seu nome" required value="<?php echo isset($_SESSION['payment_data']['card_holder']) ? htmlspecialchars($_SESSION['payment_data']['card_holder']) : ''; ?>">
                </div>
                <div class="form-group">
                    <label>E-mail</label>
                    <input type="email" name="email" placeholder="seu@email.com" required>
                </div>
                <div class="form-group">
                    <label>Senha</label>
                    <input type="password" name="password" placeholder="••••••••" required>
                </div>
                <button type="submit" class="btn btn-primary btn-login">Finalizar Cadastro</button>
            </form>

            <div class="login-footer">
                Já tem uma conta? <a href="login.php">Acesse aqui</a>
            </div>
        </div>
    </div>
    <script src="js/script.js"></script>
</body>


</html>
