<?php
//Il file corrente gestisce la registrazione di un nuovo utente.
include("../dataManagement/common.php");
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}
isLogged();

?>
<!doctype html>
<html lang="en">

<head>
    <!-- CSS -->
    <link rel="stylesheet" href="../css/homepage.css">

    <?php include("../html/top.html")?>

    <!-- FONTAWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- JS -->
    <script src="../js/homepage.js"></script>
</head>

<body>
    <div id="hideText"></div>
    <?php include("../html/" . $_SESSION["navbar"]); ?>

    <!-- Modal per l'aggiunta di un mobile -->
    <form class="requires-validation">
        <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLabel">Add record</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-1">
                            <label for="add-name" class="col-form-label">Name:</label>
                            <input type="text" class="form-control" id="add-name" required>
                        </div>

                        <div class="mb-5">
                            <label for="add-price" class="col-form-label">Price:</label>
                            <div class="input-group">
                                <span class="input-group-text">€</span>
                                <span class="input-group-text">0.00</span>
                                <input type="text" class="form-control" id="add-price" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupSelect01">Type</label>
                            <select class="form-select" id="inputGroupSelect01">
                                <option value="cucina" selected>Cucina</option>
                                <option value="camera">Camera da letto</option>
                                <option value="bagno">Bagno</option>

                            </select>
                        </div>
                        <div id="formError" class="text-danger"></div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button id="addBtn" type="button" class="btn btn-danger">Add</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <section class="jumbotron text-center">
        <div class="container-fluid">
          <div class="row hello">
            <h1 style="margin-bottom:1rem!important;"class="jumbotron-heading mb-5">Benvenuto/a <?php echo ($_SESSION['username']); ?></h1>
          </div>
            <!-- Carousel -->
            <div id="demo" class="carousel slide" data-bs-ride="carousel">

                <!-- Indicator -->
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
                </div>

                <!-- The slideshow/carousel -->
                <div class="carousel-inner mb-5">
                    <div class="carousel-item active">
                        <img src="../image/carousel1.png" alt="Los Angeles" class="d-block" style="width:100%">
                    </div>
                    <div class="carousel-item">
                        <img src="../image/carousel2.png" alt="Chicago" class="d-block" style="width:100%">
                    </div>
                    <div class="carousel-item">
                        <img src="../image/carousel3.png" alt="New York" class="d-block" style="width:100%">
                    </div>
                </div>

                <!-- Left and right controls -->
                <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
            <!-- Fine carousel -->

            <h2 class="jumbotron-heading">Crea con noi la tua casa perfetta!</h2>
            <h3 class="jumbotron-heading">Scegli tra tanti prodotti e programma la tua spedizione!</h3>
            <p class="lead text-muted mb-0">Da 25 anni di storia, 20 negozi, 8 store monomarca e 2 outlet, oltre
              300 collaboratori, migliaia di clienti soddisfatti: sono questi i numeri di Nuovarredo, il marchio
              di mobilifici che ha sviluppato una rete capillare in tutta la Puglia, Basilicata, Toscana, Lazio e
              Lombardia e punta ad aumentare la sua presenza su tutto il territorio nazionale.</p>
        </div>
    </section>
    <div class="card-section" id="scroolDown">
        <div class="container">
            <div id="card-section" class="row">
                <!--DOVE VENGONO VISUALIZZATI I PRODOTTI-->
            </div>
        </div>
    </div>
    <footer class="row row-cols-1 row-cols-sm-2 row-cols-md-5 py-5 my-5 border-top">
            <div class="col mb-3">
            <a href="homepage.php" class="d-flex align-items-center mb-3 link-dark text-decoration-none">
                <img class="img-fluid" src="../image/logo_navbar.png" alt="">
            </a>
            </div>

            <div class="col mb-3">

            </div>

            <div class="col mb-3">
            <h5>Pagine</h5>
            <ul class="nav flex-column">
                <li class="nav-item mb-2"><a href="homepage.php" class="nav-link p-0 text-muted">Home</a></li>
                <li class="nav-item mb-2"><a href="carrello.php" class="nav-link p-0 text-muted">Carrello</a></li>
                <li class="nav-item mb-2"><a href="about.php" class="nav-link p-0 text-muted">Chi Siamo</a></li>
                
            </ul>
            </div>

            <div class="col mb-3">
            <h5>Info</h5>
            <ul class="nav flex-column">
                <li class="nav-item mb-2"><a href="https://www.ikea.com/it/it/?gclsrc=aw.ds&gclid=Cj0KCQiAlKmeBhCkARIsAHy7WVvCYiZ5BwX36F1khUjBoryTPHDKSR_gJuRikKhQ1bC4G4XETiTt9PEaAgB5EALw_wcB&gclsrc=aw.ds" class="nav-link p-0 text-muted">I nostri partner</a></li>
                <li class="nav-item mb-2"><a href="https://www.ikea.com/it/it/this-is-ikea/work-with-us/" class="nav-link p-0 text-muted">Lavora Con noi</a></li>
                
            </ul>
            </div>

            <div class="col mb-3">
            <h5>Seguici sui social</h5>
            <ul class="nav flex-column">
                <li class="nav-item mb-2"><a href="https://www.facebook.com/IKEA/?brand_redir=71741444136" class="nav-link p-0 text-muted">Facebook</a></li>
                <li class="nav-item mb-2"><a href="https://www.instagram.com/ikeaitalia/" class="nav-link p-0 text-muted">Instagram</a></li>
            </ul>
            </div>
        </footer>
</body>
</html>
