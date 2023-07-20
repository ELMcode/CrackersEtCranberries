<?php

/*
DevisDAO.php
*/
/*
LE DAO de la table [devis] de la BD [crackersetcranberries]
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
        $cursor = $pdo->query("SELECT * FROM devis");
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
function selectOne(PDO $pdo, string $id_devis): array
{
    /*
     * Renvoie un tableau associatif
     */
    try {
        $sql = "SELECT * FROM devis WHERE id_devis = ?";
        $cursor = $pdo->prepare($sql);
        $cursor->bindValue(1, $id_devis);
        $cursor->execute();
        // Renvoie un tableau associatif
        $line = $cursor->fetch(PDO::FETCH_ASSOC);

        if ($line === FALSE) {
            $line["message"] = "Enregistrement inexistant !";
        }
        $cursor->closeCursor();
    } catch (PDOException $e) {
        //$line["Error"] = $e->getMessage();
        $line["Error"] = "Une erreur s'est produite, veuillez téléphoner à votre administrateur de BD.";
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
        $sql = "INSERT INTO devis(id_client,qte_devis,date_devis,montant_total_devis) VALUES(?,?,?,?)";
        $statement = $pdo->prepare($sql);

        $statement->bindValue(1, $tAttributesValues["id_client"]);
        $statement->bindValue(2, $tAttributesValues["qte_devis"]);
        $statement->bindValue(3, $tAttributesValues["date_devis"]);
        $statement->bindValue(4, $tAttributesValues["montant_total_devis"]);


        $statement->execute();
        $affected = $statement->rowcount();
    } catch (PDOException $e) {
        echo $e->getMessage();
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
function delete(PDO $pdo, string $idDevis): int
{
    $affected = 0;
    try {
        $sql = "DELETE FROM devis WHERE id_devis = ?";

        $statement = $pdo->prepare($sql);
        $statement->bindValue(1, $idDevis);
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
        $sql = "UPDATE devis 
                 SET id_client = ?, qte_devis = ?, date_devis = ?, montant_total_devis = ?
                 WHERE id_devis = ?"; // on ne modifie pas la clé primaire
        $statement = $pdo->prepare($sql);
        $statement->bindValue(1, $tAttributesValues["id_client"]);
        $statement->bindValue(2, $tAttributesValues["qte_devis"]);
        $statement->bindValue(3, $tAttributesValues["date_devis"]);
        $statement->bindValue(4, $tAttributesValues["montant_total_devis"]);
        $statement->bindValue(5, $tAttributesValues["id_devis"]);


        $statement->execute();

        $affected = $statement->rowcount();
    } catch (PDOException $e) {
        $affected = -1;
    }
    return $affected;
}


function checkDuplicate(PDO $pdo, string $idClient): bool
{
    $sql = "SELECT COUNT(*) FROM devis WHERE id_client = ?";
    $statement = $pdo->prepare($sql);
    $statement->execute([$idClient]);
    $count = $statement->fetchColumn();
    return ($count > 0);
}


?>