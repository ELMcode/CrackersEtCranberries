<?php

// MotDePasseOublieCTRL.php

// Durée de vie de la session à 30 minutes
session_set_cookie_params(30 * 60);
// Début de la session
session_start();

// Inclusion de la classe Connexion
require_once '../lib/ConnexionPOO.php';
// Inclusion de la classe Client
require_once '../DTO/Client.php';
// Inclusion de la "bibliothèque" du DAO ClientDAO
require_once '../daos/ClientDAOPOO.php';

class MotDePasseOublieCTRL
{
    private $clientDAO;

    private $pdo;

    public function __construct(ClientDAO $clientDAO)
    {
        $this->clientDAO = $clientDAO;
        $this->pdo = Connexion::seConnecter("../conf/crackersetcranberries.ini");
    }

    public function sendResetLink()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['clientEmail'];

            // Validation de l'e-mail (vous pouvez ajouter d'autres validations ici)
            if (empty($email)) {
                return "Veuillez entrer une adresse e-mail";
            }

            // Récupération du client par son email
            $client = $this->clientDAO->selectOneByEmail($email);
            if ($client === null || $client->getIdClient() === -1) {
                // Email non trouvé
                return "Adresse e-mail non trouvée";
            }

            // Stocker l'e-mail dans une variable de session.
            $_SESSION['clientEmail'] = $email;

            // Génération du lien de réinitialisation du mdp
            $resetLink = 'https://elm.alwaysdata.net/CrackersEtCranberries/controllers/MotDePasseOublie3CTRL.php?email=' . urlencode($email);

            // Envoyer l'e-mail de réinitialisation du mot de passe
            $bOk = $this->sendEmail($email, $resetLink);

            if (!$bOk) {
                throw new Exception("Erreur d'envoi du mail");
            }

            // Aucune erreur, retourne null
            return null;
        }
    }


    public function sendEmail($email, $resetLink)
    {
        // Paramètres de messagerie
        ini_set("SMTP", "smtp-elm.alwaysdata.net");
        ini_set("sendmail_from", "elm@alwaysdata.net");

        // Destinataire
        $destinataire = $email;

        // Objet du mail
        $objet = "Réinitialisation du mot de passe Crackers&Cranberries";

        // Contenu du mail
        $texte = "
    <html>
    <head>
        <title>Réinitialisation du mot de passe Crackers&Cranberries</title>
        <style>
            body {
                font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
                line-height: 1.6;
                background-color: #f7f7f7;
                color: #000000;
            }
            
            .container {
                max-width: 600px;
                margin: 0 auto;
                padding: 20px;
                background-color: #ffffff;
                border-radius: 5px;
                box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
            }
            
            h1 {
                font-size: 20px;
                margin-bottom: 20px;
            }
            
            p {
                margin-bottom: 10px;
                color: #000000;
            }
            
            .button {
                display: inline-block;
                color: #ffffff;
                background-color: #941363;
                padding: 10px 20px;
                text-decoration: none;
                border-radius: 5px;
            }
            
            .button:hover {
                background-color: #6c0f4d;
            }
        </style>
    </head>
    <body>
        <div class='container'>
            <h1>Réinitialisation du mot de passe Crackers&Cranberries</h1>
            <p>Bonjour,</p>
            <p>Pour réinitialiser votre mot de passe, veuillez cliquer sur le bouton ci-dessous :</p>
            <p><a href='{$resetLink}' class='button' style='color: #ffffff;'>Réinitialiser mon mot de passe</a></p>
            <p>Si vous n'avez pas demandé à réinitialiser votre mot de passe, ignorez simplement cet e-mail.</p>
            <p>Cordialement,</p>
            <p>L'équipe C&C</p>
        </div>
    </body>
    </html>
    ";

        // Entêtes
        $entetes = "MIME-Version: 1.0" . "\r\n";
        $entetes .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // Envoi du mail
        $bOk = mail($destinataire, $objet, $texte, $entetes);

        return $bOk;
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
$controller = new MotDePasseOublieCTRL($clientDAO);

$errorMessage = null;

// Vérification si le formulaire a été soumis et appel de la méthode sendResetLink
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errorMessage = $controller->sendResetLink();

    // Rediriger vers motdepasseoublie2view.php après l'envoi de l'e-mail de réinitialisation
    if ($errorMessage === null) {
        header('Location: ../controllers/MotDePasseOublie2CTRL.php');
        exit();
    }
}





// Inclure la vue
require_once '../views/MotDePasseOublieView.php';

?>