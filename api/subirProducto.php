<?php

include("connection.php");
$conn = conexion(); 

if(isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    $tmp_name = $_FILES["image"]["tmp_name"];
    $img_extension = strtolower(pathinfo($_FILES["image"]["name"],PATHINFO_EXTENSION));
    $new_name = uniqid("IMG-",true).'.'.$img_extension;
 
    $upload_path = "../img/".$new_name;
    move_uploaded_file($tmp_name,$upload_path);
 }
 

$name = $_POST["nombre"];
$price = $_POST["precio"];
$quantity = $_POST["cantidad"];
$description = $_POST["descripcion"];
$proveedor = $_POST["proveedor"];

$sql = "SELECT id from proveedores WHERE Nombre = '$proveedor'";
$res = $conn->query($sql);
$proveedor = mysqli_fetch_column($res);


$sql = "INSERT INTO productos (Name, quantity, price, description,img_url, idProveedor) VALUES ('$name', '$quantity', '$price','$description','$new_name','$proveedor')";

if ($conn->query($sql) === TRUE) { 
    header("Location: ../mostrarProductos.php");
    exit();
} else {
    echo "Error al registrar: " . $conn->error; 
}

// Cerrar la conexión
$conn->close();
?>
