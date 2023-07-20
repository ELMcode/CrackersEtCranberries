<!DOCTYPE html>
<!-- AuthentificationView.php -->
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
    if (!isset($_COOKIE['emailClientcookie'])) {
        $emailClient = "";
    }
    if (!isset($_COOKIE['mdpCookie'])) {
        $mdpClient = "";
    }

    ?>

    <section class="container mt-5">
        <div class="card text-center mx-auto" style="max-width: 400px;">
            <div class="card-header h5 text-white bg-dark">Connexion</div>
            <div class="card-body px-5">

                <form action="../controllers/AuthentificationCTRL.php" method="post" id="formLogin" name="formLogin">
                    <div class="mb-3">
                        <label for="emailClient" class="form-label">E-MAIL</label>
                        <input type="email" class="form-control" name="emailClient" id="emailClient" placeholder="Email"
                            value="<?php echo $emailClient; ?>" />
                    </div>

                    <div class="mb-3">
                        <label for="mdpClient" class="form-label">MOT DE PASSE</label>
                        <input type="password" class="form-control" name="mdpClient" id="mdpClient" </div>

                        <div class="mb-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="chkPwdVisible"
                                    id="chkPwdVisible" />
                                <label class="form-check-label" for="chkPwdVisible">Mot de passe visible</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="chkSeSouvenir" id="chkSeSouvenir"
                                    <?php if (isset($_COOKIE['emailClientcookie']) && isset($_COOKIE['mdpCookie'])) {
                                        echo "checked";
                                    } ?> />
                                <label class="form-check-label" for="chkSeSouvenir">Se souvenir de moi</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <button type="reset" name='btReinitialiser' id='btReinitialiser'
                                class="btn btn-secondary">R&eacute;initialiser</button>
                            <input type="hidden" name="btConnectHidden" id="btConnectHidden" value="">

                            <input type="submit" value="Se connecter" id="btConnect" name="btConnect"
                                class="btn btn-dark" />
                        </div>

                        <div class="mb-3">

                            <label id="lblMessage"></label>

                        </div>

                </form>

                <div class="d-flex justify-content-between mt-4">
                    <a class="" href="../controllers/InscriptionCTRL.php">S'inscrire</a>
                    <a class="" href="../controllers/MotDePasseOublieCTRL.php">Mot de passe oublié ?</a>
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

    <script src="../js/Authentification.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js"></script>


</body>



</html>