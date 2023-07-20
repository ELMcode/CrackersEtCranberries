<?php
//InscriptionCTRL

// Inclusion de la "bibliothèque" Connexion
require_once '../lib/Connexion.php';

// Inclusion de la "bibliothèque" du DAO
require_once '../daos/AuthentificationDAO.php';

// recupération des données formulaire

$civilite = filter_input(INPUT_POST, "civilite");
$nom = filter_input(INPUT_POST, "nom");
$prenom = filter_input(INPUT_POST, "prenom");
$datenaissance = filter_input(INPUT_POST, "datenaissance");
$email = filter_input(INPUT_POST, "email");
$email2 = filter_input(INPUT_POST, "email2");
$pseudo = filter_input(INPUT_POST, "pseudo");
$mdp = filter_input(INPUT_POST, "mdp");
$mdp2 = filter_input(INPUT_POST, "mdp2");
$adresse = filter_input(INPUT_POST, "adresse");
$ville = filter_input(INPUT_POST, "ville");
$hobbies = filter_input(INPUT_POST, "hobbies");
$newsletter = filter_input(INPUT_POST, "newsletter");

// Requête SQL pour insérer les données
$sql = "INSERT INTO client (civilite, nom, prenom, datenaissance, email, pseudo, mdp, adresse, ville, hobbies, newsletter) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $connexion->prepare($sql);
$stmt->bind_param("sssssssssss", $civilite, $nom, $prenom, $datenaissance, $email, $pseudo, $mdp, $adresse, $ville, $hobbies, $newsletter);
$stmt->execute();










include "../views/inscription.php";
?>