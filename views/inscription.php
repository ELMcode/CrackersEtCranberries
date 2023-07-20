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


    <section class="container mt-5">
        <form id="formSign" method="POST" action="../controllers/InscriptionCTRL.php">
            <fieldset>
                <legend>Inscription</legend>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Civilité :</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="civilite1" id="civilite1" value="Mme">
                            <label class="form-check-label">Madame</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="civilite2" id="civilite2" value="Mr">
                            <label class="form-check-label">Monsieur</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="civilite3" id="civilite3" value="Autre">
                            <label class="form-check-label">Autre</label>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nom</label>
                        <input type="text" class="form-control" name="nom" id="nom">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Prénom</label>
                        <input type="text" class="form-control" name="prenom" id="prenom">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Date de naissance</label>
                        <input type="date" class="form-control" name="datenaissance" id="datenaissance">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">E-mail</label>
                        <input type="email" class="form-control" name="email" id="email">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Confirmez l'e-mail</label>
                        <input type="email" class="form-control" name="email2" id="email2">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Pseudo</label>
                        <input type="text" class="form-control" name="pseudo" id="pseudo">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" name="mdp" id="mdp">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Confirmez le mot de passe</label>
                        <input type="password" class="form-control" name="mdp2" id="mdp2">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Adresse</label>
                        <input type="text" class="form-control" name="adresse" id="adresse">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Ville</label>
                        <input type="text" class="form-control" name="ville" id="ville">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Hobbies</label>
                        <input type="text" class="form-control" name="hobbies" id="hobbies">
                    </div>
                    <div class="col-md-6 mb-3 form-check">
                        <input type="checkbox" class="form-check-input" name="newsletter" id="newsletter">
                        <label class="form-check-label">Newsletter ?</label>
                    </div>
                    <div class="col-md-12 mb-3">
                        <input type="submit" id="btnSubmit" class="btn btn-dark" value="Valider">
                    </div>

                    <div class="col md-3">

                        <label id="lblMessage"></label>

                    </div>

            </fieldset>
        </form>
    </section>

    <script src="../js/Inscription.js"></script>
    <!-- <script src="/bootstrap-5.0.2-dist/js/bootstrap.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js"></script>

</body>

</html>