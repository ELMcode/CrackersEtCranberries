<?php

/*
MenuDAO.php
*/
/*
LE DAO de la table [menu] de la BD [crackersetcranberries]
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
        $cursor = $pdo->query("SELECT * FROM menu");
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
function selectOne(PDO $pdo, string $id_menu): array
{
    /*
     * Renvoie un tableau associatif
     */
    try {
        $sql = "SELECT * FROM menu WHERE id_menu = ?";
        $cursor = $pdo->prepare($sql);
        $cursor->bindValue(1, $id_menu);
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
        $sql = "INSERT INTO menu(nom_menu,qte_stock_menu,categorie_menu,photo_menu,description_menu,prix_2pers_menu,prix_4pers_menu) VALUES(?,?,?,?,?,?,?)";
        $statement = $pdo->prepare($sql);

        $statement->bindValue(1, $tAttributesValues["nom_menu"]);
        $statement->bindValue(2, $tAttributesValues["qte_stock_menu"]);
        $statement->bindValue(3, $tAttributesValues["categorie_menu"]);
        $statement->bindValue(4, $tAttributesValues["photo_menu"]);
        $statement->bindValue(5, $tAttributesValues["description_menu"]);
        $statement->bindValue(6, $tAttributesValues["prix_2pers_menu"]);
        $statement->bindValue(7, $tAttributesValues["prix_4pers_menu"]);

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
function delete(PDO $pdo, string $id_menu): int
{
    $affected = 0;
    try {
        $sql = "DELETE FROM menu WHERE id_menu = ?";

        $statement = $pdo->prepare($sql);
        $statement->bindValue(1, $id_menu);
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
        $sql = "UPDATE menu 
                 SET nom_menu = ?, qte_stock_menu = ?, categorie_menu = ?, photo_menu = ?, description_menu=?, prix_2pers_menu=?, prix_4pers_menu=?
                 WHERE id_menu = ?"; // on ne modifie pas la clé primaire
        $statement = $pdo->prepare($sql);
        $statement->bindValue(1, $tAttributesValues["nom_menu"]);
        $statement->bindValue(2, $tAttributesValues["qte_stock_menu"]);
        $statement->bindValue(3, $tAttributesValues["categorie_menu"]);
        $statement->bindValue(4, $tAttributesValues["photo_menu"]);
        $statement->bindValue(5, $tAttributesValues["description_menu"]);
        $statement->bindValue(6, $tAttributesValues["prix_2pers_menu"]);
        $statement->bindValue(7, $tAttributesValues["prix_4pers_menu"]);
        $statement->bindValue(8, $tAttributesValues["id_menu"]);


        $statement->execute();

        $affected = $statement->rowcount();
    } catch (PDOException $e) {
        $affected = -1;
    }
    return $affected;
}

function checkDuplicate(PDO $pdo, string $nomMenu): bool
{
    $sql = "SELECT COUNT(*) FROM menu WHERE nom_menu = ?";
    $statement = $pdo->prepare($sql);
    $statement->execute([$nomMenu]);
    $count = $statement->fetchColumn();
    return ($count > 0);
}

function selectCols(PDO $pdo, string...$cols): array
{
    /*
     * Renvoie un tableau associatif
     */
    try {
        $columns = implode(", ", $cols);
        $sql = "SELECT $columns FROM menu";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (empty($result)) {
            $result["message"] = "Aucun enregistrement trouvé !";
        }
    } catch (PDOException $e) {
        $result["Error"] = "Une erreur s'est produite, veuillez téléphoner à votre administrateur de BD.";
    }
    return $result;
}




?>