<?php

    include("./api/connection.php");
    $conn = conexion();


    $id= $_GET['id'];
    $eliminar = "DELETE FROM proveedores WHERE id ='$id'";


    /*if ($conn->query($eliminar) === TRUE) { 
        header("Location: ./proveedores.php");
        exit();
    } else {
        echo "Error al registrar: " . $conn->error; 
    }*/
    
    

    $resultado = mysqli_query($conn , $eliminar);

    if($resultado){

        echo  '<script type="text/javascript">
        alert("El proveedor ha sido eliminado con exito!.");
        window.location.href="./proveedores.php"
        </script>';
        //header("Location: ./proveedores.php");
    }else{
        echo  '<script type="text/javascript">
        alert("El proveedor no ha sido eliminado.");
        window.location.href="./proveedores.php"
        </script>';
    }
    // Cerrar la conexión
    //$conn->close();
?>