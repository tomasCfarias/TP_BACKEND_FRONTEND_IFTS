<?php

include ("connection.php" ); 
$conn = conexion();

$data = json_decode(file_get_contents("php://input"));
$fecha = $data->fecha;
$columna = $data->columna;
$id = $data->fila;

// Prepara y ejecuta la consulta para insertar la fecha en la columna correspondiente
$sql = "UPDATE ventas SET {$columna} = '$fecha' WHERE IdVenta = '$id';";


if ($conn->query($sql) === TRUE) {
    echo "Fecha guardada exitosamente en " . $columna;
} else {
    echo "Error al guardar la fecha: " . $conn->error;
}

$conn->close();
?>