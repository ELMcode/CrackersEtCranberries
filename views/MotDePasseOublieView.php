<!DOCTYPE html>
<!-- MotDePasseOublieView.php -->
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

        <div class="card text-center" style="width: 400px;">
            <div class="card-header h5 text-white bg-dark">Mot de passe oublié ?</div>
            <div class="card-body px-5">
                <p class="card-text py-2">
                    Entrez votre adresse e-mail et nous vous enverrons les instructions pour
                    réinitialiser votre mot de passe.
                </p>


                <form method="post" action="../controllers/MotDePasseOublieCTRL.php">
                    <div class="form-outline">
                        <label class="form-label" for="clientEmail">E-mail :</label>
                        <input type="email" id="clientEmail" name="clientEmail" class="form-control mb-2" required />

                    </div>
                    <button type="submit" class="btn btn-dark w-100" name="btConfirmer">Confirmer</button>
                    <p class='error-message'>
                        <?php
                        if (!empty($errorMessage)) {
                            echo "<p class='alert alert-danger mt-3'>$errorMessage</p>";
                        }
                        ?>
                    </p>
                </form>
                <div class="d-flex justify-content-between mt-4">
                    <a class="" href="../controllers/AuthentificationCTRL.php">Se connecter</a>
                    <a class="" href="../views/inscription.php">S'inscrire</a>
                </div>
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