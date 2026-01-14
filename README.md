# 💼 Mestria Digital - Plataforma de Infoproduto Premium

Uma plataforma completa de venda de curso com área de membros, sistema de autenticação e checkout integrado, desenvolvida com foco em **Design Premium**, **Segurança** e **Experiência do Usuário**.

## 🚀 Demonstração
O projeto está disponível online para visualização:
👉(https://izadorettos.github.io/infoprodutosite/)

O projeto simula um ambiente real de venda de um aprendizado, onde o usuário pode:
- Conhecer o curso através de uma landing page moderna
- Realizar checkout seguro
- Criar conta após aprovação de pagamento
- Acessar área exclusiva de membros com aulas e materiais

## 📋 Sobre o Projeto

Este site foi criado para demonstrar um fluxo completo de venda de um curso online, desde a apresentação do produto até a área de membros protegida. O projeto implementa boas práticas de desenvolvimento web e segurança com espaço para videos aulas, materiais de apoio e simulação de suporte(pode ser integrado um assistente com Make).

### Funcionalidades:

✅ **Landing Page Premium**: Design moderno inspirado em Apple/Minimalist
✅ **Sistema de Checkout**: Simulação de pagamento com validação 
✅ **Autenticação Segura**: Login com hash de senha e "Lembrar-me"
✅ **Área de Membros**: Dashboard exclusivo para alunos
✅ **Design Responsivo**: Adaptado para mobile, tablet e desktop
✅ **Proteção de Rotas**: Páginas protegidas por autenticação
✅ **SEO Otimizado**: Meta tags completas e semântica HTML5

## 🛠 Tecnologias Utilizadas

As seguintes ferramentas foram usadas na construção do projeto:

- **PHP 7.4+**: Backend e lógica de autenticação
- **MySQL**: Banco de dados para usuários e conteúdo
- **HTML5**: Estrutura semântica para melhor SEO
- **CSS3**: Estilização moderna com variáveis CSS e animações
- **JavaScript**: Interações dinâmicas e validações client-side
- **PDO**: Conexão segura com banco de dados
- **Sessions & Cookies**: Gerenciamento de autenticação

## 📂 Estrutura de Pastas

Para garantir a organização e escalabilidade do código, o projeto utiliza a seguinte estrutura:

```
infoprodutosite/
├── css/
│   └── style.css          # Estilos globais da aplicação
├── js/
│   └── script.js          # Comportamentos dinâmicos
├── assets/
│   ├── laptop-mockup.png  # Mockup da área de membros
│   └── tablet-mockup.png  # Mockup do e-book
├── php/
│   ├── db.php             # Configuração do banco de dados
│   ├── seo.php            # Funções de SEO
│   ├── auth.php           # Proteção de páginas
│   ├── header.php         # Header dinâmico
│   ├── logout.php         # Logout do usuário
│   ├── redirect_if_logged.php  # Redirecionamento de usuários logados
│   ├── process_payment.php     # Processamento de pagamento
│   ├── login_process.php       # Processamento de login
│   └── registro_process.php    # Processamento de registro
├── index.php              # Landing page principal
├── login.php              # Página de login
├── checkout.php           # Página de checkout
├── cadastro.php           # Página de registro
├── aulas.php              # Área de aulas (protegida)
├── materiais.php          # Materiais complementares (protegida)
├── suporte.php            # Suporte ao aluno (protegida)
└── database.sql           # Estrutura do banco de dados
```

## 🎨 Características de Design

- **Paleta de Cores Premium**: Azul (#0071e3), Roxo (#7000FF) e tons neutros
- **Tipografia Moderna**: Inter font family
- **Animações Suaves**: Reveal animations e hover effects
- **Glassmorphism**: Efeitos de vidro fosco no header
- **Cards Interativos**: Hover states e transições fluidas

## 🔐 Segurança

- ✅ Senhas criptografadas com `password_hash()`
- ✅ Proteção contra SQL Injection (PDO com prepared statements)
- ✅ Validação de sessões e tokens
- ✅ Cookies HttpOnly para "Lembrar-me"
- ✅ Proteção de rotas com autenticação

## 💾 Banco de Dados

Execute o arquivo `database.sql` para criar a estrutura necessária:

```sql
CREATE DATABASE mestria_digital;
USE mestria_digital;
-- Execute o conteúdo de database.sql
```

## 🚀 Como Executar

1. Clone o repositório
2. Configure um servidor local (XAMPP, MAMP, etc.)
3. Importe o arquivo `database.sql` no MySQL
4. Configure as credenciais em `php/db.php`
5. Acesse via `localhost/infoprodutosite`

## 📧 Contato

Desenvolvido por **Izadora Doreto** – sinta-se à vontade para entrar em contato!

[![LinkedIn](https://img.shields.io/badge/LinkedIn-0077B5?style=for-the-badge&logo=linkedin&logoColor=white)](https://linkedin.com/in/seu-perfil)
[![GitHub](https://img.shields.io/badge/GitHub-100000?style=for-the-badge&logo=github&logoColor=white)](https://github.com/izadorettos)

---

## 📄 Licença

Este projeto está sob a licença MIT. Veja o arquivo [LICENSE](LICENSE) para mais detalhes.

---

**⭐ Se este projeto foi útil para você, considere dar uma estrela!**
