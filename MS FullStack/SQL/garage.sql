DROP DATABASE IF EXISTS garage; 

CREATE DATABASE garage;  

USE garage; 

CREATE TABLE voiture ( 
        voit_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
        voit_marque VARCHAR(50) NOT NULL, 
        voit_prix INT 
); 

INSERT INTO voiture (voit_id, voit_marque, voit_prix) VALUES (1, 'Audi', 29990); 
INSERT INTO voiture (voit_id, voit_marque, voit_prix) VALUES (2, 'BMW', 8500); 
INSERT INTO voiture (voit_id, voit_marque, voit_prix) VALUES (3, 'Ford', 15550); 


CREATE TABLE stagiaires(
        sta_id      INT NOT NULL PRIMARY KEY AUTO_INCREMENT,/*clé primaire*/
        sta_nom     VARCHAR(50) NOT NULL,
        sta_prenom  VARCHAR(50) NOT NULL,
        sta_adresse VARCHAR(50),
        sta_tel     VARCHAR(30)
);

CREATE TABLE formations(
        form_code         INT NOT NULL PRIMARY KEY AUTO_INCREMENT,/*clé primaire*/
        form_duree_heures INT NOT NULL,
        form_libelle      VARCHAR(50) NOT NULL,
        form_description  VARCHAR(50)
);

CREATE TABLE form_stagiaires(
        form_code INT NOT NULL,
        sta_id    INT NOT NULL,
        FOREIGN KEY (form_code) REFERENCES formations (form_code), /*clé étrangère*/
        FOREIGN KEY (sta_id) REFERENCES stagiaires (sta_id)/*clé étrangère*/
);


/*Pour créer un index*/
CREATE [ UNIQUE ] INDEX nom_index 
ON nom_table ( nom_colonne1 [ ASC | DESC ] [, ... nom_colonne2 ] ) 

/*Pour visualiser un index*/
SHOW INDEX from *nom_de_la_table* 
