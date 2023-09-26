<?php

function conexion() {
    $local = "localhost";
    $username = "root";
    $password = "";
    $db = "ifts";

    $conn = new mysqli($local, $username, $password, $db); 

    // Error al conectar con la BDD
    if ($conn->connect_errno) {
        die("Fallo al conectar a la Base de Datos: " . $conn->connect_error); 
    } else {
        echo "Éxito al conectar a la Base de Datos";
    }

    return $conn;
}


// $sql = "CREATE DATABASE ifts";

// if (mysqli_query($conn, $sql)) {
//     echo "La base de datos se ha creado correctamente.";
// } else {
//     echo "Error al crear la base de datos: " . mysqli_error($conn);
// }

// // Cerrar la conexión
// mysqli_close($conn);
?>