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
    <title>TP INTEGRADOR</title>
</head>

<body>
    <?php
        include_once("./sql/navbar.php")
    ?>
    <section class="main">
        <h1>Bienvenido</h1>
        <a href="articulos.php">Ver tienda</a>
    </section>
    <footer class="footer">FOOTER</footer>
</body>

</html>

