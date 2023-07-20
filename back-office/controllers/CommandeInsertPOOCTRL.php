<?php
// --- SQL paramétré : CommandeInsertPOOCTRL.php
// Inclusion de la classe Connexion
require_once '../lib/ConnexionPOO.php';
// Inclusion de la "bibliothèque" du DAO
require_once '../daos/CommandeDAOPOO.php';


class CommandeCTRL
{

    private $commandeDAO;
    private $pdo;

    public function __construct(CommandeDAO $commandeDAO)
    {
        $this->commandeDAO = $commandeDAO;
        $this->pdo = Connexion::seConnecter("../conf/crackersetcranberrieslocal.ini");

    }

    public function getAllCommandes()
    {
        return $this->commandeDAO->selectAll($this->pdo);

    }

    public function insert()
    {

        $message = "";
        // Récupération des données du formulaire
        $idClient = filter_input(INPUT_POST, "idClient");
        $qteCommande = filter_input(INPUT_POST, "qteCommande");
        $dateCommande = filter_input(INPUT_POST, "dateCommande");
        $statutCommande = filter_input(INPUT_POST, "statutCommande");
        $montantTotalCommande = filter_input(INPUT_POST, "montantTotalCommande");

        // Test de la validité des saisies
        if ($idClient != null && $qteCommande != null && $dateCommande != null && $statutCommande != null && $montantTotalCommande != null) {


            try {

                // Création de l'objet Commande
                $commande = new Commande();
                $commande->setIdClient($idClient);
                $commande->setQteCommande($qteCommande);
                $commande->setDateCommande($dateCommande);
                $commande->setStatutCommande($statutCommande);
                $commande->setMontantTotalCommande($montantTotalCommande);

                // Appel de la méthode d'insertion
                $affected = $this->commandeDAO->insert($commande);
                if ($affected === 1) {

                    $message = "Nouvelle commande ajoutée !";

                    // Redirection (Reactualisation) de la page 
                    header('Location: ../controllers/CommandeInsertPOOCTRL.php');
                    exit();

                } else {
                    throw new Exception("Problème d'insertion, veuillez contacter votre administrateur.");
                }
            } catch (PDOException $e) {
                echo "Erreur PDO : " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erreur : " . $e->getMessage();
            }
        } else {
            throw new Exception('Toutes les saisies sont obligatoires');
        }
    }
}

// Connexion à la base de données
try {
    $pdo = Connexion::seConnecter("../conf/crackersetcranberrieslocal.ini");

} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}

// Instanciation du DAO
$commandeDAO = new CommandeDAO($pdo);

// Instanciation du contrôleur
$commandeCTRL = new CommandeCTRL($commandeDAO);

// Initialisation de la variable $message
$message = "";

// Vérifier si le bouton d'insertion a été cliqué
$btInsert = filter_input(INPUT_POST, "btInsert");
if ($btInsert != NULL) {
    // Si oui, appeler la méthode d'insertion
    try {
        $commandeCTRL->insert();
    } catch (Exception $e) {
        $message = $e->getMessage();
    }
}

// Appel à la méthode getAllCommandes() et stockage du résultat dans $selectAll pour le foreach de l'IHM
$selectAll = $commandeCTRL->getAllCommandes();

// Retour à l'IHM
require '../views/CommandeInsertIHM.php';