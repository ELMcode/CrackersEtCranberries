<?php

/**
 * Connexion.php : une bibliothèque
 *
 * seConnecter() : PDO(à partir d'un fichier ini)
 * seDeconnecter() : void
 */
class Connexion
{

    /**
     *
     * @param string $psCheminParametresConnexion
     * @return null
     */
    public static function seConnecter($psCheminParametresConnexion)
    {

        $tProprietes = parse_ini_file($psCheminParametresConnexion);

        $lsProtocole = $tProprietes["protocole"];
        $lsServeur = $tProprietes["serveur"];
        $lsPort = $tProprietes["port"];
        $lsUT = $tProprietes["ut"];
        $lsMDP = $tProprietes["mdp"];
        $lsBD = $tProprietes["bd"];

        /*
         * Connexion
         */
        $pdo = null;
        try {
            $pdo = new PDO("$lsProtocole:host=$lsServeur;port=$lsPort;dbname=$lsBD;", $lsUT, $lsMDP);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //$pdo->setAttribute(PDO::ATTR_AUTOCOMMIT, FALSE);
            $pdo->exec("SET NAMES 'UTF8'");
        } catch (PDOException $ex) {
            echo 'Erreur de connexion : ' . $ex->getMessage();

        }
        return $pdo;
    }

    /**
     *
     * @param PDO $pcnx
     */
    public static function seDeconnecter(PDO &$pcnx)
    {
        $pcnx = null;
    }

}

?>