<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Modifier un menu</title>
    <!-- Favicon-->
    <!-- <link rel="icon" type="image/x-icon" href="assets/favicon.ico" /> -->
    <!-- Core theme CSS (includes Bootstrap)-->

    <link rel="stylesheet" href="../../bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link href="../css/styles.css" rel="stylesheet" />
</head>

<body>

    <!-- ! MENU AND NAVBAR BOOTSTRAP CONTENT !-->
    <div class="d-flex" id="wrapper">
        <!-- Sidebar-->
        <div class="border-end bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading border-bottom bg-light">Modifier un menu</div>
            <div class="list-group list-group-flush">
                <li class="list-group-item list-group-item-action list-group-item-light p-3 dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="menuDropdown" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Clients
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="menuDropdown">
                        <a class="dropdown-item" href="../controllers/ClientInsertCTRL.php">Ajouter un client</a>
                        <a class="dropdown-item" href="../controllers/ClientUpdateCTRL.php">Modifier un client</a>
                        <a class="dropdown-item" href="../controllers/ClientDeleteCTRL.php">Supprimer un client</a>
                    </div>
                </li>
                <li class="list-group-item list-group-item-action list-group-item-light p-3 dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="menuDropdown" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Devis
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="menuDropdown">
                        <a class="dropdown-item" href="../controllers/DevisInsertCTRL.php">Ajouter un devis</a>
                        <a class="dropdown-item" href="../controllers/DevisUpdateCTRL.php">Modifier un devis</a>
                        <a class="dropdown-item" href="../controllers/DevisDeleteCTRL.php">Supprimer un devis</a>
                    </div>
                </li>

                <li class="list-group-item list-group-item-action list-group-item-light p-3 dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="menuDropdown" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Produits
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="menuDropdown">
                        <a class="dropdown-item" href="../controllers/ProduitInsertCTRL.php">Ajouter un produit</a>
                        <a class="dropdown-item" href="../controllers/ProduitUpdateCTRL.php">Modifier un produit</a>
                        <a class="dropdown-item" href="../controllers/ProduitDeleteCTRL.php">Supprimer un produit</a>
                    </div>
                </li>
                <li class="list-group-item list-group-item-action list-group-item-light p-3 dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="menuDropdown" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Menu
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="menuDropdown">
                        <a class="dropdown-item" href="../controllers/MenuInsertCTRL.php">Ajouter un menu</a>
                        <a class="dropdown-item" href="../controllers/MenuUpdateCTRL.php">Modifier un menu</a>
                        <a class="dropdown-item" href="../controllers/MenuDeleteCTRL.php">Supprimer un menu</a>
                    </div>
                </li>
                <li class="list-group-item list-group-item-action list-group-item-light p-3 dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="menuDropdown" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Composition menu
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="menuDropdown">
                        <a class="dropdown-item" href="#">Ajouter des produits dans un menu</a>
                        <a class="dropdown-item" href="#">Modifier des produits dans un menu</a>
                        <a class="dropdown-item" href="#">Supprimer des produits dans un menu</a>
                    </div>
                </li>
                <li class="list-group-item list-group-item-action list-group-item-light p-3 dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="menuDropdown" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Commandes
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="menuDropdown">
                        <a class="dropdown-item" href="../controllers/CommandeInsertPOOCTRL.php">Ajouter une
                            commande</a>
                        <a class="dropdown-item" href="../controllers/CommandeUpdatePOOCTRL.php">Modifier une
                            commande</a>
                        <a class="dropdown-item" href="../controllers/CommandeDeletePOOCTRL.php">Supprimer une
                            commande</a>
                    </div>
                </li>
                <li class="list-group-item list-group-item-action list-group-item-light p-3 dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="menuDropdown" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Composition commande
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="menuDropdown">
                        <a class="dropdown-item" href="#">Ajouter des produits dans une commande</a>
                        <a class="dropdown-item" href="#">Modifier des produits dans une commande</a>
                        <a class="dropdown-item" href="#">Supprimer des produits dans une commande</a>
                    </div>
                </li>

            </div>
        </div>
        <!-- Page content wrapper-->
        <div id="page-content-wrapper">
            <!-- Top navigation-->
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <div class="container-fluid">
                    <button class="btn btn-dark" id="sidebarToggle"><img src="../icon/button-onglet.svg" width="25vw"
                            alt="onglets" /></button>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation"><span
                            class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                            <li class="nav-item active"><a class="nav-link" href="../views/Accueil.php">Accueil
                                    Admin</a>
                            </li>
                            <li class="nav-item"><a class="nav-link"
                                    href="https://elm.alwaysdata.net/CrackersEtCranberries/views/accueil.php">C&C</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Options</a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#!">Action</a>
                                    <a class="dropdown-item" href="#!">Action</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#!">Déconnexion</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Page content-->
            <div class="container-fluid">
                <!-- ! MenuUpdateIHM CONTENT !  -->
                <div class="container">
                    <h4 class="mb-3">Liste de vos menus</h4>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID Menu</th>
                                    <th>Nom</th>
                                    <th>Catégorie</th>
                                    <th>Prix 2 personnes (€)</th>
                                    <th>Prix 4 personnes (€)</th>
                                    <th>Description</th>
                                    <th>Quantité stock</th>
                                    <th>Photo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($selectAll as $enregistrement) { ?>
                                    <tr>
                                        <td>
                                            <?= $enregistrement['id_menu'] ?>
                                        </td>
                                        <td>
                                            <?= $enregistrement['nom_menu'] ?>
                                        </td>
                                        <td>
                                            <?= $enregistrement['categorie_menu'] ?>
                                        </td>
                                        <td>
                                            <?= $enregistrement['prix_2pers_menu'] ?>
                                        </td>
                                        <td>
                                            <?= $enregistrement['prix_4pers_menu'] ?>
                                        </td>
                                        <td>
                                            <?= $enregistrement['description_menu'] ?>
                                        </td>
                                        <td>
                                            <?= $enregistrement['qte_stock_menu'] ?>
                                        </td>
                                        <td>
                                            <?= $enregistrement['photo_menu'] ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>


                <div>
                    <!-- Requête vers le contrôleur -->
                    <div class="container">
                        <h4 class="mb-3">Modification d'un menu</h4>
                        <form action="../controllers/MenuUpdateCTRL.php" method="post" id="formUpdate">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="idMenu">ID menu :</label>
                                    <input type="number" class="form-control" id="idMenu" name="idMenu" placeholder=""
                                        value="" />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="nomMenu">Nom du menu :</label>
                                    <input type="text" class="form-control" id="nomMenu" name="nomMenu" placeholder=""
                                        value="testMenu" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="catMenu">Catégorie :</label>
                                    <input type="text" class="form-control" id="catMenu" name="catMenu" placeholder=""
                                        value="été" />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="qteStock">Quantité en stock :</label>
                                    <input type="number" class="form-control" id="qteStock" name="qteStock"
                                        placeholder="" size="4" value="3" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="prixMenu2pers">Prix menu 2 personnes :</label>
                                    <input type="number" class="form-control" id="prixMenu2pers" name="prixMenu2pers"
                                        placeholder="xx,xx" size="4" step="any" value="27.99" />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="prixMenu4pers">Prix menu 4 personnes :</label>
                                    <input type="number" class="form-control" id="prixMenu4pers" name="prixMenu4pers"
                                        placeholder="xx,xx" size="4" step="any" value="30.99" />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="description">Description :</label>
                                <input type="text" class="form-control" id="description" name="description"
                                    placeholder="Ce menu est idéal pour ..." size="100" value="faf afa f af" />
                            </div>
                            <div class="mb-3">
                                <label for="photoMenu">Nom photo du menu :</label>
                                <input type="text" class="form-control" id="photoMenu" name="photoMenu"
                                    placeholder="xxxx.jpg" size="4" value="afzafaz.jpg" />
                            </div>
                            <div>
                                <input type="submit" value="Modifier le menu" id="btUpdate" name="btUpdate"
                                    class="btn btn-dark btn-lg btn-block py-1 px-2 my-2" />
                                <label class="mx-3">
                                    <?php
                                    if (isset($message)) {
                                        echo $message;
                                    }
                                    ?>
                                </label>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="../js/scripts.js"></script>

</body>

</html>