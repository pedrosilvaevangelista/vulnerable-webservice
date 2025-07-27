CREATE DATABASE IF NOT EXISTS azul_db;
USE azul_db;

-- Tabela de usuários (para login)
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255),
    password VARCHAR(255)
);

-- 15 usuários padrão
INSERT INTO users (username, password) VALUES 
('admin', 'seguro123'),
('root', 'sudosu');

-- Tabela de clientes
CREATE TABLE IF NOT EXISTS clientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255),
    email VARCHAR(255),
    cpf VARCHAR(20),
    apolice VARCHAR(50),
    foto VARCHAR(255)
);

-- 15 clientes padrão, todos com user.png como foto
INSERT INTO clientes (nome, email, cpf, apolice, foto) VALUES 
('João Silva', 'joao@example.com', '123.456.789-00', 'A001', 'user.png'),
('Maria Souza', 'maria@example.com', '234.567.890-11', 'A002', 'user.png'),
('Pedro Santos', 'pedro@example.com', '345.678.901-22', 'A003', 'user.png'),
('Ana Oliveira', 'ana@example.com', '456.789.012-33', 'A004', 'user.png'),
('Carlos Lima', 'carlos@example.com', '567.890.123-44', 'A005', 'user.png'),
('Júlia Costa', 'julia@example.com', '678.901.234-55', 'A006', 'user.png'),
('Lucas Rocha', 'lucas@example.com', '789.012.345-66', 'A007', 'user.png'),
('Fernanda Melo', 'fernanda@example.com', '890.123.456-77', 'A008', 'user.png'),
('Rafael Teixeira', 'rafael@example.com', '901.234.567-88', 'A009', 'user.png'),
('Beatriz Ramos', 'beatriz@example.com', '012.345.678-99', 'A010', 'user.png'),
('Vitor Prado', 'vitor@example.com', '111.222.333-44', 'A011', 'user.png'),
('Aline Duarte', 'aline@example.com', '222.333.444-55', 'A012', 'user.png'),
('Gustavo Nunes', 'gustavo@example.com', '333.444.555-66', 'A013', 'user.png'),
('Larissa Martins', 'larissa@example.com', '444.555.666-77', 'A014', 'user.png'),
('Rodrigo Alves', 'rodrigo@example.com', '555.666.777-88', 'A015', 'user.png');

