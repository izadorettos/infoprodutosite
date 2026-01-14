<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include 'php/header.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Checkout | Mestria Digital</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/all.min.css">
    <style>
        .checkout-section {
            padding: 100px 0;
            background: #fbfbfb;
            min-height: 100vh;
        }
        .checkout-container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.05);
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
        }
        .product-info h2 { font-size: 24px; margin-bottom: 20px; }
        .price { font-size: 32px; font-weight: 800; color: #7000FF; margin: 20px 0; }
        .benefits-list { list-style: none; padding: 0; }
        .benefits-list li { margin-bottom: 10px; display: flex; align-items: center; gap: 10px; font-size: 14px; }
        .payment-form { border-left: 1px solid #eee; padding-left: 40px; }
        .btn-pay {
            width: 100%;
            background: #7000FF;
            color: white;
            padding: 18px;
            border-radius: 12px;
            font-weight: 700;
            text-align: center;
            display: block;
            margin-top: 30px;
            cursor: pointer;
            border: none;
            transition: 0.3s;
        }
        .btn-pay:hover { background: #5c00d6; transform: translateY(-3px); }
    </style>
</head>
<body>
    <main class="checkout-section">
        <div class="container">
            <div class="checkout-container">
                <div class="product-info">
                    <span class="section-tag">Carrinho de Compras</span>
                    <h2>Mestria Digital Premium</h2>
                    <p>O treinamento completo para quem deseja escalar no mercado digital com excelência e autoridade.</p>
                    <div class="price">R$ 297,00</div>
                    <ul class="benefits-list">
                        <li><i class="fas fa-check-circle" style="color: #4cd137;"></i> Acesso Vitalício</li>
                        <li><i class="fas fa-check-circle" style="color: #4cd137;"></i> Suporte Prioritário</li>
                        <li><i class="fas fa-check-circle" style="color: #4cd137;"></i> Materiais Exclusivos</li>
                        <li><i class="fas fa-check-circle" style="color: #4cd137;"></i> 7 Dias de Garantia</li>
                    </ul>
                </div>
                <div class="payment-form">
                    <h3>Finalizar Pagamento</h3>
                    <p style="font-size: 14px; color: #666; margin-bottom: 20px;">Você será redirecionado para criar sua conta após a aprovação.</p>
                    <img src="https://logodownload.org/wp-content/uploads/2014/10/visa-logo-1.png" style="width: 50px; margin-right: 10px;">
                    <img src="https://logodownload.org/wp-content/uploads/2014/10/mastercard-logo-0.png" style="width: 40px;">
                    <form action="php/process_payment.php" method="POST">
                        <button type="submit" class="btn-pay">
                            <i class="fas fa-lock"></i> Pagar com Cartão/PIX
                        </button>
                    </form>
                    <p style="font-size: 12px; color: #999; text-align: center; margin-top: 15px;">
                        Ambiente 100% seguro e criptografado.
                    </p>
                </div>
            </div>
        </div>
    </main>
    <script src="js/script.js"></script>
</body>
</html>
