<?php

//MenuCTRL.php

require_once "../lib/Connexion.php";


require_once "../daos/MenuDAO.php";

$pdo = seConnecter("../conf/crackersetcranberries.ini");
$tbody = "";
$array = selectCols($pdo, "id_menu", "nom_menu", "prix_2pers_menu", "prix_4pers_menu");

// tableau $tbody codé dans MenuView.php

include '../views/MenuView.php';

?>