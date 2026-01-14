<?php
session_start();
require_once 'redirect_if_logged.php';

// Proteção: Só acessa se o pagamento foi concluído na sessão E o token estiver correto
if (!isset($_SESSION['pago']) || $_SESSION['pago'] !== true) {
    header("Location: checkout.php?error=" . urlencode("Você precisa adquirir o curso para criar uma conta."));
    exit;
}

// Verificação adicional de token (se veio do process_payment.php)
if (!isset($_GET['secure_token']) || !isset($_SESSION['secure_token']) || $_GET['secure_token'] !== $_SESSION['secure_token']) {
    // Se o token não bater, pode ser um acesso direto ou tentativa de bypass
    // Vamos ser rigorosos: manda pro checkout
     header("Location: checkout.php?error=" . urlencode("Sessão inválida. Por favor, inicie o pagamento novamente."));
     exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Conta - Mestria Digital</title>
    <link rel="stylesheet" href="style.css">
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
    <?php include 'header.php'; ?>

    <div class="login-page">
        <div class="login-card">
            <div class="login-header" style="text-align: left; margin-bottom: 20px;">
                <a href="index.php?home=1" style="color: var(--text-secondary); font-size: 14px; text-decoration: none; display: flex; align-items: center; gap: 5px;">
                    <i class="fas fa-arrow-left"></i> Voltar à Home
                </a>
            </div>
            <div class="login-logo">

                <i class="fas fa-crown" style="color: var(--accent-blue);"></i>
                <span>Mestria Digital</span>
            </div>
            <div class="login-header">
                <h1>Criar Conta</h1>
                <p>Junte-se à elite dos infoprodutores.</p>
            </div>

            <?php if (isset($_GET['error'])): ?>
                <div class="error-message">
                    <?php echo htmlspecialchars($_GET['error']); ?>
                </div>
            <?php endif; ?>

            <form action="registro_process.php" method="POST">
                <div class="form-group">
                    <label>Nome Completo</label>
                    <input type="text" name="nome" placeholder="Seu nome" required>
                </div>
                <div class="form-group">
                    <label>E-mail</label>
                    <input type="email" name="email" placeholder="seu@email.com" required>
                </div>
                <div class="form-group">
                    <label>Senha</label>
                    <input type="password" name="password" placeholder="••••••••" required>
                </div>
                <button type="submit" class="btn btn-primary btn-login">Cadastrar</button>
            </form>

            <div class="login-footer">
                Já tem uma conta? <a href="login.php">Acesse aqui</a>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>


</html>
