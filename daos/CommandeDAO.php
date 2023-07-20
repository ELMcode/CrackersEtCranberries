<?php

/*
CommandeDAO.php
*/
/*
LE DAO de la table [commande] de la BD [crackersetcranberries]
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
        $cursor = $pdo->query("SELECT * FROM commande");
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
function selectOne(PDO $pdo, string $id_commande): array
{
    /*
     * Renvoie un tableau associatif
     */
    try {
        $sql = "SELECT * FROM commande WHERE id_commande = ?";
        $cursor = $pdo->prepare($sql);
        $cursor->bindValue(1, $id_commande);
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
        $sql = "INSERT INTO commande(qte_commande,date_commande,statut_commande,montant_total_commande) VALUES(?,?,?,?,?)";
        $statement = $pdo->prepare($sql);

        // si on indique pas le id_client (auto incrementé), va creer un nouvel id_client dans cette table pour les nouvelles valeurs.
        // si on souhaite ajouté une commande à un client existant il faut donc faire passer id_client en parametre (where..)
        // -> c'est le cas dans la fonction Update en dessous

        $statement->bindValue(1, $tAttributesValues["qte_commande"]);
        $statement->bindValue(2, $tAttributesValues["date_commande"]);
        $statement->bindValue(3, $tAttributesValues["statut_commande"]);
        $statement->bindValue(4, $tAttributesValues["montant_total_commande"]);

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
function delete(PDO $pdo, string $id_produit): int
{
    $affected = 0;
    try {
        $sql = "DELETE FROM commande WHERE id_commande = ?";

        $statement = $pdo->prepare($sql);
        $statement->bindValue(1, $id_produit);
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
        $sql = "UPDATE commande 
                 SET id_client = ?, qte_commande = ?, date_commande = ?, statut_commande = ?, montant_total_commande=?
                 WHERE id_commande = ?"; // on ne modifie pas la clé primaire
        $statement = $pdo->prepare($sql);
        $statement->bindValue(1, $tAttributesValues["id_client"]);
        $statement->bindValue(2, $tAttributesValues["qte_commande"]);
        $statement->bindValue(3, $tAttributesValues["date_commande"]);
        $statement->bindValue(4, $tAttributesValues["statut_commande"]);
        $statement->bindValue(5, $tAttributesValues["montant_total_commande"]);
        $statement->bindValue(6, "id_commande");


        $statement->execute();

        $affected = $statement->rowcount();
    } catch (PDOException $e) {
        $affected = -1;
    }
    return $affected;
}




?>