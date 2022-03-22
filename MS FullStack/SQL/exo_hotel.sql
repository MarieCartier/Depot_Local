/*1 nom de l'hotel et ville*/
SELECT hot_nom, hot_ville FROM hotel

/*2 nom, prénom, adresse de Mr WHITE*/
SELECT CONCAT(cli-nom, ' ', cli_prenom) AS 'Client', CONCAT(cli_adresse, ' ', cli_ville) AS 'Adresse'
FROM client 
WHERE cli_nom = 'White'

/*3 nom et altitude des stations < 1000m */
SELECT sta_nom, sta_altitude FROM station 
WHERE sta_altitude <1000

/*4 n° et capacité chambre > 1 */
SELECT cha_numero, cha_capacite FROM chambre
WHERE cha_capacite > 1

/*5 nom et ville client n'habitant pas à Londres*/
SELECT cli_nom, cli_ville FROM client
WHERE cli_ville <> 'Londres'

/*6 nom hotel, ville, catégorie des hotel situés à Bretou + catégorie > 3*/
SELECT hot_nom, hot_ville, hot_categorie FROM hotel
WHERE (hot_ville = 'Bretou' AND hot_categorie >3)

/*7 nom station + nom, catégorie, ville hotel -> liste des hotels avec leur station*/
SELECT sta_nom, hot_nom, hot_categorie, hot_ville
FROM station, hotel

/*8 nom, catégorie, ville hotel + numéro de chambre*/
SELECT hot_nom, hot_categorie, hot_ville, cha_numero
FROM hotel, chambre

/*9 nom, catégorie, ville hotel + numéro, capacité chambre de +d'1 place à Bretou */
SELECT hot_nom, hot_categorie, hot_ville, cha_numero, cha_capacite
FROM hotel, chambre
WHERE cha_capacite > 1 AND hot_ville = 'Bretou'

/*10 nom client, nom hotel, date réservation*/
SELECT cli_nom, hot_nom, res_date
FROM hotel
JOIN chambre
ON hot_id = cha_hot_id
JOIN reservation 
ON cha_id = res_cha_id
JOIN client 
ON cli_id = res_cli_id

/*11 nom station, nom hotel, numéro et capacité chambre*/
SELECT sta_nom, hot_nom, cha_numero, cha_capacite
FROM station
JOIN hotel
ON sta_id = hot_sta_id
JOIN chambre
ON hot_id = cha_hot-id

/*12 nom client, nom hotel, date début, durée séjour*/
SELECT cli_nom, hot_nom, res_date_debut, DATEDIFF(res_date_debut, res_date_fin)
FROM hotel
JOIN chambre
ON hot_id = cha_hot_id
JOIN reservation
ON cha_id = res_cha_id
JOIN client
ON cli_id = res_cli_id

/*13 nombre d'hotel par station*/
SELECT COUNT(hot_id), hot_sta_id
FROM hotel
GROUP BY hot_sta_id

/*14 nombre de chambre par station*/
SELECT COUNT(cha_id), hot_sta_id
FROM chambre
JOIN hotel
ON cha_hot_id = hot_id
GROUP BY hot_sta_id

/*15 nombre de chambre par station avec capacité > 1*/
SELECT COUNT(cha_id), hot_sta_id
FROM chambre
JOIN hotel
ON cha_hot_id = hot_id AND cha_capacite > 1
GROUP BY hot_sta_id

/*16 liste des hotels réservés par M.SQUIRE*/
SELECT hot_nom
FROM hotel
JOIN chambre
ON hot_id = cha_hot_id
JOIN reservation
ON cha_id = res_cha_id
JOIN client
ON cli_id = res_cli_id AND cli_nom = 'Squire'

/*17 durée moyenne des réservations par station*/
SELECT AVG(DATEDIFF(res_date_fin, res_date_debut)), hot_sta_id
FROM hotel
JOIN chambre
ON hot_id = cha_hot_id
JOIN reservation
ON cha_id = res_cha_id
GROUP BY hot_sta_id