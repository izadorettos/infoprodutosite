<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once 'php/seo.php'; 
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <?php echo get_seo_tags(
        'Mestria Digital | Transforme sua Expertice em Império',
        'O método definitivo para criar, lançar e escalar seu infoproduto com excelência premium.',
        'https://seusite.com/index.php'
    ); ?>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/all.min.css">
</head>

<body>
    <?php include 'php/header.php'; ?>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container text-center">
            <span class="section-tag reveal">Infoproduto Premium</span>
            <h1 class="section-title reveal">Transforme sua Expertice em um Império Digital.</h1>
            <p class="section-subtitle reveal">Aprenda as estratégias exatas para criar, lançar e escalar seu
                infoproduto com o padrão de excelência que o mercado premium exige.</p>
            <div class="hero-cta reveal">
                <a href="checkout.php" class="btn btn-primary btn-large">Quero Começar Agora</a>
                <a href="php/login.php" class="btn btn-secondary btn-large" style="margin-left: 15px;">Já Sou Aluno</a>
            </div>

            <div class="hero-image reveal">
                <img src="assets/tablet-mockup.png" alt="Mestria Digital E-book Mockup">
            </div>
        </div>
    </section>

    <!-- Benefits Section -->
    <section id="benefits" class="benefits bg-secondary">
        <div class="container">
            <div class="text-center reveal">
                <span class="section-tag">Benefícios Exclusivos</span>
                <h2 class="section-title">Por que escolher o Mestria Digital?</h2>
                <p class="section-subtitle">Tudo o que você precisa para sair do zero e chegar ao topo do mercado
                    digital.</p>
            </div>

            <div class="benefits-grid">
                <div class="benefit-card reveal">
                    <i class="fas fa-gem"></i>
                    <h3>Posicionamento de Elite</h3>
                    <p>Aprenda a se posicionar como autoridade máxima no seu nicho, atraindo clientes que valorizam
                        qualidade.</p>
                </div>
                <div class="benefit-card reveal">
                    <i class="fas fa-rocket"></i>
                    <h3>Lançamentos Escaláveis</h3>
                    <p>Metodologias testadas para lançamentos que não apenas vendem, mas criam uma comunidade fiel.</p>
                </div>
                <div class="benefit-card reveal">
                    <i class="fas fa-shield-halved"></i>
                    <h3>Método Blindado</h3>
                    <p>Estratégias de tráfego e funis de vendas que garantem previsibilidade e segurança no seu negócio.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Inside the Course Section -->
    <section id="inside" class="inside">
        <div class="container">
            <div class="inside-flex reveal">
                <div class="inside-text">
                    <span class="section-tag">Por dentro do curso</span>
                    <h2 class="section-title">Uma Experiência de Aprendizado de Elite</h2>
                    <p class="section-subtitle" style="margin-left: 0; text-align: left;">Nossa plataforma exclusiva foi
                        desenhada para facilitar seu progresso, com aulas em alta definição e suporte premium.</p>
                    <ul class="feature-list" style="list-style: none; padding: 0;">
                        <li
                            style="margin-bottom: 12px; display: flex; align-items: center; gap: 10px; font-weight: 500;">
                            <a href="aulas.php"
                                style="color: inherit; text-decoration: none; display: flex; align-items: center; gap: 10px;">
                                <i class="fas fa-check-circle" style="color: var(--accent-blue);"></i> Aulas Passo a
                                Passo
                            </a>
                        </li>
                        <li
                            style="margin-bottom: 12px; display: flex; align-items: center; gap: 10px; font-weight: 500;">
                            <a href="materiais.php"
                                style="color: inherit; text-decoration: none; display: flex; align-items: center; gap: 10px;">
                                <i class="fas fa-check-circle" style="color: var(--accent-blue);"></i> Materiais
                                Complementares
                            </a>
                        </li>
                        <li
                            style="margin-bottom: 12px; display: flex; align-items: center; gap: 10px; font-weight: 500;">
                            <a href="suporte.php"
                                style="color: inherit; text-decoration: none; display: flex; align-items: center; gap: 10px;">
                                <i class="fas fa-check-circle" style="color: var(--accent-blue);"></i> Suporte
                                Especializado
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="inside-image">
                    <img src="assets/laptop-mockup.png" alt="Área de Membros Premium"
                        style="width: 100%; border-radius: 20px; box-shadow: var(--shadow-medium);">
                </div>
            </div>
        </div>
    </section>
    <!-- Social Proof Section -->
    <section id="social-proof" class="social-proof">
        <div class="container">
            <div class="text-center reveal">
                <span class="section-tag">O que Dizem Nossos Alunos</span>
                <h2 class="section-title">Resultados Reais de Pessoas Comuns</h2>
                <p class="section-subtitle">Junte-se a centenas de alunos que já transformaram seus negócios com nossa
                    metodologia.</p>
            </div>

            <div class="testimonials-grid">
                <div class="testimonial-card reveal">
                    <div class="stars">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                            class="fas fa-star"></i><i class="fas fa-star"></i>
                    </div>
                    <p class="testimonial-text">"O Mestria Digital mudou completamente a forma como eu via o mercado. Em
                        3 meses, dobrei meu faturamento."</p>
                    <div class="testimonial-author">
                        <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&q=80&w=150"
                            alt="Ana Silva">
                        <div>
                            <h4>Ana Silva</h4>
                            <span>Produtora de Conteúdo</span>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card reveal">
                    <div class="stars">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                            class="fas fa-star"></i><i class="fas fa-star"></i>
                    </div>
                    <p class="testimonial-text">"A clareza do método é impressionante. Finalmente consegui lançar meu
                        e-book com confiança."</p>
                    <div class="testimonial-author">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&q=80&w=150"
                            alt="Ricardo Mendes">
                        <div>
                            <h4>Ricardo Mendes</h4>
                            <span>Consultor Financeiro</span>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card reveal">
                    <div class="stars">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                            class="fas fa-star"></i><i class="fas fa-star"></i>
                    </div>
                    <p class="testimonial-text">"Excelente suporte e conteúdo de altíssima qualidade. O melhor
                        investimento que fiz este ano."</p>
                    <div class="testimonial-author">
                        <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?auto=format&fit=crop&q=80&w=150"
                            alt="Juliana Costa">
                        <div>
                            <h4>Juliana Costa</h4>
                            <span>Especialista em Marketing</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section id="faq" class="faq bg-secondary">
        <div class="container reveal">
            <div class="text-center">
                <span class="section-tag">Dúvidas Frequentes</span>
                <h2 class="section-title">Perguntas Comuns</h2>
                <p class="section-subtitle">Tire suas dúvidas antes de dar o próximo passo rumo ao sucesso.</p>
            </div>

            <div class="accordion">
                <div class="accordion-item reveal">
                    <div class="accordion-header">
                        <h3>Para quem é este curso?</h3>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="accordion-content">
                        <p>Este curso foi desenhado para profissionais, especialistas e produtores de conteúdo que
                            desejam elevar o nível de seus produtos digitais e faturar no mercado premium.</p>
                    </div>
                </div>
                <div class="accordion-item reveal">
                    <div class="accordion-header">
                        <h3>Quanto tempo tenho acesso ao conteúdo?</h3>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="accordion-content">
                        <p>Você terá acesso vitalício a todo o conteúdo gravado, além de todas as atualizações futuras
                            que fizermos no curso.</p>
                    </div>
                </div>
                <div class="accordion-item reveal">
                    <div class="accordion-header">
                        <h3>O curso oferece garantia?</h3>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="accordion-content">
                        <p>Sim! Oferecemos uma garantia incondicional de 7 dias. Se você não ficar satisfeito,
                            devolvemos 100% do seu dinheiro sem burocracia.</p>
                    </div>
                </div>
                <div class="accordion-item reveal">
                    <div class="accordion-header">
                        <h3>Como recebo o acesso?</h3>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="accordion-content">
                        <p>Imediatamente após a confirmação do pagamento, você receberá um e-mail com todos os dados de
                            acesso à nossa plataforma exclusiva.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Section -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content reveal">
                <div class="guarantee">
                    <i class="fas fa-certificate"></i>
                    <div>
                        <h3>Garantia Incondicional de 7 Dias</h3>
                        <p>Experimente o Mestria Digital sem riscos. Se não for o que você esperava, peça seu reembolso
                            em até 7 dias.</p>
                    </div>
                </div>

                <div class="security-seals">
                    <span>Pagamento Seguro por:</span>
                    <div class="seals">
                        <i class="fab fa-cc-visa"></i>
                        <i class="fab fa-cc-mastercard"></i>
                        <i class="fab fa-pix"></i>
                        <i class="fas fa-lock"></i>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <p>&copy; 2026 Mestria Digital. Todos os direitos reservados.</p>
                <div class="footer-links">
                    <a href="#">Termos de Uso</a>
                    <a href="#">Privacidade</a>
                </div>
            </div>
        </div>
    </footer>

    <script src="js/script.js"></script>
</body>



</html>