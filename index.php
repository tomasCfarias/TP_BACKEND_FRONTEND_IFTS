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
            <h2>Bienvenido</h2>
            <section class="tabla-usuarios">
                <?php include("mostrarUsuarios.php") ?>
            </section>
        </section>
        </div>     
</body>
<script src="navbar.js"></script>
<script src="./api/LoadNotification.js"></script>
</html>

