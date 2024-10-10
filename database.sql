CREATE DATABASE petdoador;
--!Manu
USE petdoador;

CREATE TABLE endereço (
    id INT AUTO_INCREMENT PRIMARY KEY,

    rua VARCHAR(15) NOT NULL,
    numero VARCHAR(25) NOT NULL,
    bairro VARCHAR(25) NOT NULL,
    cidade VARCHAR(25) NOT NULL,
    uf VARCHAR(25) NOT NULL,
    cep VARCHAR(25) NOT NULL,
);

CREATE TABLE pets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    petname VARCHAR(25) NOT NULL,
    nomeDono VARCHAR(25) NOT NULL,
    cpfD CHAR(14) NOT NULL,

    telefone VARCHAR(15) NOT NULL,
    email VARCHAR(25) NOT NULL,
    raca VARCHAR(25) NOT NULL,
    peso VARCHAR(25) NOT NULL,
    idade VARCHAR(25) NOT NULL,
    foto VARCHAR(25) NOT NULL,
    user VARCHAR(25) NOT NULL,
    password VARCHAR(25) NOT NULL,
    endereço INT,
    FOREIGN KEY (endereço) REFERENCES endereço(id),
);
         
  CREATE TABLE vets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    vetname VARCHAR(25) NOT NULL,
    nomeDono VARCHAR(25) NOT NULL,

    cnpj CHAR(14) NOT NULL,
    telefone VARCHAR(15) NOT NULL,
    email VARCHAR(25) NOT NULL,
    user VARCHAR(25) NOT NULL,
    password VARCHAR(25) NOT NULL,
    endereço INT,
    FOREIGN KEY (endereço) REFERENCES endereço(id),
);

