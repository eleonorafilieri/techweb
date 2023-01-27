<?php
//Il file corrente gestisce la registrazione di un nuovo utente.
include("../dataManagement/db.php");
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
    <?php include("../html/" . $_SESSION["navbar"]); ?>
    <div class="container">
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
    <?php include("../html/footer.html"); ?>

</body>
</html>
