<?php
require_once 'php/auth.php'; // Proteção da página
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acesso Aluno | Mestria Digital</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/all.min.css">
    <style>
        .student-dashboard {
            padding: 40px 0;
            background: #fbfbfb;
            min-height: calc(100vh - 80px);
        }
        .welcome-hero {
            background: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            margin-bottom: 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .welcome-text h1 {
            font-size: 28px;
            color: #222;
            margin-bottom: 10px;
        }
        .quick-actions {
            display: flex;
            gap: 15px;
        }
        .action-card {
            background: white;
            padding: 25px;
            border-radius: 15px;
            text-decoration: none;
            color: inherit;
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            flex: 1;
            border: 1px solid #eee;
        }
        .action-card:hover {
            transform: translateY(-5px);
            border-color: #7000FF;
            box-shadow: 0 10px 25px rgba(112, 0, 255, 0.1);
        }
        .action-card i {
            font-size: 30px;
            color: #7000FF;
            margin-bottom: 15px;
        }
        .action-card.logout i {
            color: #ff4757;
        }
        .action-card h3 {
            font-size: 16px;
            margin-bottom: 5px;
        }
        .modules-title {
            margin: 40px 0 20px;
            font-size: 22px;
            font-weight: 700;
        }
    </style>
</head>
<body>
    <?php include 'php/header.php'; ?>

    <main class="student-dashboard">
        <div class="container">
            <!-- Boas-vindas -->
            <div class="welcome-hero">
                <div class="welcome-text">
                    <h1>Olá, <?php echo explode(' ', htmlspecialchars($_SESSION['user_name']))[0]; ?>! 👋</h1>
                    <p>Bom ver você de volta. O que vamos aprender hoje?</p>
                </div>
            </div>

            
            
            </div>

            <h2 class="modules-title">Seus Módulos</h2>
            <div class="courses-grid">
                <div class="course-card">
                    <div class="course-image">
                        <i class="fas fa-play-circle" style="font-size: 50px; color: #7000FF;"></i>
                    </div>
                    <div class="course-content">
                        <h3>Módulo 1 - Comece Por Aqui</h3>
                        <p>O GPS completo para sua jornada no Mestria Digital.</p>
                        <a href="#" class="btn btn-primary btn-course" style="background: #7000FF; border: none;">Assistir Aula</a>
                    </div>
                </div>

                <div class="course-card">
                    <div class="course-image">
                        <i class="fas fa-rocket" style="font-size: 50px; color: #7000FF;"></i>
                    </div>
                    <div class="course-content">
                        <h3>Módulo 2 - Estratégias de Venda</h3>
                        <p>Aprenda a criar funis que convertem em alta escala.</p>
                        <a href="#" class="btn btn-primary btn-course" style="background: #7000FF; border: none;">Assistir Aula</a>
                    </div>
                </div>

                <div class="course-card">
                    <div class="course-image">
                        <i class="fas fa-bullseye" style="font-size: 50px; color: #7000FF;"></i>
                    </div>
                    <div class="course-content">
                        <h3>Módulo 3 - Tráfego Pago</h3>
                        <p>Domine os anúncios e escale seu infoproduto.</p>
                        <a href="#" class="btn btn-primary btn-course" style="background: #7000FF; border: none;">Assistir Aula</a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="js/script.js"></script>
</body>
</html>