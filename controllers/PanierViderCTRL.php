<?php

/*
 * PanierViderCTRL
 */
$message = "Le panier a été vidé !";

setcookie("panier", "", time());

$list = array();

include '../boundaries/PanierView.php';
?>