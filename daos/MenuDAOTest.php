<?php

/* MenuDAOTests.php */

require_once '../lib/Connexion.php';
//require_once '../lib/Transaxion.php';
require_once 'MenuDAO.php';

$pdo = seConnecter("../conf/crackersetcranberries.ini");

echo "<hr>selectAll<hr>";
$content = "";
$lines = selectAll($pdo);

foreach ($lines as $line) {
    foreach ($line as $field => $value) {
        $content .= $field . ":" . $value . ";";
    }
    $content .= "\n";
}
echo nl2br($content);

echo "<hr>selectOne<hr>";
$content = "";
$line = selectOne($pdo, "1");
foreach ($line as $field => $value) {
    $content .= "$field => $value<br/>";
}
$content .= "\n";
echo nl2br($content);

echo "<hr>insert<hr>";
//$pdo->beginTransaction();
$tAttributesValues = array();
$tAttributesValues['id_menu'] = "7";
$tAttributesValues['nom_menu'] = "test";
$tAttributesValues['qte_stock_menu'] = "2";
$tAttributesValues['categorie_menu'] = "test";
$tAttributesValues['photo_menu'] = "test.jpg";
$tAttributesValues['description_menu'] = "test test";
$tAttributesValues['prix_2personnes_menu'] = "45,2";
$tAttributesValues['prix_4personnes_menu'] = "21,4";


$affected = insert($pdo, $tAttributesValues);
echo "Insertion : $affected";
//$pdo->commit();


echo "<hr>delete<hr>";
//    $pdo->beginTransaction();
//    $affected = delete($pdo, "99999");
//    echo "Suppression : $affected";
//    $pdo->commit();

echo "<hr>update<hr>";
// $tAttributesValues = array();
// $tAttributesValues['nom_ville'] = "Ville Neuve";
// $tAttributesValues['id_pays'] = "033";
// $affected = update($pdo, $tAttributesValues);
// echo "Modification : $affected";

// $pdo = null;
?>