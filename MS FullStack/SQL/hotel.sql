DROP DATABASE hotel;
CREATE DATABASE hotel;
USE hotel;
CREATE TABLE station (
num_station INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
nom_station VARCHAR(50) NOT NULL
);
CREATE TABLE client (
adresse_client VARCHAR(50),
nom_client VARCHAR(50) NOT NULL,
prenom_client VARCHAR(50),
num_client INT NOT NULL AUTO_INCREMENT PRIMARY KEY
);
CREATE TABLE hotel (
capacite_hotel INT NOT NULL,
categorie_hotel VARCHAR(50),
nom_hotel VARCHAR(50) NOT NULL,
adresse_hotel VARCHAR(50),
num_hotel INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
num_station INT NOT NULL,
FOREIGN KEY (num_station) REFERENCES station (num_station)
);
CREATE TABLE chambre (
capacite_chambre INT NOT NULL,
degre_confort INT NOT NULL,
exposition VARCHAR(50),
type_chambre VARCHAR(50),
num_chambre INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
num_hotel INT NOT NULL,
FOREIGN KEY (num_hotel) REFERENCES hotel (num_hotel)
);
CREATE TABLE reservation (
num_chambre INT NOT NULL,
num_client INT NOT NULL,
date_debut DATE NOT NULL,
date_fin DATE NOT NULL,
date_reservation DATE,
montant_arrhes DECIMAL,
prix_total DECIMAL NOT NULL,
FOREIGN KEY (num_chambre) REFERENCES chambre (num_chambre),
FOREIGN KEY (num_client) REFERENCES client (num_client)
)