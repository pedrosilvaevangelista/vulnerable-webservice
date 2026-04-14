CREATE DATABASE IF NOT EXISTS confiavel_db;
USE confiavel_db;

-- Tabela de usuários (sistema de autenticação)
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255),
    password VARCHAR(255),
    role VARCHAR(50) DEFAULT 'operator',
    full_name VARCHAR(255),
    last_login DATETIME
);

INSERT INTO users (username, password, role, full_name, last_login) VALUES 
('admin', 'seguro123', 'admin', 'Carlos Administrador', '2026-04-13 14:30:00'),
('operador1', 'op2026!', 'operator', 'Mariana Santos', '2026-04-12 09:15:00'),
('gerente', 'ger@2026', 'manager', 'Roberto Mendes', '2026-04-11 16:45:00');

-- Tabela de clientes (segurados)
CREATE TABLE IF NOT EXISTS clientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255),
    email VARCHAR(255),
    cpf VARCHAR(20),
    telefone VARCHAR(20),
    endereco VARCHAR(255),
    foto VARCHAR(255),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO clientes (nome, email, cpf, telefone, endereco, foto) VALUES 
('João Pedro Silva', 'joao.silva@gmail.com', '123.456.789-00', '(11) 98765-4321', 'Rua das Flores, 120 - São Paulo/SP', 'assets/img/profiles/p1.jpg'),
('Maria Clara Souza', 'maria.souza@outlook.com', '234.567.890-11', '(21) 91234-5678', 'Av. Atlântica, 450 - Rio de Janeiro/RJ', 'assets/img/profiles/p2.jpg'),
('Pedro Henrique Santos', 'pedro.santos@yahoo.com', '345.678.901-22', '(31) 93456-7890', 'Rua da Liberdade, 78 - Belo Horizonte/MG', 'assets/img/profiles/p3.jpg'),
('Ana Beatriz Oliveira', 'ana.oliveira@gmail.com', '456.789.012-33', '(41) 92345-6789', 'Av. Batel, 1500 - Curitiba/PR', 'assets/img/profiles/p4.jpg'),
('Carlos Eduardo Lima', 'carlos.lima@hotmail.com', '567.890.123-44', '(51) 94567-8901', 'Rua dos Andradas, 330 - Porto Alegre/RS', 'assets/img/profiles/p5.jpg'),
('Júlia Fernanda Costa', 'julia.costa@gmail.com', '678.901.234-55', '(61) 95678-9012', 'SQN 308, Bloco A - Brasília/DF', 'assets/img/profiles/p6.jpg'),
('Lucas Gabriel Rocha', 'lucas.rocha@outlook.com', '789.012.345-66', '(71) 96789-0123', 'Rua Chile, 45 - Salvador/BA', 'assets/img/profiles/p7.jpg'),
('Fernanda Cristina Melo', 'fernanda.melo@gmail.com', '890.123.456-77', '(81) 97890-1234', 'Av. Boa Viagem, 2200 - Recife/PE', 'assets/img/profiles/p8.jpg'),
('Rafael Augusto Teixeira', 'rafael.teixeira@yahoo.com', '901.234.567-88', '(85) 98901-2345', 'Av. Beira Mar, 890 - Fortaleza/CE', 'assets/img/profiles/p9.jpg'),
('Beatriz Helena Ramos', 'beatriz.ramos@gmail.com', '012.345.678-99', '(92) 99012-3456', 'Rua Marechal Deodoro, 56 - Manaus/AM', 'assets/img/profiles/p10.jpg');

-- Tabela de apólices (seguros)
CREATE TABLE IF NOT EXISTS apolices (
    id INT AUTO_INCREMENT PRIMARY KEY,
    codigo VARCHAR(20),
    cliente_id INT,
    tipo VARCHAR(100),
    valor_cobertura DECIMAL(12,2),
    premio_mensal DECIMAL(10,2),
    status VARCHAR(30) DEFAULT 'Ativa',
    data_inicio DATE,
    data_fim DATE,
    observacoes TEXT,
    FOREIGN KEY (cliente_id) REFERENCES clientes(id)
);

INSERT INTO apolices (codigo, cliente_id, tipo, valor_cobertura, premio_mensal, status, data_inicio, data_fim) VALUES 
('AZ-2026-001', 1, 'Seguro Automóvel', 85000.00, 320.50, 'Ativa', '2026-01-15', '2027-01-15'),
('AZ-2026-002', 1, 'Seguro Residencial', 350000.00, 180.00, 'Ativa', '2026-02-01', '2027-02-01'),
('AZ-2026-003', 2, 'Seguro de Vida', 500000.00, 250.75, 'Ativa', '2026-03-10', '2027-03-10'),
('AZ-2026-004', 3, 'Seguro Automóvel', 62000.00, 280.00, 'Pendente', '2026-04-01', '2027-04-01'),
('AZ-2026-005', 4, 'Seguro Empresarial', 1200000.00, 1500.00, 'Ativa', '2025-06-15', '2026-06-15'),
('AZ-2026-006', 5, 'Seguro Viagem', 150000.00, 89.90, 'Expirada', '2025-12-01', '2026-03-01'),
('AZ-2026-007', 6, 'Seguro de Vida', 750000.00, 380.00, 'Ativa', '2026-01-20', '2027-01-20'),
('AZ-2026-008', 7, 'Seguro Automóvel', 45000.00, 195.00, 'Sinistro', '2025-09-01', '2026-09-01'),
('AZ-2026-009', 8, 'Seguro Residencial', 420000.00, 210.50, 'Ativa', '2026-02-15', '2027-02-15'),
('AZ-2026-010', 9, 'Seguro de Vida', 300000.00, 150.00, 'Cancelada', '2025-07-01', '2026-07-01'),
('AZ-2026-011', 10, 'Seguro Automóvel', 95000.00, 350.00, 'Ativa', '2026-03-01', '2027-03-01'),
('AZ-2026-012', 2, 'Seguro Residencial', 600000.00, 290.00, 'Ativa', '2026-01-10', '2027-01-10'),
('AZ-2026-013', 5, 'Seguro de Vida', 400000.00, 200.00, 'Pendente', '2026-04-05', '2027-04-05'),
('AZ-2026-014', 8, 'Seguro Viagem', 100000.00, 75.00, 'Ativa', '2026-04-10', '2026-10-10');
