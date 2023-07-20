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


    <section style="margin: 100px 400px 200px 800px;">

        <div class="card text-left" style="width: 500px;">
            <div class="card-body px-5">
                <p class="card-text text-center py-2">
                    Un lien pour réinitialiser votre mot de passe a été envoyé à l'adresse e-mail :
                    <?php echo htmlspecialchars($_SESSION['clientEmail'], ENT_QUOTES, 'UTF-8'); ?> !
                </p>

                <ul class="list-group list-group-flush mt-3">
                    <li class="list-group-item text-left text-muted">Les courriels peuvent subir un délai de quelques
                        minutes.</li>
                    <li class="list-group-item text-left text-muted">Si vous n'avez pas reçu d'e-mail, veuillez vérifier
                        vos dossiers de courriers indésirables et de spams.</li>
                    <li class="list-group-item text-left text-muted">Si vous n'avez toujours pas reçu l'e-mail,
                        réessayez ultérieurement.</li>
                </ul>
            </div>
        </div>


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