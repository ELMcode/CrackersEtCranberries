<!DOCTYPE html>
<!-- AuthentificationCodeView.php -->
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


    <section class="container mt-5">
        <div class="card text-center mx-auto" style="max-width: 400px;">
            <div class="card-header h5 text-white bg-dark">Validation</div>
            <div class="card-body px-5">
                <p class="text-center">Veuillez entrer le code de validation que vous avez reçu par e-mail. Ce code est
                    valide 10 minutes.</p>
                <form action="../controllers/AuthentificationCTRL.php" method="post" id="formValidation">
                    <div class="mb-3">
                        <label for="codeValidation" class="form-label">CODE DE VALIDATION</label>
                        <input type="text" class="form-control" name="codeValidation" id="codeValidation"
                            placeholder="Code reçu par e-mail" value="" required />
                    </div>

                    <div class="mb-3">
                        <button type="reset" name='btReinitialiser' id='btReinitialiser'
                            class="btn btn-secondary">R&eacute;initialiser</button>
                        <input type="submit" value="Valider" id="btValidate" name="btValidate" class="btn btn-dark" />
                    </div>

                    <div class="mb-3">
                        <p class='error-message'>
                            <?php
                            if (!empty($message)) {
                                echo "<p class='alert alert-danger mt-3'>$message</p>";
                            }
                            ?>
                        </p>
                        <p class='error-message'>
                            <?php
                            if (!empty($messageSuccess)) {
                                echo "<p class='alert alert-success mt-3'>$messageSuccess</p>";
                            }
                            ?>
                        </p>
                    </div>
                </form>

            </div>
        </div>

    </section>

    <hr />

    <footer>
        <?php
        include '../views/partials/footer.php';
        ?>
    </footer>

    <!-- <script src="/bootstrap-5.0.2-dist/js/bootstrap.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js"></script>

</body>

</html>