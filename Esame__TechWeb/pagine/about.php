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
    <link rel="stylesheet" href="../css/about.css">

    <?php include("../html/top.html"); ?>

    <!-- FONTAWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- JS -->
    <script src="../js/homepage.js"></script>
    <script src="../js/about.js"></script>

</head>

<body>

    <div id="hideText"></div>
    <?php include("../html/" . $_SESSION["navbar"]); ?>

    <section class="jumbotron text-center">
        <div class="container-fluid">
          <div class="row hello">
            <h1 style="margin-bottom:1rem!important;"class="jumbotron-heading mb-5">Benvenuto/a <?php echo ($_SESSION['username']); ?></h1>
          </div>
          <br>
            <div class="row">
              <div class="col-md-6 col-sm-12">
                <h1 class="about_title">La nostra storia</h1>
                <p class="about_p"><b>Moderno Arredamenti</b> produce mobili di qualità con un occhio 
                alla sostenibilità, cercando di costruire un modello che riesce a rispondere ai gusti e
                alle tendenze sempre differenti dei consumatori. Siamo partiti in piccolo, con una 
                attività artigianale trasformandoci in <b>realtà industriale</b>, percorrendo con tenacia e
                 determinazione tutte le tappe, cercando di rispondere al meglio alle esigenze dei 
                clienti. La nostra storia, anche se recente, è caratterizzata da molte iniziative 
                che danno risalto alla nostra capacità di innovazione per far fronte alle mutazioni 
                delle abitudini e della tecnologia. <br>
                Con il nostro lavoro abbiamo sviluppato un modello produttivo, con l’obiettivo di diventare
                un punto di riferimento. Il nostro obiettivo principale è soddisfare le vostre<b> esigenze
                  estetiche e funzionali</b>,
                garantendo un’elevata qualità e durata del prodotto.</p>
              </div>
              <div class="col-md-6 col-sm-12">
                <img src="../image/about.jpg" id="image_about" class="img-fluid" alt="...">

              </div>
            </div>
        </div>
        <div class="container-fluid">
          <br>
            <div class="row">
              <div class="col-md-12 col-sm-12">
                <h1 class="about_title">Il nostro team</h1>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 col-sm-4">
              <img src="../image/team1.png" id="img_team1" class="img-fluid img_team" alt="...">

              </div>
              <div class="col-md-4 col-sm-4">
                  <img src="../image/team2.png" id="img_team2"  class="img-fluid img_team" alt="...">

              </div>
              <div class="col-md-4 col-sm-4">
                  <img src="../image/team3.jpg" id="img_team3" class="img-fluid img_team" alt="...">

              </div>
            </div>
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
