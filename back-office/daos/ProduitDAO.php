<?php

/*
ProduitDAO.php
*/
/*
LE DAO de la table [produit] de la BD [crackersetcranberries]
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
        $cursor = $pdo->query("SELECT * FROM produit");
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
function selectOne(PDO $pdo, string $id_produit): array
{
    /*
     * Renvoie un tableau associatif
     */
    try {
        $sql = "SELECT * FROM produit WHERE id_produit = ?";
        $cursor = $pdo->prepare($sql);
        $cursor->bindValue(1, $id_produit);
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
        $sql = "INSERT INTO produit(nom_produit,prix_produit,qte_stock_produit,categorie_produit) VALUES(?,?,?,?)";
        $statement = $pdo->prepare($sql);

        $statement->bindValue(1, $tAttributesValues["nom_produit"]);
        $statement->bindValue(2, $tAttributesValues["prix_produit"]);
        $statement->bindValue(3, $tAttributesValues["qte_stock_produit"]);
        $statement->bindValue(4, $tAttributesValues["categorie_produit"]);


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
function delete(PDO $pdo, string $idProduit): int
{
    $affected = 0;
    try {
        $sql = "DELETE FROM produit WHERE id_produit = ?";

        $statement = $pdo->prepare($sql);
        $statement->bindValue(1, $idProduit);
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
        $sql = "UPDATE produit 
                 SET nom_produit = ?, prix_produit = ?, qte_stock_produit = ?, categorie_produit = ?
                 WHERE id_produit = ?"; // on ne modifie pas la clé primaire
        $statement = $pdo->prepare($sql);
        $statement->bindValue(1, $tAttributesValues["nom_produit"]);
        $statement->bindValue(2, $tAttributesValues["prix_produit"]);
        $statement->bindValue(3, $tAttributesValues["qte_stock_produit"]);
        $statement->bindValue(4, $tAttributesValues["categorie_produit"]);
        $statement->bindValue(5, $tAttributesValues["id_produit"]);


        $statement->execute();

        $affected = $statement->rowcount();
    } catch (PDOException $e) {
        $affected = -1;
    }
    return $affected;
}


function checkDuplicate(PDO $pdo, string $nomProduit): bool
{
    $sql = "SELECT COUNT(*) FROM produit WHERE nom_produit = ?";
    $statement = $pdo->prepare($sql);
    $statement->execute([$nomProduit]);
    $count = $statement->fetchColumn();
    return ($count > 0);
}




?>