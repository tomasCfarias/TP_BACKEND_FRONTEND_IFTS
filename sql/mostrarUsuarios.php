<?php
    include("connection.php");
    $conn = conexion();

    $sql = "SELECT * FROM usuarios";
    $result = $conn -> query($sql);

    $conn ->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Usuarios</title>
</head>

<body>

<a href="/signin.php">VOLVER</a>
    <table border="2px">
        <tr>
            <th>ID</th>
            <th>EMAIL</th>
            <th>USUARIO</th>
            <th>CONTRASEÑA</th>
        </tr>
    </table>
</body>

</html>

<?php

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . " "."</td>";
        echo "<td>" . $row["email"] ." ". "</td>";
        echo "<td>" . $row["usuario"] . " "."</td>";
        echo "<td>" . $row["contraseña"] ." ". "</td>";
        echo "</tr>"."<br>";
    }
} else {
    echo "NO HAY REGISTROS";
}
?>