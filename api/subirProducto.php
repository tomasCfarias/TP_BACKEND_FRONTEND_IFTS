<?php

include("connection.php");
$conn = conexion(); 


$name = $_POST["nombre"];
$price = $_POST["precio"];
$quantity = $_POST["cantidad"];
$description = $_POST["descripcion"];

$sql = "INSERT INTO productos (Name, quantity, price, description) VALUES ('$name', '$quantity', '$price','$description')";

if ($conn->query($sql) === TRUE) { 
    echo "Producto publicado.";
} else {
    echo "Error al registrar: " . $conn->error; 
}

// Cerrar la conexión
$conn->close();
?>
