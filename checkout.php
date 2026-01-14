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
                    
                    <div style="margin-bottom: 20px;">
                        <img src="https://logodownload.org/wp-content/uploads/2014/10/visa-logo-1.png" style="width: 50px; margin-right: 10px;">
                        <img src="https://logodownload.org/wp-content/uploads/2014/10/mastercard-logo-0.png" style="width: 40px;">
                    </div>

                    <?php if (isset($_GET['error'])): ?>
                        <div style="background: #ffe6e6; color: #d63031; padding: 12px; border-radius: 8px; margin-bottom: 20px; font-size: 14px;">
                            <i class="fas fa-exclamation-circle"></i> <?php echo htmlspecialchars($_GET['error']); ?>
                        </div>
                    <?php endif; ?>
                    
                    <form action="php/process_payment.php" method="POST" id="paymentForm">
                        <div class="form-group" style="margin-bottom: 15px;">
                            <label style="display: block; font-size: 12px; font-weight: 600; color: #666; margin-bottom: 5px;">Nome no Cartão</label>
                            <input type="text" name="nome_cartao" id="cardName" placeholder="NOME COMPLETO" required 
                                   style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px; font-size: 14px; text-transform: uppercase;">
                        </div>

                        <div class="form-group" style="margin-bottom: 15px;">
                            <label style="display: block; font-size: 12px; font-weight: 600; color: #666; margin-bottom: 5px;">CPF</label>
                            <input type="text" name="cpf" id="cpf" placeholder="000.000.000-00" maxlength="14" required 
                                   style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px; font-size: 14px;">
                        </div>

                        <div class="form-group" style="margin-bottom: 15px;">
                            <label style="display: block; font-size: 12px; font-weight: 600; color: #666; margin-bottom: 5px;">Número do Cartão</label>
                            <input type="text" name="numero_cartao" id="cardNumber" placeholder="0000 0000 0000 0000" maxlength="19" required 
                                   style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px; font-size: 14px;">
                            <span id="cardError" style="color: #d63031; font-size: 12px; display: none; margin-top: 5px;">Número de cartão inválido</span>
                        </div>

                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 15px;">
                            <div class="form-group">
                                <label style="display: block; font-size: 12px; font-weight: 600; color: #666; margin-bottom: 5px;">Validade</label>
                                <input type="text" name="validade" id="expiry" placeholder="MM/AA" maxlength="5" required 
                                       style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px; font-size: 14px;">
                            </div>
                            <div class="form-group">
                                <label style="display: block; font-size: 12px; font-weight: 600; color: #666; margin-bottom: 5px;">CVV</label>
                                <input type="text" name="cvv" id="cvv" placeholder="000" maxlength="3" required 
                                       style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px; font-size: 14px;">
                            </div>
                        </div>

                        <button type="submit" class="btn-pay" id="payButton">
                            <span id="buttonText"><i class="fas fa-lock"></i> Pagar com Cartão</span>
                            <span id="buttonLoading" style="display: none;"><i class="fas fa-spinner fa-spin"></i> Processando...</span>
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
    <script>
        // Máscara para CPF
        document.getElementById('cpf').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length <= 11) {
                value = value.replace(/(\d{3})(\d)/, '$1.$2');
                value = value.replace(/(\d{3})(\d)/, '$1.$2');
                value = value.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
                e.target.value = value;
            }
        });

        // Máscara para Número do Cartão
        document.getElementById('cardNumber').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length <= 16) {
                value = value.replace(/(\d{4})(?=\d)/g, '$1 ');
                e.target.value = value;
            }
        });

        // Máscara para Data de Expiração
        document.getElementById('expiry').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length >= 2) {
                value = value.substring(0, 2) + '/' + value.substring(2, 4);
            }
            e.target.value = value;
        });

        // Apenas números no CVV
        document.getElementById('cvv').addEventListener('input', function(e) {
            e.target.value = e.target.value.replace(/\D/g, '');
        });

        // Algoritmo de Luhn para validação do cartão
        function luhnCheck(cardNumber) {
            let sum = 0;
            let isEven = false;
            
            // Remove espaços
            cardNumber = cardNumber.replace(/\s/g, '');
            
            // Percorre de trás para frente
            for (let i = cardNumber.length - 1; i >= 0; i--) {
                let digit = parseInt(cardNumber.charAt(i));
                
                if (isEven) {
                    digit *= 2;
                    if (digit > 9) {
                        digit -= 9;
                    }
                }
                
                sum += digit;
                isEven = !isEven;
            }
            
            return (sum % 10) === 0;
        }

        // Validação em tempo real do número do cartão
        document.getElementById('cardNumber').addEventListener('blur', function(e) {
            const cardError = document.getElementById('cardError');
            const cardNumber = e.target.value.replace(/\s/g, '');
            
            if (cardNumber.length >= 13 && !luhnCheck(cardNumber)) {
                cardError.style.display = 'block';
                e.target.style.borderColor = '#d63031';
            } else {
                cardError.style.display = 'none';
                e.target.style.borderColor = '#ddd';
            }
        });

        // Validação e envio do formulário
        document.getElementById('paymentForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const cardNumber = document.getElementById('cardNumber').value.replace(/\s/g, '');
            const cardError = document.getElementById('cardError');
            
            // Validação final do cartão
            if (!luhnCheck(cardNumber)) {
                cardError.style.display = 'block';
                document.getElementById('cardNumber').style.borderColor = '#d63031';
                document.getElementById('cardNumber').focus();
                return false;
            }
            
            // Validação da data de expiração
            const expiry = document.getElementById('expiry').value;
            if (expiry.length !== 5) {
                alert('Data de expiração inválida');
                return false;
            }
            
            const [month, year] = expiry.split('/');
            const currentDate = new Date();
            const currentYear = currentDate.getFullYear() % 100;
            const currentMonth = currentDate.getMonth() + 1;
            
            if (parseInt(month) < 1 || parseInt(month) > 12) {
                alert('Mês inválido');
                return false;
            }
            
            if (parseInt(year) < currentYear || (parseInt(year) === currentYear && parseInt(month) < currentMonth)) {
                alert('Cartão expirado');
                return false;
            }
            
            // Mostrar estado de carregamento
            const payButton = document.getElementById('payButton');
            const buttonText = document.getElementById('buttonText');
            const buttonLoading = document.getElementById('buttonLoading');
            
            payButton.disabled = true;
            buttonText.style.display = 'none';
            buttonLoading.style.display = 'inline';
            
            // Enviar formulário imediatamente (o servidor tem delay de 2s)
            this.submit();
        });
    </script>
</body>
</html>
