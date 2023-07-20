<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Back-Office Admin</title>
    <!-- Favicon-->
    <!-- <link rel="icon" type="image/x-icon" href="assets/favicon.ico" /> -->
    <!-- Core theme CSS (includes Bootstrap)-->

    <link rel="stylesheet" href="../../bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link href="../css/styles.css" rel="stylesheet" />
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar-->
        <div class="border-end bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading border-bottom bg-light">Accueil Admin</div>
            <div class="list-group list-group-flush">
                <li class="list-group-item list-group-item-action list-group-item-light p-3 dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="menuDropdown" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Clients
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="menuDropdown">
                        <a class="dropdown-item" href="#">Ajouter un client</a>
                        <a class="dropdown-item" href="#">Modifier un client</a>
                        <a class="dropdown-item" href="#">Supprimer un client</a>
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
                <div class="mt-2 mb-3">
                    <h2 class="text-center">Back Office C&amp;C</h2>
                </div>

                <h4>Bienvenue sur votre back-office !</h4>

                <p>Avec ce système de base de données, vous pouvez ajouter, modifier et supprimer du contenu en
                    quelques
                    clics
                    seulement, sans avoir besoin de connaissances techniques avancées et en temps réel.</p>

                <p>Dans votre espace administrateur, vous trouverez différents onglets pour gérer les
                    informations de
                    votre site :
                </p>


                <div class="row row-cols-1 row-cols-md-2 g-4 mt-3">
                    <div class="col">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">Clients</h5>
                                <p class="card-text">Gérez les informations de vos clients.</p>
                                <ul class="card-text">
                                    <li>Créez de nouveaux clients</li>
                                    <li>Voyez les détails des clients existants</li>
                                    <li>Modifier leur informations personnelles, ainsi que leur historique de
                                        commandes et devis.</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">Devis</h5>
                                <p class="card-text">Gérez les devis envoyés à vos clients potentiels.</p>
                                <ul class="card-text">
                                    <li>Créez de nouveaux devis</li>
                                    <li>Voyez les détails des devis existants</li>
                                    <li>Modifiez leur quantité, leur statut et leur montant total.</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">Produits</h5>
                                <p class="card-text">Gérez les différents produits disponibles sur votre site.</p>
                                <ul class="card-text">
                                    <li>Ajoutez, modifiez ou supprimez des produits</li>
                                    <li>Changez leur nom, leur description, leur catégorie, leur photo, leur prix et
                                        leur stock.</li>
                                </ul>
                            </div>
                        </div>
                    </div>


                    <div class="col">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">Menu</h5>
                                <p class="card-text">Gérez vos plats et menus disponibles sur votre site.</p>
                                <ul class="card-text">
                                    <li>Ajoutez, modifiez ou supprimez des plats et menus</li>
                                    <li>Changez leur nom, leur description, leur catégorie, leur photo, leur prix et
                                        leur stock.
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>



                    <div class="col">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">Composition menu</h5>
                                <p class="card-text">Gérez la composition de vos menus disponibles sur votre
                                    site.
                                </p>
                                <ul class="card-text">
                                    <li>Ajoutez, modifiez ou supprimez des produits de vos menus</li>
                                    <li>Changez leur quantité</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">Commandes</h5>
                                <p class="card-text">Gérez les différentes commandes passées par vos clients.
                                </p>
                                <ul class="card-text">
                                    <li>Voyez les détails de chaque commande</li>
                                    <li>Modifiez leur statut, ajustez les quantités de produits commandés et
                                        gérez
                                        les remises
                                        ou les promotions appliquées.</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col mb-3">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">Composition commandes</h5>
                                <p class="card-text">Gérez la composition de chaque commande passée sur votre
                                    site.
                                </p>
                                <ul class="card-text">
                                    <li>Voyez les détails des produits commandés pour chaque commande</li>
                                    <li>Modifiez leur quantité, leur statut et leur montant total.</li>
                                </ul>
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