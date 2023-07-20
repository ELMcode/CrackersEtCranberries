<?php

/*
 * CommandeDAOPOO.php
 */

/*
LE DAO de la table [commande] de la BD [crackersetcranberries]
*/

/*
 * CommandeDAOPOO.php
 * 
 * selectAll(PDO) : tableau ordinal d'objets Commande
 * selectOne(PDO, pk) : objet Commande
 * insert(PDO, Objet Commande) : int (affected)
 * delete(PDO, Objet Commande) : int (affected)
 * update(PDO, Objet Commande) : int (affected)
 */

// PHP 8 full
declare(strict_types=1);

// On charge le fichier
require_once '../DTO/Commande.php';

// Déclaration de la classe
class CommandeDAO
{

    // On déclare un attribut
    private PDO $pdo;

    // Le constructeur qui a comme paramètre un objet PDO et qui sera exécuté automatiquement quand on va instancier l'objet
    function __construct(PDO $pdo)
    {
        // On affecte la valeur du paramètre à l'attribut
        $this->pdo = $pdo;
    }



    // SELECT ALL
    /**
     * 
     * @param PDO $pdo
     * @return array of objects
     */
    public function selectAll(PDO $pdo): array
    {

        //Renvoie un tableau ordinal d'objets Commande

        $result = array();
        try {
            $cursor = $pdo->query("SELECT * FROM commande");
            // Renvoie un tableau ordinal de tableaux associatifs
            $list = $cursor->fetchAll();
            for ($i = 0; $i < count($list); $i++) {
                $commande = new Commande($list[$i]["id_commande"], $list[$i]["id_client"], $list[$i]["qte_commande"], $list[$i]["date_commande"], $list[$i]["statut_commande"], $list[$i]["montant_total_commande"]);
                $result[] = $commande;
            }
        } catch (PDOException $e) {
            $commande = new Commande(-1, -1, -1, "-1", $e->getMessage(), -1);
            $result[] = $commande;
        }
        return $result;
    }


    // SELECT ONE
    // Le select one à comme input la PK de la table
    // et comme output un objet correspondant à la table

    /**
     * 
     * @param PDO $pdo
     * @param string $id
     * @return Commande
     */

    public function selectOne(int $pk): Commande
    {
        // on instancie un objet commande
        $commande = new Commande();
        // ordre SQL select en fonction de la PK
        $sql = "SELECT * FROM `commande` WHERE id_commande =?";
        try {
            // on compile l'ordre SQL
            $cursor = $this->pdo->prepare($sql);
            // on valorise le 1er paramètre le (?)
            $cursor->bindValue(1, $pk);
            // on l'execute l'ordre SQL
            $cursor->execute();
            // extrait la ligne courante du curseur
            $record = $cursor->fetch();
            // si le curseur est vide
            if ($record === FALSE) {
                // on valorise via un setter les attributs de l'objet Commande
                $commande->setIdCommande(0);
                $commande->setIdClient(0);
                $commande->setQteCommande(0);
                $commande->setDateCommande("Introuvable");
                $commande->setStatutCommande("Introuvable");
                $commande->setMontantTotalCommande(0);


            } else {
                $commande->setIdCommande($pk);
                $commande->setIdClient($record["id_client"]);
                $commande->setQteCommande($record["qte_commande"]);
                $commande->setDateCommande($record["date_commande"]);
                $commande->setStatutCommande($record["statut_commande"]);
                $commande->setMontantTotalCommande($record["montant_total_commande"]);
            }

        } catch (PDOException $e) {

            $commande->setIdCommande(-1);
            $commande->setIdClient(-1);
            $commande->setQteCommande(-1);
            $commande->setDateCommande("-1");
            $commande->setStatutCommande($e->getMessage());
            $commande->setMontantTotalCommande(-1);
        }

        return $commande;
    }


    //INSERT

    //Déclaration de la méthode INSERT :: input : un objet pays , output : un numérique entier
    /**
     * @param PDO $pdo
     * @param Commande $commande
     * @return int
     */
    public function insert(Commande $commande): int
    {
        // Déclaration d'une variable qui servira pour le retour
        $affected = 0;

        try {
            // Compilation ...
            $cmd = $this->pdo->prepare("INSERT INTO commande(id_client, qte_commande,date_commande,statut_commande,montant_total_commande) VALUES(?,?,?,?,?)");
            // Valorisation des paramètres (les ?) avec le résultat de la sollicitation de la méthode GETTER de l'objet Commande
            $cmd->bindValue(1, $commande->getIdClient());
            $cmd->bindValue(2, $commande->getQteCommande());
            $cmd->bindValue(3, $commande->getDateCommande());
            $cmd->bindValue(4, $commande->getStatutCommande());
            $cmd->bindValue(5, $commande->getMontantTotalCommande());
            // On exécute la requete
            $cmd->execute();
            // Nombre de lignes affectées (0 ou 1)
            $affected = $cmd->rowCount();
        } catch (PDOException $e) {
            $affected = -1;
        }

        // Le retour de la méthode (l'output)
        return $affected;
    }


    // DELETE

    /**
     * @param PDO $pdo
     * @param Commande $commande
     * @return int
     */

    public function delete(Commande $commande): int
    {
        $affected = 0;
        $sql = "DELETE FROM commande WHERE id_commande=?";
        try {
            $cmd = $this->pdo->prepare($sql);
            $cmd->bindValue(1, $commande->getIdCommande());
            $cmd->execute();

            $affected = $cmd->rowCount();

        } catch (PDOException $e) {
            $affected = -1;
        }
        return $affected;
    }


    // UPDATE

    /**
     * @param PDO $pdo
     * @param Commande $commande
     * @return int
     */

    public function update(Commande $commande): int
    {
        $affected = 0;
        $sql = "UPDATE commande SET id_client =?, qte_commande=?,date_commande=?, statut_commande=?,montant_total_commande=? WHERE id_commande =?";
        try {
            $cmd = $this->pdo->prepare($sql);
            $cmd->bindValue(1, $commande->getIdClient());
            $cmd->bindValue(2, $commande->getQteCommande());
            $cmd->bindValue(3, $commande->getDateCommande());
            $cmd->bindValue(4, $commande->getStatutCommande());
            $cmd->bindValue(5, $commande->getMontantTotalCommande());
            $cmd->bindValue(6, $commande->getIdCommande());

            $cmd->execute();

            $affected = $cmd->rowCount();

        } catch (PDOException $e) {
            $affected = -1;
        }
        return $affected;
    }

}

?>