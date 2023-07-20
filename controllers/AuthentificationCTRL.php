<?php

// --- SQL paramétré : AuthentificationCTRL.php

// Inclusion de la "bibliothèque" Connexion
require_once '../lib/Connexion.php';

// Inclusion de la "bibliothèque" du DAO
require_once '../daos/AuthentificationDAO.php';

// Je créée une variable nommée $message, je lui affecte une valeur en l'occurrence une chaîne vide 
$message = "";
$messageSuccess = "";
$emailClient = "";
$mdpClient = "";

// Récupération des saisies utilisateur
$emailClient = filter_input(INPUT_POST, "emailClient");
$mdpClient = filter_input(INPUT_POST, "mdpClient");
$btConnectHidden = filter_input(INPUT_POST, "btConnectHidden");

if ($btConnectHidden != null && $emailClient != null && $mdpClient != null) {

    // Test de la validité des saisies
    if ($emailClient == null || $mdpClient == null) {
        setcookie("emailClientcookie", "");
        setcookie("mdpCookie", "");
    } else {
        require_once '../lib/Connexion.php';
        //Connexion
        // Connexion à la base de données
        $pdo = seConnecter("../conf/crackersetcranberries.ini");

        // Authentification par appel de la fonction du DAO

        require_once '../daos/AuthentificationDAO.php';
        $count = selectOneByPseudoAndMdp($pdo, $emailClient, $mdpClient);

        if ($count === 1) {
            $response = array('success' => true);
            $chkSeSouvenir = filter_input(INPUT_POST, "chkSeSouvenir");

            if ($chkSeSouvenir != null) {
                setcookie("emailClientcookie", $emailClient, time() + (3600 * 24 * 7));
                setcookie("mdpCookie", $mdpClient, time() + (3600 * 24 * 7));
            } else {
                setcookie("emailClientcookie", "", 0);
                setcookie("mdpCookie", "", 0);
                $emailClient = "";
                $mdpClient = "";
            }

            echo json_encode($response);

            // Redirection vers la page de validation du code reçu par e-mail.
            // header('Location: ../controllers/AuthentificationCodeCTRL.php');
            // exit;
        } else {
            $response = array('success' => false);
            echo json_encode($response);

            setcookie("emailClientcookie", "", 0);
            setcookie("mdpCookie", "", 0);
            $emailClient = "";
            $mdpClient = "";
            exit;
        }
    }
} else {
    // $message = "Toutes les saisies sont obligatoires.";
    $emailClient = filter_input(INPUT_COOKIE, "emailClientcookie");
    $mdpClient = filter_input(INPUT_COOKIE, "mdpCookie");

    // "Retour" à l'IHM
    include '../views/AuthentificationView.php';
    exit;
}


?>