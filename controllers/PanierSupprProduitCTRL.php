<?php

// PanierSupprProduitCTRL.php

$idMenu = filter_input(INPUT_GET, "id_menu"); // Récupère l'ID du menu à supprimer

$panier = filter_input(INPUT_COOKIE, "panier"); // Récupère le contenu du panier depuis les cookies

if ($idMenu !== null && $panier !== null) { // Vérifie si l'ID du menu et le panier ne sont pas nuls
    $t = explode("-.-", $panier); // Divise le contenu du panier en un tableau en utilisant le délimiteur "-.-"
    $updatedPanier = [];
    foreach ($t as $element) { // Parcourt les éléments du tableau $t
        $t2 = explode("#", $element); // Divise chaque élément en un sous-tableau en utilisant le délimiteur "#"
        $currentIdMenu = $t2[0]; // Récupère l'ID du menu de l'élément courant
        if ($currentIdMenu != $idMenu) { // Vérifie si l'ID du menu courant est différent de l'ID du menu à supprimer
            $updatedPanier[] = $element; // Ajoute l'élément courant au nouveau tableau du panier mis à jour
        }
    }
    $panier = implode("-.-", $updatedPanier); // Reconstitue le contenu du panier mis à jour en utilisant le délimiteur "-.-"
    setcookie("panier", $panier, time() + (3600 * 24 * 14)); // Met à jour le cookie avec le nouveau contenu du panier
}

header("Location: ../controllers/PanierViewCTRL.php"); // Redirige l'utilisateur vers le contrôleur PanierViewCTRL.php
exit(); // Termine l'exécution du script

?>