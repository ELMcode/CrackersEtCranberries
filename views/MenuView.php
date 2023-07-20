<!DOCTYPE html>
<!-- modele.php -->
<!-- http://localhost/MonProjetPerso/views/modele.php -->
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="icon" type="image/x-icon" href="../images/C_C-_3_.ico">
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style-header.css">
</head>

<body>

    <!-- nav inclu dans le partial header -->
    <header>
        <?php

        include $_SERVER['DOCUMENT_ROOT'] . '/CrackersEtCranberries/views/partials/header.php';

        ?>
    </header>


    <section style="margin: 200px 600px 200px 700px;">
        <!-- http://localhost/PDOCOURS/views/CatalogueView.php -->
        <?php
        // depuis MenuCTRL.php
        $tbody = "";
        for ($i = 0; $i < count($array); $i++) {
            $tbody .= "<tr>";
            $tbody .= "<td>";
            $tbody .= $array[$i]["id_menu"];
            $tbody .= "</td>";
            $tbody .= "<td>";
            $tbody .= $array[$i]["nom_menu"];
            $tbody .= "</td>";
            $tbody .= "<td>";
            $tbody .= $array[$i]["prix_2pers_menu"];
            $tbody .= "</td>";
            $tbody .= "<td>";
            $tbody .= $array[$i]["prix_4pers_menu"];
            $tbody .= "</td>";
            $tbody .= "<td>";
            $tbody .= "<a href='../controllers/PanierAjoutCTRL.php?id_menu=" . $array[$i]["id_menu"] . "&nom_menu=" . $array[$i]["nom_menu"] . "&prix_2pers_menu=" . $array[$i]["prix_2pers_menu"] . "&prix_4pers_menu=" . $array[$i]["prix_4pers_menu"] . "'><img alt='' src='../icon/add-panier.svg'></a>";
            $tbody .= "</td>";
            $tbody .= "</tr>";
        }

        ?>
        <h1>CATALOGUE</h1>
        <table>
            <thead>
                <tr>
                    <th>Code Produit</th>
                    <th>Désignation</th>
                    <th>Prix 2 personnes</th>
                    <th>Prix 4 personnes</th>
                </tr>
            </thead>
            <tbody>
                <?php
                echo $tbody;
                ?>
            </tbody>
        </table>
    </section>



    <hr />



    <footer>
        <?php
        include '../views/partials/footer.php';
        ?>
    </footer>

    <script src="/bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js"></script>

</body>



</html>