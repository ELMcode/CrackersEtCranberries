<?php
// --- SQL paramétré : MenuUpdateCTRL.php
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
$btUpdate = filter_input(INPUT_POST, "btUpdate");

if ($btUpdate != NULL) {


    // Récupération des saisies utilisateur

    $idMenu = filter_input(INPUT_POST, "idMenu");
    $nomMenu = filter_input(INPUT_POST, "nomMenu");
    $catMenu = filter_input(INPUT_POST, "catMenu");
    $qteStock = filter_input(INPUT_POST, "qteStock");
    $prixMenu2pers = filter_input(INPUT_POST, "prixMenu2pers");
    $prixMenu4pers = filter_input(INPUT_POST, "prixMenu4pers");
    $description = filter_input(INPUT_POST, "description");
    $photoMenu = filter_input(INPUT_POST, "photoMenu");

    // Test de la validité des saisies
    if ($idMenu != null && $nomMenu != null && $catMenu != null && $qteStock != null && $prixMenu2pers != null && $prixMenu4pers != null && $description != null && $photoMenu != null) {

        try {

            //Connexion

            // $pdo = seConnecter("../conf/crackersetcranberries.ini");

            //MODIFICATION PAR APPEL DE LA FONCTION DU DAO

            //$pdo->beginTransaction();
            $tAttributesValues = array();
            // Ajout d'items dans le tableau et affectation des saisies
            $tAttributesValues["id_menu"] = $idMenu;
            $tAttributesValues["nom_menu"] = $nomMenu;
            $tAttributesValues["qte_stock_menu"] = $qteStock;
            $tAttributesValues["categorie_menu"] = $catMenu;
            $tAttributesValues["photo_menu"] = $photoMenu;
            $tAttributesValues["description_menu"] = $description;
            $tAttributesValues["prix_2pers_menu"] = $prixMenu2pers;
            $tAttributesValues["prix_4pers_menu"] = $prixMenu4pers;

            // Appel de la fonction du DAO
            $affected = update($pdo, $tAttributesValues);
            // var_dump($affected);
            if ($affected === 1) {
                //$pdo->commit();
                $message = "Menu modifié avec succès !";

                header('Location: ../controllers/MenuUpdateCTRL.php');
                exit();

            } else {
                //$pdo->rollback();
                $message = "Problème de modification, vérifiez que vous avez bien modifié des champs ou veuillez contacter votre administrateur.";
            }

            $pdo = null;
        } catch (PDOException $e) {
            $message = $e->getMessage();
        }
    } else {
        $message = "Toutes les saisies sont obligatoires.";
    }

}

// "Retour" à l'IHM
include '../views/MenuUpdateIHM.php';