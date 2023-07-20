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


    <?php
    // Vérifie si le cookie existe avant d'afficher le panier
    if (isset($_COOKIE['panier'])) {
        ?>

    <section style="margin: 100px 600px 200px 700px;">
        <h1>Votre panier</h1>
        <table>
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Menu</th>
                    <th>Prix 2 personnes</th>
                    <th>Prix 4 personnes</th>
                </tr>
            </thead>
            <tbody>
                <?php echo $table; ?>
            </tbody>
        </table>
        <label>
            <?php
                if (isset($message)) {
                    echo $message;
                }
                ?>
        </label>
    </section>

    <?php
    }
    ?>
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