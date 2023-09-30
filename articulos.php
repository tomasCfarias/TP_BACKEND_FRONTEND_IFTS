<?php
    include("./api/connection.php");

    $conn = conexion();
    session_start();
    $sql = "SELECT * FROM productos";
    $result = $conn -> query($sql);

    $conn ->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado</title>
    <link rel="stylesheet" href="css/products.css">
    <link rel="stylesheet" href="css/navbartienda.css">
</head>
<body>
    <?php
        include("api/navbartienda.php") 
    ?>
    <section class="products-list">
        <?php

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='product-card' id = " . $row["Id"] . ">";
                    echo "<div class='img-placeholder'>"."</div>";
                    echo "<b class= 'product-name'>" . $row["Name"] . " "."</b>";
                    echo "<b> $" . $row["price"] ." ". "</b>";
                    echo "<p> " . $row["description"] . " "."</p>";
                    echo "</div>";
                }
            } else {
                echo "NO HAY REGISTROS";
            }

        ?>
    </section>
</body>
</html>

<script src="articulos.js"></script>