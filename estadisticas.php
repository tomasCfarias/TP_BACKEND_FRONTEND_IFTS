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
    <link rel="stylesheet" href="css/mostrarusuarios.css">
    <link rel="stylesheet" href="css/estadisticas.css">
    <link rel="stylesheet" href="css/navbar.css">

    <title>Graficos e-commerce</title>
</head>
<body>
<?php
        include_once("./api/navbar.php")
    ?>
    <div class="main-container">
    <?php
        include_once("./api/sidebar.php")
    ?>
    <div class="container">

        <div class="head">
            <h2>Graficos del ecommerce</h2>
            <div class="botonVolver">
                <a type="button" class="btn btn-light m-2" style=" text-align: center;" href="index.php">Volver</a>
            </div>
        </div>
        <section class="content">
            
            <div class="container overflow-hidden text-center">
                <div class="row g-2">
                    <div class="col-4">
                        <canvas id="myChart"></canvas>
                    </div>

                    <div class="col-4">
                        <canvas id="myChart2"></canvas>
                    </div>

                    <div class="col-4">
                        <canvas id="myChart3"></canvas>
                    </div>

                    <div class="col-4">
                        <canvas id="myChart4"></canvas>
                    </div>

                </div>
            </div>

            <!--<div>
                <canvas id="myChart" height="150" width="300"></canvas>
                <canvas id="myChart2" height="150" width="300"></canvas>
                
            </div>-->
            
        </section>

    </div>
    </div>

    <script src="navbar.js"></script>
    <script src="./api/LoadNotification.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js" integrity="sha512-L0Shl7nXXzIlBSUUPpxrokqq4ojqgZFQczTYlGjzONGTDAcLremjwaWv5A+EDLnxhQzY5xUZPWLOLqYRkY0Cbw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="graphs.js"></script>
</body>
</html>