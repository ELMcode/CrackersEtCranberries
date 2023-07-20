<?php


/*
 * ClientDAOPOO.php
 */

/*
LE DAO de la table [client] de la BD [crackersetcranberries]
*/

/*
 * CClientDAOPOO.php
 * 
 * selectAll(PDO) : tableau ordinal d'objets Client
 * selectOne(PDO, pk) : objet Client
 * insert(PDO, Objet Client) : int (affected)
 * delete(PDO, Objet Client) : int (affected)
 * update(PDO, Objet Client) : int (affected)
 */

// PHP 8 full

declare(strict_types=1);

// On charge le fichier

require_once '../DTO/Client.php';

// Déclaration de la classe
class ClientDAO
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
            $cursor = $pdo->query("SELECT * FROM client");
            // Renvoie un tableau ordinal de tableaux associatifs
            $list = $cursor->fetchAll();
            for ($i = 0; $i < count($list); $i++) {
                $client = new Client($list[$i]["id_client"], $list[$i]["nom_client"], $list[$i]["prenom_client"], $list[$i]["adresse_client"], $list[$i]["date_naissance_client"], $list[$i]["cp_client"], $list[$i]["email_client"], $list[$i]["mdp_client"], $list[$i]["telephone_client"], $list[$i]["pays_client"], $list[$i]["ville_client"]);
                $result[] = $client;
            }
        } catch (PDOException $e) {
            $client = new Client(-1, "-1", "-1", "-1", "-1", "-1", "-1", "-1", "-1", "-1", "-1");
            $result[] = $client;
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

    public function selectOne(int $pk): Client
    {
        // on instancie un objet commande
        $client = new Client();
        // ordre SQL select en fonction de la PK
        $sql = "SELECT * FROM `client` WHERE id_client =?";
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
                // on valorise via un setter les attributs de l'objet Client
                $client->setIdClient(0);
            } else {
                $client->setIdClient($pk);
                $client->setNomClient($record["nom_client"]);
                $client->setPrenomClient($record["prenom_client"]);
                $client->setAdresseClient($record["adresse_client"]);
                $client->setDateNaissanceClient($record["date_naissance_client"]);
                $client->setCpClient($record["cp_client"]);
                $client->setEmailClient($record["email_client"]);
                $client->setMdpClient($record["mdp_client"]);
                $client->setTelephoneClient($record["telephone_client"]);
                $client->setPaysClient($record["pays_client"]);
                $client->setVilleClient($record["ville_client"]);
            }

        } catch (PDOException $e) {
            $client->setIdClient(-1);
        }

        return $client;
    }

    //INSERT

    //Déclaration de la méthode INSERT :: input : un objet pays , output : un numérique entier
    /**
     * @param PDO $pdo
     * @param Commande $commande
     * @return int
     */
    public function insert(Client $client): int
    {
        // Déclaration d'une variable qui servira pour le retour
        $affected = 0;
        try {
            // Compilation ...
            $cmd = $this->pdo->prepare("INSERT INTO client(nom_client, prenom_client, adresse_client, date_naissance_client, cp_client, email_client, mdp_client, telephone_client, pays_client, ville_client) VALUES(?,?,?,?,?,?,?,?,?,?)");
            // Valorisation des paramètres (les ?) avec le résultat de la sollicitation de la méthode GETTER de l'objet Client
            $cmd->bindValue(1, $client->getNomClient());
            $cmd->bindValue(2, $client->getPrenomClient());
            $cmd->bindValue(3, $client->getAdresseClient());
            $cmd->bindValue(4, $client->getDateNaissanceClient());
            $cmd->bindValue(5, $client->getCpClient());
            $cmd->bindValue(6, $client->getEmailClient());
            $cmd->bindValue(7, $client->getMdpClient());
            $cmd->bindValue(8, $client->getTelephoneClient());
            $cmd->bindValue(9, $client->getPaysClient());
            $cmd->bindValue(10, $client->getVilleClient());
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

    public function delete(Client $client): int
    {
        $affected = 0;
        $sql = "DELETE FROM client WHERE id_client=?";
        try {
            $cmd = $this->pdo->prepare($sql);
            $cmd->bindValue(1, $client->getIdClient());
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

    // UPDATE

    /**
     * @param PDO $pdo
     * @param Commande $commande
     * @return int
     */
    public function update(Client $client): int
    {
        $affected = 0;
        $sql = "UPDATE client SET nom_client=?, prenom_client=?, adresse_client=?, date_naissance_client=?, cp_client=?, email_client=?, mdp_client=?, telephone_client=?, pays_client=?, ville_client=? WHERE id_client =?";
        try {
            $cmd = $this->pdo->prepare($sql);
            $cmd->bindValue(1, $client->getNomClient());
            $cmd->bindValue(2, $client->getPrenomClient());
            $cmd->bindValue(3, $client->getAdresseClient());
            $cmd->bindValue(4, $client->getDateNaissanceClient());
            $cmd->bindValue(5, $client->getCpClient());
            $cmd->bindValue(6, $client->getEmailClient());
            $cmd->bindValue(7, $client->getMdpClient());
            $cmd->bindValue(8, $client->getTelephoneClient());
            $cmd->bindValue(9, $client->getPaysClient());
            $cmd->bindValue(10, $client->getVilleClient());
            $cmd->bindValue(11, $client->getIdClient());

            $cmd->execute();

            $affected = $cmd->rowCount();

        } catch (PDOException $e) {
            $affected = -1;
        }
        return $affected;
    }

    // SELECT ONE BY EMAIL
    public function selectOneByEmail(string $email): ?Client
    {
        $client = null;
        $sql = "SELECT * FROM `client` WHERE email_client =?";
        try {
            $cursor = $this->pdo->prepare($sql);
            $cursor->bindValue(1, $email);
            $cursor->execute();
            $record = $cursor->fetch();
            if ($record !== false && $record !== null) {
                $client = new Client();
                $client->setIdClient($record["id_client"]);
                $client->setNomClient($record["nom_client"]);
                $client->setPrenomClient($record["prenom_client"]);
                $client->setAdresseClient($record["adresse_client"]);
                $client->setDateNaissanceClient($record["date_naissance_client"]);
                $client->setCpClient($record["cp_client"]);
                $client->setEmailClient($record["email_client"]);
                $client->setMdpClient($record["mdp_client"]);
                $client->setTelephoneClient($record["telephone_client"]);
                $client->setPaysClient($record["pays_client"]);
                $client->setVilleClient($record["ville_client"]);
            } else {
                $client = new Client();
                $client->setIdClient(-1);
            }
        } catch (PDOException $e) {
            $client = null;
        }

        return $client;
    }


    // UPDATE PASSWORD
    /**
     * @param int $id
     * @param string $newPassword
     * @return int
     */
    public function updatePassword(Client $client, string $newPassword): int
    {
        $affected = 0;
        $sql = "UPDATE client SET mdp_client=? WHERE id_client =?";
        try {
            $cmd = $this->pdo->prepare($sql);
            $cmd->bindValue(1, $newPassword);
            $cmd->bindValue(2, $client->getIdClient());

            $cmd->execute();

            $affected = $cmd->rowCount();

        } catch (PDOException $e) {
            $affected = -1;
        }
        return $affected;
    }


}



?>