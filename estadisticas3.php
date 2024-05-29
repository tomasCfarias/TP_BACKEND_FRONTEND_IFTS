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
    <link rel="stylesheet" href="css/estadisticas.css">
    <link rel="stylesheet" href="css/navbar.css">
    <title>Estadísticas</title>
</head>
<body>
    
    <?php
        include_once("./api/navbar.php")
    ?>
    <div class="main-container">
        <?php
        include("./api/sidebar.php");
        ?>
        <section class="content">

            <div class="btn-container">
                <a class="button" href="index.php">Volver</a>
            </div>
            <h2>Estadísticas</h2>
            <div class="graphs">
                    <div class="col-4" >
                        <canvas id="productosMasVendidosChart"></canvas>
                    </div>

                    <div class="col-4">
                        <canvas id="topClientesChart"></canvas>
                    </div>

                    <div class="col-4">
                        <canvas id="ventasPorDiaDeMesChart"></canvas>
                    </div>

                    <div class="col-4">
                        <canvas id="productosMasVisitadosChart"></canvas>
                    </div>

                    <div class="col-4">
                        <canvas id="ventasPorCategoriaChart"></canvas>
                    </div>
            </div>
            
        </section>
    </div>

    <script src="navbar.js"></script>
    <script src="./api/LoadNotification.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="estadisticas.js"></script>

</body>
</html>
