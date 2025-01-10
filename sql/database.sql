CREATE DATABASE tccpetdoador;

USE tccpetdoador;

CREATE TABLE pets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    petname VARCHAR(20) NOT NULL,
    nomeDono VARCHAR(40) NOT NULL,
    cpfD DECIMAL(15) NOT NULL,
    telefone CHAR(15) NOT NULL,
    email VARCHAR(30) NOT NULL,
    raca VARCHAR(30) NOT NULL,
    peso DECIMAL(5,0) NOT NULL,
    idade INT(2) NOT NULL,
    foto BLOB NOT NULL,
    rua VARCHAR(50) NOT NULL,
    numero DECIMAL(6,0) NOT NULL,
    bairro VARCHAR(40) NOT NULL,
    cidade VARCHAR(30) NOT NULL,
    uf CHAR(2) NOT NULL,
    cep CHAR(9) NOT NULL,
    user VARCHAR(30) NOT NULL,
    password VARCHAR(25) NOT NULL
);
         
  CREATE TABLE vets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    vetname VARCHAR(30) NOT NULL,
    nomeDono VARCHAR(40) NOT NULL,
    cnpj CHAR(18) NOT NULL,
    telefone VARCHAR(15) NOT NULL,
    email CHAR(30) NOT NULL,
    rua VARCHAR(50) NOT NULL,
    numero DECIMAL(6,0) NOT NULL,
    bairro VARCHAR(40) NOT NULL,
    cidade VARCHAR(30) NOT NULL,
    uf CHAR(2) NOT NULL,
    cep CHAR(9) NOT NULL,
    user VARCHAR(25) NOT NULL,
    password VARCHAR(30) NOT NULL
);





