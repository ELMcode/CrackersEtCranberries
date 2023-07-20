<?php
// MotDePasseOublie3CTRL.php

// Durée de vie de la session à 30 minutes
session_set_cookie_params(30 * 60);
// Début de la session
session_start();

// Inclusion de la classe Connexion
require_once '../lib/ConnexionPOO.php';
// Inclusion de la classe Client
require_once '../DTO/Client.php';
// Inclusion de la classe ClientDAO
require_once '../daos/ClientDAOPOO.php';

class MotDePasseOublie3CTRL
{
    private $clientDAO;

    private $pdo;

    public function __construct(ClientDAO $clientDAO)
    {
        $this->clientDAO = $clientDAO;
        $this->pdo = Connexion::seConnecter("../conf/crackersetcranberries.ini");
    }

    public function updatePassword()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $newPassword = filter_input(INPUT_POST, 'clientNewPassword');
            $newPasswordConfirm = filter_input(INPUT_POST, 'clientNewPassword2');

            // Vérification des mots de passe
            if ($newPassword !== $newPasswordConfirm) {
                $errorMessage2 = "Les mots de passe ne correspondent pas.";
                $passwordChanged = false; // Définir la variable sur false
                return $errorMessage2;
            }

            // Récupération de l'e-mail depuis la session
            $email = $_SESSION['clientEmail'];

            // Récupération du client par son email
            $client = $this->clientDAO->selectOneByEmail($email);
            if ($client === null || $client->getIdClient() === -1) {
                // Email non trouvé
                $errorMessage2 = "Adresse e-mail non trouvée";
                return $errorMessage2;
            }

            // Modification du mot de passe dans la base de données
            $result = $this->clientDAO->updatePassword($client, $newPassword);

            if ($result) {
                // Mot de passe changé
                $_SESSION['passwordChanged'] = true;
                $passwordChanged = true;
            } else {
                $errorMessage2 = "Une erreur est survenue lors de la mise à jour du mot de passe.";
                return $errorMessage2;
            }
        }
    }
}

// Connexion à la BD
try {
    $pdo = Connexion::seConnecter("../conf/crackersetcranberries.ini");
} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}

// Instanciation du DAO
$clientDAO = new ClientDAO($pdo);

// Instanciation du contrôleur
$controller = new MotDePasseOublie3CTRL($clientDAO);

$errorMessage2 = null; // Déclaration et initialisation de la variable
$passwordChanged = false; // Déclaration et initialisation de la variable

// Vérification si le formulaire a été soumis et appel de la méthode updatePassword
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errorMessage2 = $controller->updatePassword();

    // Vérification si le mot de passe a été modifié avec succès
    if (isset($_SESSION['passwordChanged']) && $_SESSION['passwordChanged'] === true && $errorMessage2 === null) {
        $passwordChanged = true; // Mise à jour de la variable
    }
}

// Inclure la vue
require_once '../views/MotDePasseOublie3View.php';
?>