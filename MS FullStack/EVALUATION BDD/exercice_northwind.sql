/*1- Liste des fournisseurs français */

SELECT CompanyName AS 'Société', ContactName AS 'Contact', ContactTitle AS 'Fonction', Phone AS 'Téléphone'
FROM suppliers
WHERE Country = 'France';

/*2- Liste des produits vendus pas Exotic Liquids avec prix*/
SELECT ProductName AS 'Produit', UnitPrice AS 'Prix'
FROM products
JOIN suppliers
ON suppliers.SupplierID= products.SupplierID 
AND CompanyName = 'Exotic Liquids';

/*3- Nombre des produits par fournisseurs français en ordre décroissant */
SELECT CompanyName AS 'Fournisseur', COUNT(ProductID) AS 'Nbre produits'
FROM suppliers
JOIN products
ON suppliers.SupplierID = products.SupplierID 
AND Country = 'France'
GROUP BY CompanyName
ORDER BY CompanyName DESC;

/*4- Clients français avec + de 10 commandes */
SELECT CompanyName AS 'Client', COUNT(OrderID) AS 'Nbre commandes'
FROM customers
JOIN orders
ON customers.CustomerID = orders.CustomerID
AND Country = 'FRANCE'
GROUP BY CompanyName
HAVING COUNT(OrderId) > 10;

/*5- Clients dont montant cumulé des commandes > 10000€ */
SELECT CompanyName AS 'Client', SUM(UnitPrice*Quantity) AS 'CA', Country AS 'Pays'
FROM customers
JOIN orders
ON customers.CustomerID = orders.CustomerID
JOIN order_details
ON orders.OrderID = order_details.OrderID
GROUP BY CompanyName
HAVING SUM(UnitPrice*Quantity) > 10000;

/*6- Pays de livraison fournis par Exotic Liquids */
SELECT ShipCountry AS 'Pays'
FROM orders
JOIN `order details`
ON orders.OrderID = `order details`.OrderID
JOIN products 
ON `order details`.ProductID = products.ProductID
JOIN suppliers
ON products.SupplierID = suppliers.SupplierID
AND CompanyName = 'Exotic Liquids'
GROUP BY ShipCountry;

/*7- Prix total ventes (CA) en 1997 */
SELECT SUM(UnitPrice*Quantity) AS 'Montant Ventes 97'
FROM `order details`
JOIN orders
ON orders.OrderID = `order details`.OrderID
AND YEAR (OrderDate) = '1997'
GROUP BY YEAR (OrderDate);

/*8- Prix total ventes (CA) en 1997 par mois */
SELECT MONTH(OrderDate), SUM(UnitPrice*Quantity) AS 'Montant Ventes 97'
FROM `order details`
JOIN orders
ON orders.OrderID = `order details`.OrderID
AND YEAR (OrderDate) = '1997'
GROUP BY MONTH (OrderDate);

/*9- Date dernière commande client Du monde entier */
SELECT MAX(OrderDate) AS 'Date dernière commande'
FROM orders
JOIN customers
ON customers.CustomerID = orders.CustomerID
AND CompanyName = 'Du monde entier';

/*10- Délai moyen de livraison en jours */
SELECT ROUND(AVG(DATEDIFF(ShippedDate, OrderDate))) AS 'Délai moyen de livraison en jours'
FROM orders;