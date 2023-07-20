<?php

/*
ClientDAO.php
*/
/*
LE DAO de la table [client] de la BD [crackersetcranberries]
*/

/**
 *
 * @param PDO $pdo
 * @return array
 */
function selectAll(PDO $pdo): array
{
    /*
     * Renvoie un tableau ordinal de tableaux associatifs
     */
    $list = array();
    try {
        $cursor = $pdo->query("SELECT * FROM client");
        // Renvoie un tableau ordinal de tableaux associatifs
        $list = $cursor->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        $message = array("message" => $e->getMessage());
        $list[] = $message;
    }
    return $list;
}

/**
 *
 * @param PDO $pdo
 * @param string $id
 * @return array
 */
function selectOne(PDO $pdo, string $id_client): array
{
    /*
     * Renvoie un tableau associatif
     */
    try {
        $sql = "SELECT * FROM client WHERE id_client = ?";
        $cursor = $pdo->prepare($sql);
        $cursor->bindValue(1, $id_client);
        $cursor->execute();
        // Renvoie un tableau associatif
        $line = $cursor->fetch(PDO::FETCH_ASSOC);

        if ($line === FALSE) {
            $line["message"] = "Enregistrement inexistant !";
        }
        $cursor->closeCursor();
    } catch (PDOException $e) {
        //$line["Error"] = $e->getMessage();
        $line["Error"] = "Une erreur s'est produite, veuillez téléphoner à votre administrateur de BD";
    }
    return $line;
}

/**
 *
 * @param PDO $pdo
 * @param array $tAttributesValues
 * @return int
 */
function insert(PDO $pdo, array $tAttributesValues): int
{
    $affected = 0;
    try {
        $sql = "INSERT INTO client(nom_client,prenom_client,adresse_client,date_naissance_client,cp_client,email_client, mdp_client,telephone_client,pays_client,ville_client) VALUES(?,?,?,?,?,?,?,?,?,?)";
        $statement = $pdo->prepare($sql);

        $statement->bindValue(1, $tAttributesValues["nom_client"]);
        $statement->bindValue(2, $tAttributesValues["prenom_client"]);
        $statement->bindValue(3, $tAttributesValues["adresse_client"]);
        $statement->bindValue(4, $tAttributesValues["date_naissance_client"]);
        $statement->bindValue(5, $tAttributesValues["cp_client"]);
        $statement->bindValue(6, $tAttributesValues["email_client"]);
        $statement->bindValue(7, $tAttributesValues["mdp_client"]);
        $statement->bindValue(8, $tAttributesValues["telephone_client"]);
        $statement->bindValue(9, $tAttributesValues["pays_client"]);
        $statement->bindValue(10, $tAttributesValues["ville_client"]);

        $statement->execute();
        $affected = $statement->rowcount();
    } catch (PDOException $e) {
        $affected = -1;
    }
    return $affected;
}

/**
 *
 * @param PDO $pdo
 * @param string $id
 * @return int
 */
function delete(PDO $pdo, string $id_client): int
{
    $affected = 0;
    try {
        $sql = "DELETE FROM client WHERE id_client = ?";

        $statement = $pdo->prepare($sql);
        $statement->bindValue(1, $id_client);
        $statement->execute();

        $affected = $statement->rowcount();
    } catch (PDOException $e) {
        $affected = -1;
    }
    return $affected;
}

/**
 *
 * @param PDO $pdo
 * @param string $id
 * @param string $nomColonne
 * @return int
 */


function update(PDO $pdo, array $tAttributesValues): int
{
    $affected = 0;
    try {
        $sql = "UPDATE client 
                 SET nom_client = ?, prenom_client = ?, adresse_client = ?, date_naissance_client = ?, cp_client=?, email_client=?, telephone_client=?,pays_client=?,ville_client=?
                 WHERE id_client = ?"; // on ne modifie pas la clé primaire
        $statement = $pdo->prepare($sql);
        $statement->bindValue(1, $tAttributesValues["nom_client"]);
        $statement->bindValue(2, $tAttributesValues["prenom_client"]);
        $statement->bindValue(3, $tAttributesValues["adresse_client"]);
        $statement->bindValue(4, $tAttributesValues["date_naissance_client"]);
        $statement->bindValue(5, $tAttributesValues["cp_client"]);
        $statement->bindValue(6, $tAttributesValues["email_client"]);
        $statement->bindValue(7, $tAttributesValues["telephone_client"]);
        $statement->bindValue(8, $tAttributesValues["pays_client"]);
        $statement->bindValue(9, $tAttributesValues["ville_client"]);
        $statement->bindValue(10, "id_client");


        $statement->execute();

        $affected = $statement->rowcount();
    } catch (PDOException $e) {
        $affected = -1;
    }
    return $affected;
}




?>