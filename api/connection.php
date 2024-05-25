<?php


function conexion() {

    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "iftsnew";
   
    $conn = new mysqli($servername, $username, $password, $db);

    // Error al conectar con la BDD
    if ($conn->connect_errno) {
        die("Fallo al conectar a la Base de Datos: " . $conn->connect_error); 
    } 
    return $conn;
}

?>