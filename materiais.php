<?php
require_once 'php/auth.php';
// Validação de pagamento via Sessão
if (!isset($_SESSION['usuario_pago']) || $_SESSION['usuario_pago'] != 1) {
    header('Location: checkout.php?erro=acesso_negado');
    exit();
}
require_once 'php/db.php';

// Buscar status de pagamento do usuário logado
$user_id = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT status_pagamento FROM usuarios WHERE id = ?");
$stmt->execute([$user_id]);
$user_data = $stmt->fetch();
$pago = ($user_data['status_pagamento'] === 'pago');
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materiais Complementares - Mestria Digital</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/all.min.css">
    <style>
        .page-header {
            background-color: var(--bg-secondary);
            padding: 80px 0;
            border-bottom: 1px solid var(--border-color);
            margin-bottom: 60px;
        }

        .resources-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 30px;
            margin-bottom: 80px;
        }

        .resource-card {
            background-color: var(--bg-primary);
            border: 1px solid var(--border-color);
            border-radius: 20px;
            padding: 30px;
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .resource-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-medium);
            border-color: var(--accent-blue);
        }

        .resource-icon {
            font-size: 32px;
            color: var(--accent-blue);
            margin-bottom: 20px;
        }

        .resource-info h3 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .resource-info p {
            font-size: 14px;
            color: var(--text-secondary);
            margin-bottom: 20px;
            line-height: 1.5;
        }

        .download-btn {
            display: flex;
            align-items: center;
            gap: 10px;
            color: var(--accent-blue);
            font-weight: 600;
            font-size: 15px;
            transition: gap 0.2s ease;
        }

        .download-btn:hover {
            gap: 15px;
        }

        .back-nav {
            padding: 20px 0;
        }

        .category-tag {
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            font-weight: 700;
            color: var(--text-secondary);
            margin-bottom: 8px;
            display: block;
        }
    </style>
</head>

<body>
    <?php include 'php/header.php'; ?>


    <header class="page-header">
        <div class="container text-center">
            <span class="section-tag">Biblioteca</span>
            <h1 class="section-title">Materiais Complementares</h1>
            <p class="section-subtitle">Acesse todos os PDFs, templates e ferramentas exclusivas para acelerar seus
                resultados.</p>
        </div>
    </header>

    <main class="container">
        <div class="resources-grid">
            <!-- Resource 1 -->
            <div class="resource-card">
                <div class="resource-info">
                    <span class="category-tag">E-book</span>
                    <i class="fas fa-file-pdf resource-icon"></i>
                    <h3>Guia: Posicionamento de Elite</h3>
                    <p>Um passo a passo detalhado sobre como construir sua autoridade no mercado digital.</p>
                </div>
                <?php if ($pago): ?>
                    <a href="#" class="download-btn">Baixar Agora <i class="fas fa-arrow-right"></i></a>
                <?php else: ?>
                    <p style="color: #ff3b30; font-size: 13px; font-weight: 600; margin-top: 15px;">
                        <i class="fas fa-lock"></i> Acesso bloqueado. Realize o pagamento para baixar os materiais
                    </p>
                <?php endif; ?>
            </div>

            <!-- Resource 2 -->
            <div class="resource-card">
                <div class="resource-info">
                    <span class="category-tag">Template</span>
                    <i class="fas fa-columns resource-icon"></i>
                    <h3>Template: Landing Page Apple-Style</h3>
                    <p>O design exato que usamos para nossas páginas de alta conversão.</p>
                </div>
                <?php if ($pago): ?>
                    <a href="#" class="download-btn">Baixar Agora <i class="fas fa-arrow-right"></i></a>
                <?php else: ?>
                    <p style="color: #ff3b30; font-size: 13px; font-weight: 600; margin-top: 15px;">
                        <i class="fas fa-lock"></i> Acesso bloqueado. Realize o pagamento para baixar os materiais
                    </p>
                <?php endif; ?>
            </div>

            <!-- Resource 3 -->
            <div class="resource-card">
                <div class="resource-info">
                    <span class="category-tag">Planilha</span>
                    <i class="fas fa-calculator resource-icon"></i>
                    <h3>Calculadora de ROI de Lançamento</h3>
                    <p>Preveja seus lucros e organize seu investimento em tráfego pago.</p>
                </div>
                <?php if ($pago): ?>
                    <a href="#" class="download-btn">Baixar Agora <i class="fas fa-arrow-right"></i></a>
                <?php else: ?>
                    <p style="color: #ff3b30; font-size: 13px; font-weight: 600; margin-top: 15px;">
                        <i class="fas fa-lock"></i> Acesso bloqueado. Realize o pagamento para baixar os materiais
                    </p>
                <?php endif; ?>
            </div>

            <!-- Resource 4 -->
            <div class="resource-card">
                <div class="resource-info">
                    <span class="category-tag">Checklist</span>
                    <i class="fas fa-tasks resource-icon"></i>
                    <h3>Checklist: Lançamento de Itens Individuais</h3>
                    <p>Não esqueça nenhum detalhe técnico importante antes de abrir o carrinho.</p>
                </div>
                <?php if ($pago): ?>
                    <a href="#" class="download-btn">Baixar Agora <i class="fas fa-arrow-right"></i></a>
                <?php else: ?>
                    <p style="color: #ff3b30; font-size: 13px; font-weight: 600; margin-top: 15px;">
                        <i class="fas fa-lock"></i> Acesso bloqueado. Realize o pagamento para baixar os materiais
                    </p>
                <?php endif; ?>
            </div>

            <!-- Resource 5 -->
            <div class="resource-card">
                <div class="resource-info">
                    <span class="category-tag">Script</span>
                    <i class="fas fa-file-alt resource-icon"></i>
                    <h3>Scripts de Vendas (WhatsApp & Direct)</h3>
                    <p>Copiões validados para converter leads frios em compradores premium.</p>
                </div>
                <?php if ($pago): ?>
                    <a href="#" class="download-btn">Baixar Agora <i class="fas fa-arrow-right"></i></a>
                <?php else: ?>
                    <p style="color: #ff3b30; font-size: 13px; font-weight: 600; margin-top: 15px;">
                        <i class="fas fa-lock"></i> Acesso bloqueado. Realize o pagamento para baixar os materiais
                    </p>
                <?php endif; ?>
            </div>
        </div>
    </main>

    <footer class="footer">
        <div class="container text-center" style="padding: 40px 0;">
            <p style="color: var(--text-secondary); font-size: 14px;">&copy; 2026 Mestria Digital. Área Exclusiva para
                Alunos.</p>
        </div>
    </footer>

    <script src="js/script.js"></script>
</body>



</html>