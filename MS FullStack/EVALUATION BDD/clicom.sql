/*Création de la base de données*/

DROP DATABASE IF EXISTS clicom;

CREATE DATABASE clicom;

USE clicom;

CREATE TABLE `client`(
    cli_num INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    cli_nom VARCHAR(50),
    cli_adresse VARCHAR(50),
    cli_tel VARCHAR(30)
);

CREATE TABLE `commande` (
	com_num INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	cli_num INT NOT NULL,
	com_date DATETIME,
	com_obs VARCHAR(50),
	CONSTRAINT `fk_3` FOREIGN KEY (`cli_num`) REFERENCES `client` (`cli_num`)
);

CREATE TABLE `produit` (
    pro_num INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    pro_libelle VARCHAR(50),
    pro_description VARCHAR(50)
);

CREATE TABLE `est_compose` (
    com_num INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    pro_num INT,
    est_qte INT,
    CONSTRAINT `fk_1` FOREIGN KEY (`com_num`) REFERENCES `commande` (`com_num`),
    CONSTRAINT `fk_2` FOREIGN KEY (`pro_num`) REFERENCES `produit` (`pro_num`)
);

/*Ajout d'un index à cli_nom*/

CREATE INDEX `k_1` ON `client` (`cli_nom`);
