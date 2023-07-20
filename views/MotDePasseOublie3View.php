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
        <div class="card text-center" style="width: 400px;">
            <div class="card-header h5 text-white bg-dark">Créer un nouveau mot de passe</div>
            <div class="card-body px-5">
                <p class="card-text py-2">
                    Entrez votre nouveau mot de passe
                </p>

                <form method="post" action="../controllers/MotDePasseOublie3CTRL.php">
                    <div class="form-outline">
                        <label class="form-label" for="clientNewPassword">Nouveau mot de passe :</label>
                        <input type="password" id="clientNewPassword" name="clientNewPassword" class="form-control mb-2"
                            required />
                        <ul class="form-text">
                            <li>Au moins 8 caractères</li>
                            <li>Au moins 1 lettre</li>
                            <li>Au moins 1 chiffre</li>
                        </ul>

                        <label class="form-label" for="clientNewPassword2">Confirmer le mot de passe :</label>
                        <input type="password" id="clientNewPassword2" name="clientNewPassword2"
                            class="form-control mb-2" required />

                    </div>
                    <button type="submit" class="btn btn-dark w-100" formaction="#">Confirmer</button>
                    <p class='error-message'>
                        <?php
                    if (!empty($errorMessage2)) {
                        echo "<p class='alert alert-danger mt-3'>$errorMessage2</p>";
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

    <!-- Popup succès -->
    <div class="modal fade" id="passwordChangedModal" tabindex="-1" aria-labelledby="passwordChangedModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="passwordChangedModalLabel">Changement de mot de passe</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Le mot de passe a été modifié avec succès !
                </div>
                <div class="modal-footer">
                    <a href="../controllers/AuthentificationCTRL.php" class="btn btn-secondary">Se connecter</a>
                </div>
            </div>
        </div>
    </div>


    <?php if ($passwordChanged === true): ?>
    <script>
    var myModal = new bootstrap.Modal(document.getElementById('passwordChangedModal'), {});
    myModal.show();
    </script>
    <?php endif; ?>

</body>

</html>