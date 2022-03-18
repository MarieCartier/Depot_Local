DROP DATABASE IF EXISTS clicom;

CREATE DATABASE clicom;

USE clicom;

CREATE TABLE client (
    cli_num INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    cli_nom VARCHAR(50),
    cli_adresse VARCHAR(50),
    cli_tel VARCHAR(30)
);

CREATE TABLE commande (
    com_num INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    cli_num INT NOT NULL FOREIGN KEY
    com_date
    com_obs
);

CREATE TABLE `produit` (

);

CREATE TABLE `vente` (
);