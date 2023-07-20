// Test Affichage dans CommandeInsertPOOCTRL.php après le : if ($idClient != null && $qteCommande != null &&
$dateCommande != null && $statutCommande != null && $montantTotalCommande != null) {


echo "Id Client: " . $idClient . "<br>";
echo "Quantité Commande: " . $qteCommande . "<br>";
echo "Date Commande: " . $dateCommande . "<br>";
echo "Statut Commande: " . $statutCommande . "<br>";
echo "Montant Total Commande: " . $montantTotalCommande . "<br>";


// Test Affected=1 ou pas dans CommandeInsertPOOCTRL.php

// Appel de la méthode d'insertion
$affected = $this->commandeDAO->insert($commande);
echo "affected= " . $affected;
if ($affected === 1) {


// Test dernier ID ajouté dans commandeDAOPOO.php

$cmd->execute();
// Nombre de lignes affectées (0 ou 1)
$affected = $cmd->rowCount();
// Dernier ID inséré
$lastId = $this->pdo->lastInsertId();

echo "affected= : " . $affected . "<br>";
echo "Dernier ID inséré : " . $lastId;