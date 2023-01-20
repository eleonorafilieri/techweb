<?php
//Il file corrente gestisce la registrazione di un nuovo utente.
include("../dataManagement/db.php");
//include("../dataManagement/common.php");
isLogged();
?>
<!doctype html>
<html lang="en">

<head>
	<?php include("../html/top.html"); ?>
	<!-- CSS -->
	<link rel="stylesheet" href="../css/carrello.css">

	<!-- FONTAWESOME-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<!-- JS -->
	<script src="../js/carrello.js"></script>
</head>

<body>
<div id="hideText"></div>
    <?php include("../html/" . $_SESSION["navbar"]); ?>	<div class="container">
		<h1 class="page-header text-center">Shopping Cart</h1>
		<div class="row">
			<div class="col">
				<div id="tableDiv">
				<?php
				if (isset($_SESSION['message'])) {
				?>
					<div class="alert alert-info text-center">
						<?php echo $_SESSION['message']; ?>
					</div>
				<?php
					unset($_SESSION['message']);
				}

				?>

				</div>
				<table class="table table-bordered table-striped">

				</table>
				<a href="../pagine/homepage.php" class="btn btn-primary">Indietro</a>
					<a id="clearCart" class="btn btn-danger">Svuota il carrello</a>
					<a href="#" id="checkout" class="btn btn-success">Checkout</a>
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
