CREATE DATABASE imobiliaria;
USE imobiliaria;

CREATE TABLE clientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    cpf VARCHAR(14) NOT NULL UNIQUE,
    endereco VARCHAR(150),
    cidade VARCHAR(50),
    bairro VARCHAR(50)
);

CREATE TABLE imoveis (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tipo VARCHAR(50) NOT NULL,
    finalidade VARCHAR(20) NOT NULL,
    localizacao VARCHAR(150),
    area_construida VARCHAR(20),
    area_terreno VARCHAR(20),
    quartos INT,
    banheiros INT,
    vagas INT,
    descricao TEXT
);
