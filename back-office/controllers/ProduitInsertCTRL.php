<?php
// --- SQL paramétré : ProduitInsertCTRL.php
// Inclusion de la "bibliothèque" Connexion
require_once '../lib/Connexion.php';
// Inclusion de la "bibliothèque" du DAO
require_once '../daos/ProduitDAO.php';



// partie tableau liste produit

// Connexion à la base de données
$pdo = seConnecter("../conf/crackersetcranberries.ini");

// Appel de la fonction selectAll du DAO
$selectAll = selectAll($pdo);

// Fin partie  liste produit


$message = "";
$btInsert = filter_input(INPUT_POST, "btInsert");

if ($btInsert != NULL) {


    // Récupération des saisies utilisateur

    $nomProduit = filter_input(INPUT_POST, "nomProduit");
    $prixProduit = filter_input(INPUT_POST, "prixProduit");
    $qteStockProduit = filter_input(INPUT_POST, "qteStockProduit");
    $categorieProduit = filter_input(INPUT_POST, "categorieProduit");



    // Test de la validité des saisies
    if ($nomProduit != null && $prixProduit != null && $qteStockProduit != null && $categorieProduit != null) {

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
            $tAttributesValues["nom_produit"] = $nomProduit;
            $tAttributesValues["prix_produit"] = $prixProduit;
            $tAttributesValues["qte_stock_produit"] = $qteStockProduit;
            $tAttributesValues["categorie_produit"] = $categorieProduit;


            // Appel de la fonction du DAO
            $affected = insert($pdo, $tAttributesValues);
            if ($affected === 1) {
                //$pdo->commit();
                $message = "Nouveau produit ajouté !";

                // Redirection (Reactualisation) de la page 
                header('Location: ../controllers/ProduitInsertCTRL.php');
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
include '../views/ProduitInsertIHM.php';