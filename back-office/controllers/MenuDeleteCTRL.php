<?php
// --- SQL paramétré : MenuDeleteCTRL.php
// Inclusion de la "bibliothèque" Connexion
require_once '../lib/Connexion.php';
// Inclusion de la "bibliothèque" du DAO
require_once '../daos/MenuDAO.php';



// partie tableau liste menu

// Connexion à la base de données
$pdo = seConnecter("../conf/crackersetcranberries.ini");

// Appel de la fonction selectAll du DAO
$selectAll = selectAll($pdo);

// Fin partie  liste menu



$message = "";
$btDelete = filter_input(INPUT_POST, "btDelete");

if ($btDelete != NULL) {


    // Récupération des saisies utilisateur

    $idMenu = filter_input(INPUT_POST, "idMenu");

    // Test de la validité des saisies
    if ($idMenu != null) {

        try {

            // Connexion

            // $pdo = seConnecter("../conf/crackersetcranberries.ini");

            //SUPPRESSION PAR APPEL DE LA FONCTION DU DAO


            // Appel de la fonction du DAO
            $affected = delete($pdo, $idMenu);
            // var_dump($affected);
            if ($affected === 1) {
                //$pdo->commit();
                $message = "Menu supprimé !";

                // Redirection (Reactualisation) de la page 
                header('Location: ../controllers/MenuDeleteCTRL.php');
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
        $message = "l'ID du menu à supprimer est obligatoire";
    }

}

// "Retour" à l'IHM
include '../views/MenuDeleteIHM.php';