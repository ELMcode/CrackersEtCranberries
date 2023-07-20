<?php
//PanierAjoutCTRL.php


// on récupere les attributs d'URL
$idMenu = filter_input(INPUT_GET, "id_menu");
$nomMenu = filter_input(INPUT_GET, "nom_menu");
$prix2persMenu = filter_input(INPUT_GET, "prix_2pers_menu");
$prix4persMenu = filter_input(INPUT_GET, "prix_4pers_menu"); {
    // Vérifie si cookie existe avant de explode
    $panier = filter_input(INPUT_COOKIE, "panier");

    if ($panier != null) {
        // le panier n'est pas vide, cookie existant
        $panier .= "-.-$idMenu#$nomMenu#$prix2persMenu#$prix4persMenu";

    } else {
        // le panier est vide car cookie inexistant -> le panier est initialisé avec le produit actuel 
        $panier = "$idMenu#$nomMenu#$prix2persMenu#$prix4persMenu";
    }


    setcookie("panier", $panier, time() + (3600 * 24 * 14));
    // echo $panier;
}

include '../controllers/MenuCTRL.php';

?>