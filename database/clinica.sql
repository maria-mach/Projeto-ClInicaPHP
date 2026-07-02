DROP DATABASE IF EXISTS clinica;
CREATE DATABASE clinica CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

USE clinica;


DROP TABLE IF EXISTS usuarios;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,

    nome VARCHAR(120) NOT NULL,
    cpf VARCHAR(14) UNIQUE NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    telefone VARCHAR(20),

    cep VARCHAR(9),
    endereco VARCHAR(150),
    numero VARCHAR(10),
    bairro VARCHAR(100),
    cidade VARCHAR(100),
    estado CHAR(2),

    foto VARCHAR(255) DEFAULT 'assets/img/padrao.png',

    senha VARCHAR(255) NOT NULL,
    tipo ENUM('admin','cliente') NOT NULL DEFAULT 'cliente',

    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO usuarios (
    nome,
    cpf,
    email,
    telefone,
    cep,
    endereco,
    numero,
    bairro,
    cidade,
    estado,
    foto,
    senha,
    tipo
) VALUES
(
    'Administrador',
    '000.000.000-00',
    'admin@clinica.com',
    '(11) 99999-9999',
    '00000-000',
    'Rua Principal',
    '100',
    'Centro',
    'São Paulo',
    'SP',
    'assets/img/padrao.png',
    '$2y$10$9o9V/oK3BLRi9vCnZhSsheZxz4JBBVSLuKABLbEMy8Djh72f7UHfS',
    'admin'
),
(
    'João Cliente',
    '111.111.111-11',
    'cliente@clinica.com',
    '(11) 98888-8888',
    '11111-111',
    'Rua das Flores',
    '50',
    'Jardim Primavera',
    'São Paulo',
    'SP',
    'assets/img/padrao.png',
    '$2y$10$9o9V/oK3BLRi9vCnZhSsheZxz4JBBVSLuKABLbEMy8Djh72f7UHfS',
    'cliente'
);
CREATE TABLE comentarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL,
    assunto VARCHAR(150) NOT NULL,
    tipo ENUM('comentario', 'duvida', 'sugestao') NOT NULL,
    mensagem TEXT NOT NULL,
    status ENUM('pendente', 'aprovado', 'respondido', 'arquivado') NOT NULL DEFAULT 'pendente',
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO comentarios (nome, email, assunto, tipo, mensagem, status) VALUES
('Carlos M.', 'carlos@email.com', 'Atendimento', 'comentario', 'Fui muito bem atendido, recomendo a clínica!', 'aprovado'),
('Ana P.', 'ana@email.com', 'Equipe', 'comentario', 'Equipe atenciosa e profissional, me senti segura.', 'aprovado'),
('João R.', 'joao@email.com', 'Estrutura', 'comentario', 'Ótima estrutura e médicos excelentes.', 'aprovado'),
('Maria S.', 'maria@email.com', 'Horário de atendimento', 'duvida', 'Gostaria de saber se a clínica atende aos sábados.', 'pendente'),
('Fernanda L.', 'fernanda@email.com', 'Sugestão', 'sugestao', 'Seria interessante ter confirmação de consulta por WhatsApp.', 'pendente');

CREATE TABLE servicos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(120) NOT NULL,
    categoria ENUM('consulta','exame','cirurgia') NOT NULL,
    descricao TEXT NOT NULL,
    preco DECIMAL(10,2) NOT NULL,
    imagem VARCHAR(255) NOT NULL,
    status ENUM('ativo','inativo') NOT NULL DEFAULT 'ativo',
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO servicos (nome, categoria, descricao, preco, imagem, status) VALUES
('Consulta Cardiológica', 'consulta', 'Avaliação completa da saúde do coração realizada por especialista.', 250.00, 'uploads/servicos/servico_6a41bcba5828f6.87306057.jpg', 'ativo'),
('Hemograma Completo', 'exame', 'Exame laboratorial para avaliação geral da saúde.', 120.00, 'uploads/servicos/servico_6a41bcc5780112.79701807.jpeg', 'ativo'),
('Cirurgia Ambulatorial', 'cirurgia', 'Procedimentos cirúrgicos de pequeno porte com equipe especializada.', 1500.00, 'uploads/servicos/servico_6a41bcd73678f7.78747351.jpg', 'ativo');

CREATE TABLE unidades (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(120) NOT NULL,
    endereco VARCHAR(200) NOT NULL,
    telefone VARCHAR(30) NOT NULL,
    horario VARCHAR(100) NOT NULL,

    dias_funcionamento VARCHAR(20) NOT NULL DEFAULT '1,2,3,4,5',
    hora_inicio TIME NOT NULL DEFAULT '08:00:00',
    hora_fim TIME NOT NULL DEFAULT '17:00:00',

    status ENUM('ativo','inativo') NOT NULL DEFAULT 'ativo',
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO unidades
(nome, endereco, telefone, horario, dias_funcionamento, hora_inicio, hora_fim, status)
VALUES
(
'Unidade Centro',
'Rua das Flores, 123 - Centro',
'(11) 4002-8922',
'Segunda a sexta, das 8h às 18h',
'1,2,3,4,5',
'08:00:00',
'18:00:00',
'ativo'
),
(
'Unidade Zona Sul',
'Av. Saúde, 500 - Zona Sul',
'(11) 98765-4321',
'Segunda a sábado, das 7h às 17h',
'1,2,3,4,5,6',
'07:00:00',
'17:00:00',
'ativo'
);

CREATE TABLE agendamentos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    servico_id INT NOT NULL,
    unidade_id INT NOT NULL,
    data_agendamento DATE NOT NULL,
    horario TIME NOT NULL,
    status ENUM('pendente', 'confirmado', 'cancelado', 'concluido') NOT NULL DEFAULT 'confirmado',
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE,
    FOREIGN KEY (servico_id) REFERENCES servicos(id),
    FOREIGN KEY (unidade_id) REFERENCES unidades(id)
);



