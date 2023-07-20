<?php
// --- SQL paramétré : DevisDeleteCTRL.php
// Inclusion de la "bibliothèque" Connexion
require_once '../lib/Connexion.php';
// Inclusion de la "bibliothèque" du DAO
require_once '../daos/DevisDAO.php';



// partie tableau liste client

// Connexion à la base de données
$pdo = seConnecter("../conf/crackersetcranberries.ini");

// Appel de la fonction selectAll du DAO
$selectAll = selectAll($pdo);

// Fin partie  liste client



$message = "";
$btDelete = filter_input(INPUT_POST, "btDelete");

if ($btDelete != NULL) {


    // Récupération des saisies utilisateur

    $idDevis = filter_input(INPUT_POST, "idDevis");

    // Test de la validité des saisies
    if ($idDevis != null) {

        try {

            // Connexion

            // $pdo = seConnecter("../conf/crackersetcranberries.ini");

            //SUPPRESSION PAR APPEL DE LA FONCTION DU DAO


            // Appel de la fonction du DAO
            $affected = delete($pdo, $idDevis);
            // var_dump($affected);
            if ($affected === 1) {
                //$pdo->commit();
                $message = "Devis supprimé !";

                // Redirection (Reactualisation) de la page 
                header('Location: ../controllers/DevisDeleteCTRL.php');
                exit();

            } else {
                //$pdo->rollback();
                $message = "Problème de suppression, veuillez contacter votre administrateur.";
            }

            $pdo = null;
        } catch (PDOException $e) {
            $message = $e->getMessage();
        }
    } else {
        $message = "l'ID du devis à supprimer est obligatoire";
    }

}

// "Retour" à l'IHM
include '../views/DevisDeleteIHM.php';