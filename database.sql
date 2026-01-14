-- 1. Criar a tabela de usuários
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    token_login VARCHAR(255) DEFAULT NULL,
    status_pagamento ENUM('pendente', 'pago') DEFAULT 'pendente',
    pago TINYINT(1) DEFAULT 0, -- 0 = Não Pago, 1 = Pago
    status_assinatura ENUM('inativo', 'ativo') DEFAULT 'ativo',
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 2. Tabela de Cursos
CREATE TABLE cursos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    descricao TEXT,
    imagem VARCHAR(255),
    data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 3. Tabela de Matrículas (Relaciona Usuários e Cursos)
CREATE TABLE matriculas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    curso_id INT NOT NULL,
    progresso INT DEFAULT 0, -- Porcentagem (0 a 100)
    ultima_aula VARCHAR(100) DEFAULT 'Introdução',
    data_matricula TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id),
    FOREIGN KEY (curso_id) REFERENCES cursos(id)
);

-- 4. Inserir dados iniciais
INSERT INTO cursos (nome, descricao, imagem) VALUES 
('Mestria Digital', 'O curso completo para infoprodutores de elite.', 'laptop-mockup.png');

-- 5. Inserir um usuário de teste
-- E-mail: teste@email.com | Senha: 123
INSERT INTO usuarios (nome, email, senha) 
VALUES ('Aluno Teste', 'teste@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi');

-- Matricular o usuário de teste no curso (ajuste os IDs se necessário após a execução)
-- INSERT INTO matriculas (usuario_id, curso_id, progresso) VALUES (1, 1, 15);


