<?php
/**
 * ../lib/Connexion.php : une bibliothèque
 *
 * seConnecter() : PDO(à partir d'un fichier ini)
 * seDeconnecter() : void
 */

/**
 * Fonction pour se connecter à la base de données
 *
 * @param string $psCheminParametresConnexion : Chemin du fichier ini contenant les paramètres de connexion
 * @return PDO : Objet PDO représentant la connexion à la base de données
 */
function seConnecter(string $psCheminParametresConnexion): PDO
{
    $tProprietes = parse_ini_file($psCheminParametresConnexion); // Lecture des propriétés de connexion depuis le fichier ini

    $lsProtocole = $tProprietes["protocole"]; // Récupération du protocole de connexion
    $lsServeur = $tProprietes["serveur"]; // Récupération du nom du serveur
    $lsPort = $tProprietes["port"]; // Récupération du port
    $lsUT = $tProprietes["ut"]; // Récupération du nom d'utilisateur
    $lsMDP = $tProprietes["mdp"]; // Récupération du mot de passe
    $lsBD = $tProprietes["bd"]; // Récupération du nom de la base de données

    /*
     * Connexion à la base de données
     */
    $pdo = null; // Initialisation de l'objet PDO à null
    try {
        $pdo = new PDO("$lsProtocole:host=$lsServeur;port=$lsPort;dbname=$lsBD;", $lsUT, $lsMDP); // Tentative d'établissement de la connexion avec les paramètres fournis
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Configuration des attributs de la connexion pour afficher les erreurs
        //$pdo->setAttribute(PDO::ATTR_AUTOCOMMIT, FALSE);
        $pdo->exec("SET NAMES 'UTF8'"); // Configuration du jeu de caractères en UTF-8
    } catch (PDOException $ex) {
        echo "<br>" . $ex->getMessage(); // Gestion des exceptions en cas d'erreur de connexion
    }
    return $pdo; // Retourne l'objet PDO représentant la connexion
}

/**
 * Fonction pour se déconnecter de la base de données
 *
 * @param PDO $pdo : Référence à l'objet PDO représentant la connexion
 */
function seDeconnecter(PDO &$pdo)
{
    $pdo = null; // Fermeture de la connexion en affectant la valeur null à la référence de l'objet PDO
}
?>