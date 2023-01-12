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
  <!--CIAO-->

<head>
    <!-- CSS -->
    <link rel="stylesheet" href="../css/about.css">

    <?php include("../html/top.html"); ?>

    <!-- FONTAWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- JS -->
    <script src="../js/homepage.js"></script>
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
                <h1>La nostra storia</h1>
                <p class="about_p"><b>Moderno Arredi</b> produce mobili di qualità con un occhio alla sostenibilità, cercando di costruire un modello che riesce a rispondere ai gusti e alle tendenze sempre differenti dei consumatori. Siamo partiti in piccolo, con una attività artigianale trasformandoci in realtà industriale, percorrendo con tenacia e determinazione tutte le tappe, cercando di rispondere al meglio alle esigenze dei clienti. La nostra storia, anche se recente, è caratterizzata da molte iniziative che danno risalto alla nostra capacità di innovazione per far fronte alle mutazioni delle abitudini e della tecnologia. Con il nostro lavoro abbiamo sviluppato un modello produttivo, con l’obiettivo di diventare un punto di riferimento.
Il nostro obiettivo principale è soddisfare le vostre esigenze estetiche e funzionali, garantendo un’elevata qualità e durata del prodotto.</p>
              </div>
              <div class="col-md-6 col-sm-12">
                <img src="../image/about.jpg" class="img-fluid" alt="...">

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
</body>


</html>
