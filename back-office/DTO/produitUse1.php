<?php

// testProduit.php

require_once("Produit.php");

// Instanciation d'un objet Produit et utilisation
$produit1 = new Produit(1, "Chèvre cendré", 0, 0, "Fromage", "chevre.jpg");
echo "ID Produit : " . $produit1->getIdProduit() . "<br>";
echo "Nom du produit : " . $produit1->getNomProduit() . "<br>";
echo "Prix du produit : " . $produit1->getPrixProduit() . "<br>";
echo "Quantité en stock : " . $produit1->getQteStockProduit() . "<br>";
echo "Catégorie du produit : " . $produit1->getCategorieProduit() . "<br>";
echo "Photo du produit : " . $produit1->getPhotoProduit() . "<br><br>";

// Instanciation d'un autre objet Produit et utilisation
$produit2 = new Produit(2, "Pecorino Pepato", 0, 0, "Fromage", "pecorino.jpg");
echo "ID Produit : " . $produit2->getIdProduit() . "<br>";
echo "Nom du produit : " . $produit2->getNomProduit() . "<br>";
echo "Prix du produit : " . $produit2->getPrixProduit() . "<br>";
echo "Quantité en stock : " . $produit2->getQteStockProduit() . "<br>";
echo "Catégorie du produit : " . $produit2->getCategorieProduit() . "<br>";
echo "Photo du produit : " . $produit2->getPhotoProduit() . "<br><br>";

// Instanciation d'un autre objet Produit et utilisation
$produit3 = new Produit(3, "Morbier AOP", 0, 0, "Fromage", "morbier.jpg");
echo "ID Produit : " . $produit3->getIdProduit() . "<br>";
echo "Nom du produit : " . $produit3->getNomProduit() . "<br>";
echo "Prix du produit : " . $produit3->getPrixProduit() . "<br>";
echo "Quantité en stock : " . $produit3->getQteStockProduit() . "<br>";
echo "Catégorie du produit : " . $produit3->getCategorieProduit() . "<br>";
echo "Photo du produit : " . $produit3->getPhotoProduit() . "<br><br>";

?>