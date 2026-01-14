<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<style>
    /* RESET E ESTRUTURA BASE */
    .main-header {
        background: #ffffff !important;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1) !important;
        width: 100% !important;
        padding: 0 !important;
        position: relative !important;
        z-index: 9999 !important;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif !important;
    }

    .nav-container {
        max-width: 1200px !important;
        margin: 0 auto !important;
        display: flex !important;
        justify-content: space-between !important;
        align-items: center !important;
        height: 80px !important;
        padding: 0 20px !important;
    }

    /* LOGO */
    .logo a {
        font-size: 22px !important;
        font-weight: 800 !important;
        color: #5c5c5dff !important; /* Roxo moderno */
        text-decoration: none !important;
        letter-spacing: -1px !important;
    }

    /* MENU CENTRAL */
    .nav-links {
        display: flex !important;
        gap: 25px !important;
    }

    .nav-links a {
        text-decoration: none !important;
        color: #444 !important;
        font-size: 15px !important;
        font-weight: 500 !important;
        transition: color 0.3s !important;
    }

    .nav-links a:hover {
        color: #7000FF !important;
    }

    /* ÁREA DO USUÁRIO */
    .user-actions {
        display: flex !important;
        align-items: center !important;
        gap: 15px !important;
    }

    .user-name {
        font-size: 14px !important;
        color: #666 !important;
    }

    .user-name strong {
        color: #222 !important;
    }

    .btn-account {
        background: #f0f0f0 !important;
        padding: 8px 15px !important;
        border-radius: 6px !important;
        color: #333 !important;
        text-decoration: none !important;
        font-size: 13px !important;
        font-weight: 600 !important;
    }

    .btn-logout {
        color: #ff4757 !important;
        text-decoration: none !important;
        font-size: 13px !important;
        font-weight: 600 !important;
        border: 1px solid #ff4757 !important;
        padding: 7px 12px !important;
        border-radius: 6px !important;
        transition: all 0.3s !important;
    }

    .btn-logout:hover {
        background: #ff4757 !important;
        color: #fff !important;
    }
</style>

<header class="main-header">
    <div class="nav-container">
        <div class="logo">
            <a href="index.php">Mestria Digital</a>
        </div>
        
        <nav class="nav-links">
            <a href="index.php">Início</a>
            <a href="aulas.php">Aulas</a>
            <a href="materiais.php">Materiais</a>
            <a href="suporte.php">Suporte</a>
        </nav>

        <div class="user-actions">
            <?php if(isset($_SESSION['user_id'])): ?>
                <a href="logout.php" class="btn-logout">Sair</a>
            <?php else: ?>
                <a href="login.php" class="btn-account">Acesso Aluno</a>
            <?php endif; ?>
        </div>
    </div>
</header>