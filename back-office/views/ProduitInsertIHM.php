<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Ajouter un produit</title>
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
            <div class="sidebar-heading border-bottom bg-light">Ajouter un produit</div>
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
                <!-- ! MenuInsertIHM CONTENT !  -->
                <div class="container">
                    <h4 class="mb-3">Liste de vos produits</h4>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID Produit</th>
                                    <th>Nom</th>
                                    <th>Catégorie</th>
                                    <th>Prix (€)</th>
                                    <th>Quantité stock</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($selectAll as $enregistrement) { ?>
                                    <tr>
                                        <td>
                                            <?= $enregistrement['id_produit'] ?>
                                        </td>
                                        <td>
                                            <?= $enregistrement['nom_produit'] ?>
                                        </td>
                                        <td>
                                            <?= $enregistrement['categorie_produit'] ?>
                                        </td>
                                        <td>
                                            <?= $enregistrement['prix_produit'] ?>
                                        </td>
                                        <td>
                                            <?= $enregistrement['qte_stock_produit'] ?>
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
                        <h4 class="mb-3">Insertion d'un produit</h4>
                        <form action="../controllers/ProduitInsertCTRL.php" method="post" id="formInsert">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="nomMenu">Nom du produit :</label>
                                    <input type="text" class="form-control" id="nomProduit" name="nomProduit"
                                        placeholder="" value="testProduit" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="prixProduit">Prix du produit :</label>
                                    <input type="number" class="form-control" id="prixProduit" name="prixProduit"
                                        placeholder="xx,xx" size="4" step="any" value="3.99" />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="qteStockProduit">Quantité en stock :</label>
                                    <input type="number" class="form-control" id="qteStockProduit"
                                        name="qteStockProduit" placeholder="" size="4" value="3" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="categorieProduit">Catégorie :</label>
                                    <input type="text" class="form-control" id="categorieProduit"
                                        name="categorieProduit" placeholder="" value="Fromage" />
                                </div>
                            </div>
                            <div>
                                <input type="submit" value="Ajouter le produit" id="btInsert" name="btInsert"
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