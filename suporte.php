<?php
require_once 'php/auth.php';
// Validação de pagamento via Sessão
if (!isset($_SESSION['usuario_pago']) || $_SESSION['usuario_pago'] != 1) {
    header('Location: checkout.php?erro=acesso_negado');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suporte Especializado - Mestria Digital</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/all.min.css">
    <style>
        .chat-container {
            max-width: 800px;
            margin: 60px auto;
            background-color: var(--bg-primary);
            border-radius: 24px;
            box-shadow: var(--shadow-medium);
            border: 1px solid var(--border-color);
            display: flex;
            flex-direction: column;
            overflow: hidden;
            height: 700px;
        }

        .chat-header {
            padding: 25px 30px;
            background-color: var(--bg-secondary);
            border-bottom: 1px solid var(--border-color);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .chat-user-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .chat-avatar {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background-color: var(--accent-blue);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
        }

        .chat-status {
            font-size: 13px;
            color: #28a745;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .chat-messages {
            flex: 1;
            padding: 30px;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
            gap: 20px;
            background-color: #f9f9fb;
        }

        .message {
            max-width: 75%;
            padding: 15px 20px;
            border-radius: 18px;
            font-size: 15px;
            line-height: 1.5;
        }

        .message-received {
            background-color: white;
            color: var(--text-primary);
            align-self: flex-start;
            border-bottom-left-radius: 4px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.02);
            border: 1px solid var(--border-color);
        }

        .message-sent {
            background-color: var(--accent-blue);
            color: white;
            align-self: flex-end;
            border-bottom-right-radius: 4px;
        }

        .message-time {
            font-size: 11px;
            margin-top: 5px;
            opacity: 0.7;
            display: block;
            text-align: right;
        }

        .chat-input-area {
            padding: 25px 30px;
            background-color: white;
            border-top: 1px solid var(--border-color);
            display: flex;
            gap: 15px;
            align-items: center;
        }

        .chat-input {
            flex: 1;
            border: 1px solid var(--border-color);
            border-radius: 12px;
            padding: 15px 20px;
            font-family: inherit;
            font-size: 15px;
            outline: none;
            transition: border-color 0.2s ease;
        }

        .chat-input:focus {
            border-color: var(--accent-blue);
        }

        .send-btn {
            width: 50px;
            height: 50px;
            background-color: var(--accent-blue);
            color: white;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            transition: background 0.2s ease;
        }

        .send-btn:hover {
            background-color: var(--accent-blue-hover);
        }

        .back-nav {
            padding: 20px 0;
            max-width: 800px;
            margin: 0 auto;
        }

        @media (max-width: 768px) {
            .chat-container {
                height: calc(100vh - 100px);
                margin: 20px;
            }
        }
    </style>
</head>

<body>
    <?php include 'php/header.php'; ?>


    <div class="chat-container">
        <div class="chat-header">
            <div class="chat-user-info">
                <div class="chat-avatar">MD</div>
                <div>
                    <h3 style="font-size: 16px;">Suporte Mestria Digital</h3>
                    <div class="chat-status">
                        <i class="fas fa-circle" style="font-size: 8px;"></i> Online Agora
                    </div>
                </div>
            </div>
            <div class="chat-actions">
                <i class="fas fa-ellipsis-h" style="color: var(--text-secondary); cursor: pointer;"></i>
            </div>
        </div>

        <div class="chat-messages" id="chat-messages">
            <div class="message message-received">
                Olá! Seja bem-vindo ao Suporte Especializado. Como podemos ajudar você a escalar seus resultados hoje?
                <span class="message-time">17:24</span>
            </div>

            <div class="message message-sent">
                Oi! Gostaria de saber como tirar dúvidas técnicas sobre a configuração do funil de vendas.
                <span class="message-time">17:25</span>
            </div>

            <div class="message message-received">
                Com certeza! Você pode enviar sua dúvida diretamente por aqui ou agendar uma mentoria rápida de 15
                minutos com um de nossos técnicos. Qual prefere?
                <span class="message-time">17:25</span>
            </div>
        </div>

        <div class="chat-input-area">
            <input type="text" class="chat-input" placeholder="Digite sua mensagem...">
            <button class="send-btn">
                <i class="fas fa-paper-plane"></i>
            </button>
        </div>
    </div>

    <script src="js/script.js"></script>
</body>



</html>