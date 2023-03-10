<?php
include("../dataManagement/db.php");
?>
<!doctype html>
<html lang="en">

<head>
    <?php include("../html/top.html"); ?>
    <!-- CSS -->
    <link rel="stylesheet" href="../css/index.css">
</head>

<body>
    <div class="container w-75 bg-primary mt-5 rounded shadow">
        <div class="row align-items-stretch">
            <!--IMMAGINE LATERALE-->
            <div class="col bg d-none d-lg-block col-md-5 col-lg-5 col-xl-6 rounded">

            </div>
            <div class="col bg-white p-5 rounded-end">
                <?php
                if (isset($_SESSION["name"])) {
                ?>
                    <h2 class="fw-bold text-center pt-5">BENVENUTO<?= ": " . $_SESSION["name"] ?></h2>
                <?php
                } else {
                ?>
                    <h2 class="fw-bold text-center pt-5">BENVENUTO</h2>
                <?php
                }
                unset($_SESSION["name"]);
                ?>
                <?php
                if (isset($_SESSION["message"])) {
                ?>
                    <h5 class="fw-bold text-center pb-5"> <?= $_SESSION["message"] ?> </h5>
                <?php
                    unset($_SESSION["message"]);
                }
                ?>

                <!-- LOGIN FORM-->

                <form action="../dataManagement/checkLogin.php" method="post">
                    <div class="mb-4">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username">
                    </div>
                    <div class="mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary mb-2">Login</button>
                        <a class="btn btn-primary" href="signup.php" role="button" id="registration">Registrati</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
