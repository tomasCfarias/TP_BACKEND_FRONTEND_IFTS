<?php
    include("./sql/connection.php");

    $conn = conexion();

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
</head>
<body>
    <nav class="navbar">
        <p>Placeholder</p>
    </nav>
    <section class="products">
        <?php

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='product-card'>";
                    echo "<div class='img-placeholder'>"."</div>";
                    echo "<b>" . $row["Name"] . " "."</b";
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