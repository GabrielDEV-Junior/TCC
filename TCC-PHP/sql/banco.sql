CREATE DATABASE tcc_inventario;

USE tcc_inventario;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    usuario VARCHAR(50) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL
);

CREATE TABLE ativos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    descricao TEXT,
    status VARCHAR(50) DEFAULT 'Disponível',
    localizacao VARCHAR(100)
);

CREATE TABLE movimentacoes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_ativo INT NOT NULL,
    destino VARCHAR(100),
    data_movimentacao DATETIME DEFAULT CURRENT_TIMESTAMP,
    responsavel VARCHAR(100),
    FOREIGN KEY (id_ativo) REFERENCES ativos(id) ON DELETE CASCADE
);
