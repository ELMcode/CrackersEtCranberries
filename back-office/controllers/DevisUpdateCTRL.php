<?php
// --- SQL paramétré : DevisUpdateCTRL.php
// Inclusion de la "bibliothèque" Connexion
require_once '../lib/Connexion.php';
// Inclusion de la "bibliothèque" du DAO
require_once '../daos/DevisDAO.php';



// partie tableau liste devis

// Connexion à la base de données
$pdo = seConnecter("../conf/crackersetcranberries.ini");

// Appel de la fonction selectAll du DAO
$selectAll = selectAll($pdo);

// Fin partie  liste devis




$message = "";
$btUpdate = filter_input(INPUT_POST, "btUpdate");

if ($btUpdate != NULL) {


    /// Récupération des saisies utilisateur
    $idDevis = filter_input(INPUT_POST, "idDevis");
    $idClient = filter_input(INPUT_POST, "idClient");
    $qteDevis = filter_input(INPUT_POST, "qteDevis");
    $dateDevis = filter_input(INPUT_POST, "dateDevis");
    $montantTotalDevis = filter_input(INPUT_POST, "montantTotalDevis");

    // Test de la validité des saisies
    if ($idDevis != null && $idClient != null && $qteDevis != null && $dateDevis != null && $montantTotalDevis != null) {

        try {
            /*
             * Connexion
             */
            // $pdo = seConnecter("../conf/crackersetcranberries.ini");
            /*
             * MODIFICATION PAR APPEL DE LA FONCTION DU DAO
             */
            //$pdo->beginTransaction();
            $tAttributesValues = array();
            // Ajout d'items dans le tableau et affectation des saisies
            $tAttributesValues["id_devis"] = $idDevis;
            $tAttributesValues["id_client"] = $idClient;
            $tAttributesValues["qte_devis"] = $qteDevis;
            $tAttributesValues["date_devis"] = $dateDevis;
            $tAttributesValues["montant_total_devis"] = $montantTotalDevis;


            // Appel de la fonction du DAO
            $affected = update($pdo, $tAttributesValues);
            // var_dump($affected);
            if ($affected === 1) {
                //$pdo->commit();
                $message = "Devis modifié avec succès !";

                header('Location: ../controllers/DevisUpdateCTRL.php');
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
include '../views/DevisUpdateIHM.php';