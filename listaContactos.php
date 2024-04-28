<?php

    include("./api/connection.php");
    $conn = conexion();

    session_start();
    if(!isset($_SESSION['login_user'])){ //if login in session is not set
    header("Location: login.php");
    }
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de contactos</title>
    <link rel="icon" type="image/x-icon" href="../images/favicon.png">
    <link rel="stylesheet" href="css/revisarContacto.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    


    <?php

    $consulta = "SELECT * FROM contacto";
    $resultado = $conn->query($consulta);

    if (!$resultado) {
        echo '<script type="text/javascript">
        alert("No hubo resultados para la consulta.");
            </script>';
    }

    echo '<section class="cardSection">
    <h1> Revisar mensajes </h1>
    <table id="tableContactos" class="table table-bordered">
    <thead> 
    <tr>
    <th>id</th>
    <th>Nombre</th>
    <th>Email</th>
    <th>Telefono</th>
    <th>Mensaje</th>
    </tr>
    ';

    while ($fila = mysqli_fetch_array($resultado)) {
        echo "<tr>";
        echo "<td>" . $fila[0] . "</td>";
        echo "<td>" . $fila[1] . "</td>";
        echo "<td>" . $fila[2] . "</td>";
        echo "<td>" . $fila[3] . "</td>";
        echo "<td>" . $fila[4] . "</td>";
    }
    echo "</table>
    <div style='display: flex; justify-content:center;'>
        <a type='button' class='btn btn-light m-2' href='index.php'> Volver </a>
    </div>

    

    </section>";
    //$conexion->close();

    ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="usuarios.js"></script>
</body>

</html>