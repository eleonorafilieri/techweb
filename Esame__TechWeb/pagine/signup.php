
<!doctype html>
<html lang="en">

<head>
    <!-- CSS -->
    <link rel="stylesheet" href="../css/signup.css">

    <?php include("../html/top.html"); ?>

    <!-- JS -->
    <script src="../js/signup.js"></script>
</head>

<body>
    <div class="container w-75 bg-primary my-4 rounded shadow">
        <div class="row align-items-stretch">
            <!--IMMAGINE LATERALE-->
            <div class="col bg d-none d-lg-block col-md-5 col-lg-5 col-xl-6 rounded">

            </div>

            <div class="col bg-white p-5 rounded-end">
                <h2 class="fw-bold text-center py-2">REGISTRATI</h2>

                <!-- LOGIN FORM-->
                <form action="../dataManagement/checkSignup.php" method="post">
                    <div class="mb-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email" required>
                    </div>
                    <div class="mb-4">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" required>
                    </div>
                    <div class="mb-4">
                        <label for="password" class="form-label">Password</label>
                        <span id="password-strength"></span>
                        <input type="password" class="form-control" name="password" id="password" minlength="8" required>
                    </div>
                    <div class="mb-4">
                        <label for="confirm-password" class="form-label">Conferma password</label>
                        <span id="confirm-password-strength"></span>
                        <input type="password" class="form-control" name="confirm-password" id="confirm-password" minlength="8" required>
                        <?php
                        //popup per controllo delle password
                        if (isset($_SESSION["message"])) {
                        ?>
                            <div id="error-message"> <?= $_SESSION["message"] ?> </div>
                        <?php
                            unset($_SESSION["message"]);
                        }
                        ?>
                    </div>

                    <div class="d-grid">
                        <input class="btn btn-primary mb-2" type="submit" value="Registrami" id="signup">
                        <a class="btn btn-danger" href="index.php" role="button">Indietro</a>
                    </div>

                </form>
                <!-- LOGIN CON SOCIAL-->
                <div class="container w-100 my-5">
                    <div class="row text-center">
                        <div class="col-12">Registrati con:</div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <button id="fb" class="btn btn-outline-primary w-100 my-1">
                                <div class="row align-items-center">
                                    <div class="col-12 col-md-12 text-center">
                                        Facebook
                                    </div>
                                </div>
                            </button>
                        </div>
                        <div class="col">
                            <button id="google"class="btn btn-outline-danger w-100 my-1">
                                <div class="row align-items-center">
                                    <div class="col-12  col-md-12 text-center">
                                        Google
                                    </div>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--TOAST ALERT PER LE PASSWORD NON UGUALI-->
    <div aria-live="polite" aria-atomic="true" class="d-flex justify-content-center align-items-center">
        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header"></div>
            <div class="toast-body"></div>
        </div>
    </div>
</body>

</html>
