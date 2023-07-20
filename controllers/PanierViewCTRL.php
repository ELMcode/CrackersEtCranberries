<?php

// PanierViewCTRL.php

$panier = filter_input(INPUT_COOKIE, "panier");

$t = $panier !== null ? explode("-.-", $panier) : null;

if ($t === null) {
    $message = "Panier vide";
    include('../views/PanierView.php');
} else {
    $table = "";
    foreach ($t as $element) {
        $t2 = explode("#", $element);
        $table .= "<tr>";

        foreach ($t2 as $value) {
            $table .= "<td>$value</td>";
        }

        $idMenu = $t2[0];
        $table .= "<td><a href='../controllers/PanierSupprProduitCTRL.php?id_menu=$idMenu' class='button'>Supprimer</a></td>";

        $table .= "</tr>";
    }

    include('../views/PanierView.php');
}

?>