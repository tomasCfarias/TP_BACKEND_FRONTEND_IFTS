<?php 

include("connection.php");
$conn = conexion();


$sql = "UPDATE notificaciones SET is_read = 1 WHERE is_read = 0";
$result = $conn -> query($sql);

?>