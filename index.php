<?php

session_start();

if(!isset($_SESSION['login_user'])){ //if login in session is not set
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/navbar.css">
    <link rel="stylesheet" href="css/index.css">
    <title>TP INTEGRADOR</title>
</head>

<body>
    <?php
        include_once("./api/navbar.php");
    ?>
    <div class="main-container">
    <?php
        include_once("./api/sidebar.php")
    ?>
        <section class="main">
            <h1>Bienvenido</h1>
            <a href="articulos.php"><h1>Ir a la tienda</h1></a>
        </section>
        </div>
        <?php
        include_once("./api/footer.php")
        ?>
</body>
<script src="navbar.js"></script>
</html>

