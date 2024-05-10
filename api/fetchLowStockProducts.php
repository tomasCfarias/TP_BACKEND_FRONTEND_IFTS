<?php 
    include("connection.php");
    $conn = conexion();

    $sql = "SELECT * from productos WHERE quantity < 5";
    $result = $conn -> query($sql);
    $output = array();
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $name = $row["Name"];
            $url = "#";
            $html = "<li>Atención! El producto <b>" .$row["Name"]."</b> Tiene bajo stock. (".$row["quantity"].") <b><a href= ".$url.">Cargar pedido</a></b></li>";

            //Hace una llamada para verificar que no haya una notificacion del mismo producto
            $sql = "SELECT * from notificaciones WHERE Producto = '$name'";
            $res = $conn -> query($sql);
            //Si no está crea la notificacion y la inserta
            //Lo ideal sería que sea una sóla llamada, pero todavía no encontré la forma de hacer ese query
            if (!$res->fetch_row()) {
                $sql = "INSERT INTO notificaciones (Texto,is_read,Tipo,Producto) VALUES ('$html',0,'stock','$name')";
                $res = $conn -> query($sql);
            }
        }
    }


    //Cuenta la cantidad de notificaciones que hay sin leer en la base de datos
    $sql = "SELECT * from notificaciones WHERE Tipo = 'stock' AND is_read = 0";
    $result = $conn ->  query($sql);
    $count = $result -> num_rows;


    //Agrega al output el texto de cada notificacion
    if ($result->num_rows > 0) {
        $i = 0;
        while ($row = $result->fetch_assoc()) {
            $output[$i] = $row["Texto"];
            $i += 1;
        }
    }

    if ($count > 0) {
        $data = array("notification" => $output , "count" => $count);
        echo json_encode($data,JSON_UNESCAPED_SLASHES);
    }
?>