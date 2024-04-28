<?php

include("connection.php");
$conn = conexion(); 

/*if(isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    $tmp_name = $_FILES["image"]["tmp_name"];
    $img_extension = strtolower(pathinfo($_FILES["image"]["name"],PATHINFO_EXTENSION));
    $new_name = uniqid("IMG-",true).'.'.$img_extension;
 
    $upload_path = "../img/".$new_name;
    move_uploaded_file($tmp_name,$upload_path);
}*/
 

$name = $_POST["nombre"];
$email = $_POST["email"];
$telefono = $_POST["telefono"];



$sql = "INSERT INTO proveedores (Nombre, Email, Telefono) VALUES ('$name', '$email', '$telefono')";

if ($conn->query($sql) === TRUE) { 



    echo '<script type="text/javascript">
    alert("El proveedor ha sido cargado con exito!.");
    </script>';
    //flush();
    
    //sleep(1);
    header("Location: ../proveedores.php");

    exit();
} else {
    echo "Error al registrar: " . $conn->error; 
}
// Cerrar la conexión
$conn->close();
?>