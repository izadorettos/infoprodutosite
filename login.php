<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once 'php/redirect_if_logged.php'; 
?>
<!DOCTYPE html>

<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Mestria Digital</title>
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

        .login-error {
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
                <h1>Área do Aluno</h1>
                <p>Acesse seu conteúdo exclusivo de elite.</p>
            </div>

            <?php if (isset($_GET['error'])): ?>
                <div class="login-error">
                    <?php echo htmlspecialchars($_GET['error']); ?>
                </div>
            <?php endif; ?>

            <?php if (isset($_GET['success'])): ?>
                <div style="color: #28a745; font-size: 14px; margin-bottom: 20px;">
                    <?php echo htmlspecialchars($_GET['success']); ?>
                </div>
            <?php endif; ?>


            <form action="php/login_process.php" method="POST">
                <div class="form-group">
                    <label>E-mail</label>
                    <input type="email" name="email" placeholder="seu@email.com" required>
                </div>
                <div class="form-group">
                    <label>Senha</label>
                    <input type="password" name="password" placeholder="••••••••" required>
                </div>
                <div class="form-group" style="display: flex; align-items: center; gap: 10px; margin-top: -10px;">
                    <input type="checkbox" name="lembrar" id="lembrar" style="width: auto;">
                    <label for="lembrar" style="margin-bottom: 0; text-transform: none; letter-spacing: normal; cursor: pointer;">Lembrar-me por 30 dias</label>
                </div>
                <button type="submit" class="btn btn-primary btn-login">Entrar</button>

            </form>

            <div class="login-footer">
                Não tem uma conta? <a href="cadastro.php">Cadastre-se aqui</a><br><br>
                Não tem acesso? <a href="index.php">Conheça o curso</a>
            </div>

        </div>
    </div>
    <script src="js/script.js"></script>
</body>


</html>