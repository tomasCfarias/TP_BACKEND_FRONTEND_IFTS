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

        echo "<script>  
            
            alert('Se ha eliminado el proveedor exitosamente');
            </script>";
        header("Location: ./proveedores.php");
    }else{
        echo "<script languaje='JavaScript'>  
            alert('No se ha eliminado el proveedor');
            location.assign('./proveedores.php');
            </script>";
    }
    // Cerrar la conexión
    //$conn->close();
?>