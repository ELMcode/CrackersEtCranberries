<?php
// --- SQL paramétré : ClientInsertCTRL.php
// Inclusion de la "bibliothèque" Connexion
require_once '../lib/Connexion.php';
// Inclusion de la "bibliothèque" du DAO
require_once '../daos/ClientDAO.php';



// partie tableau liste client

// Connexion à la base de données
$pdo = seConnecter("../conf/crackersetcranberries.ini");

// Appel de la fonction selectAll du DAO
$selectAll = selectAll($pdo);

// Fin partie  liste client


$message = "";
$btInsert = filter_input(INPUT_POST, "btInsert");

if ($btInsert != NULL) {


    // Récupération des saisies utilisateur

    $nomClient = filter_input(INPUT_POST, "nomClient");
    $prenomClient = filter_input(INPUT_POST, "prenomClient");
    $adresseClient = filter_input(INPUT_POST, "adresseClient");
    $dateNaissanceClient = filter_input(INPUT_POST, "dateNaissanceClient");
    $cpClient = filter_input(INPUT_POST, "cpClient");
    $emailClient = filter_input(INPUT_POST, "emailClient");
    $mdpClient = filter_input(INPUT_POST, "mdpClient");
    $telephoneClient = filter_input(INPUT_POST, "telephoneClient");
    $paysClient = filter_input(INPUT_POST, "paysClient");
    $villeClient = filter_input(INPUT_POST, "villeClient");



    // Test de la validité des saisies
    if ($nomClient != null && $prenomClient != null && $adresseClient != null && $dateNaissanceClient != null && $cpClient != null && $emailClient != null && $mdpClient != null && $telephoneClient != null && $paysClient != null && $villeClient != null) {

        try {
            /*
             * Connexion
             */
            // $pdo = seConnecter("../conf/crackersetcranberries.ini");
            /*
             * INSERTION PAR APPEL DE LA FONCTION DU DAO
             */
            //$pdo->beginTransaction();
            $tAttributesValues = array();
            // Ajout d'items dans le tableau et affectation des saisies
            $tAttributesValues["nom_client"] = $nomClient;
            $tAttributesValues["prenom_client"] = $prenomClient;
            $tAttributesValues["adresse_client"] = $adresseClient;
            $tAttributesValues["date_naissance_client"] = $dateNaissanceClient;
            $tAttributesValues["cp_client"] = $cpClient;
            $tAttributesValues["email_client"] = $emailClient;
            $tAttributesValues["mdp_client"] = $mdpClient;
            $tAttributesValues["telephone_client"] = $telephoneClient;
            $tAttributesValues["pays_client"] = $paysClient;
            $tAttributesValues["ville_client"] = $villeClient;



            // Appel de la fonction du DAO
            $affected = insert($pdo, $tAttributesValues);
            if ($affected === 1) {
                //$pdo->commit();
                $message = "Nouveau client ajouté !";

                // Redirection (Reactualisation) de la page 
                header('Location: ../controllers/ClientInsertCTRL.php');
                exit();

            } else {
                //$pdo->rollback();
                $message = "Problème d'insertion, veuillez contacter votre administrateur.";
            }

            $pdo = null;
        } catch (PDOException $e) {
            $message = $e->getMessage();
        }
    } else {
        $message = "Toutes les saisies sont obligatoires";
    }

}

// "Retour" à l'IHM
include '../views/ClientInsertIHM.php';