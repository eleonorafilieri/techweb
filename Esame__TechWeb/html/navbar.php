<nav class="navbar sticky-top navbar-expand-lg navbar-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="../pagine/homepage.php">
         <img src="../image/logo_navbar.png" width="auto" height="40" class="d-inline-block align-top" alt="">
      </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" id="home" data-bs-toggle="collapse" data-bs-target=".navbar-collapse.show">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Ambienti
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" data-value="cucina">Cucina</a>
                        <a class="dropdown-item" data-value="camera">Camera da Letto</a>
                        <a class="dropdown-item" data-value="bagno">Bagno</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="about" data-bs-toggle="collapse" data-bs-target=".navbar-collapse.show">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="carrello" data-bs-toggle="collapse" data-bs-target=".navbar-collapse.show"><img id="shoppingCart" class="shake" src="../image/cart.png"><span class="badge"><?php if ($count = count($_SESSION['cart'])) echo $count; ?></span></a>
                </li>
                <li class="nav-item">
                    <a id="logout" class="nav-link" data-bs-toggle="collapse" data-bs-target=".navbar-collapse.show">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
