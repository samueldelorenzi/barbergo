CREATE DATABASE barbergo;

USE barbergo;


CREATE TABLE cliente (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(256),
    email VARCHAR(256),
    senha VARCHAR(256)
);


CREATE TABLE servico (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    tipo ENUM('Barba', 'Cabelo', 'Ambos') NOT NULL,
    preco DECIMAL(10,2) NOT NULL
);


CREATE TABLE agendamento (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_cliente INT NOT NULL,
    id_servico INT NOT NULL,
    data_hora DATETIME NOT NULL,
    FOREIGN KEY (id_cliente) REFERENCES cliente(id) ON DELETE CASCADE,
    FOREIGN KEY (id_servico) REFERENCES servico(id) ON DELETE SET NULL
);

