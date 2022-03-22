/*Besoin 1 commandes du fournisseur 09120*/ 
SELECT numcom
FROM entcom, fournis
WHERE entcom.numfou = fournis.numfou AND fournis.numfou = '09120'

/*Besoin 2 code des fournisseurs avec commandes*/
SELECT DISTINCT numfou
FROM entcom

/*MAJ 3 obscom= '*****' pour les commandes dont fournisseur a satif < 5*/
UPDATE entcom
JOIN fournis
ON fournis.numfou = entcom.numfou AND satisf < 5
SET obscom = '*****'

/* MAJ 4 supprimer produit I110 (en supprimant la clé étrangere*/
ALTER TABLE ligcom DROP CONSTRAINT `vente_ibfk_2`
DELETE FROM produit
WHERE codart = 'I110'