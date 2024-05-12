<?php 
    include("connection.php");
    $conn = conexion();

    //Trae de la base de datos las ventas que no fueron notificadas
    $sql = "SELECT * FROM ventas WHERE notificado = 0 ORDER BY IdVenta DESC";
    $result = $conn -> query($sql);
    $output = array();
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $url = "detalleventa.php?id=" .$row["IdVenta"]."";
            $html = "<li>Realizaste una nueva venta! Valor: <b>$".$row["preciototal"]."</b> <b><a href=".$url.">Ver detalle</a></b></li>";
            $sql = "INSERT INTO notificaciones(Texto,is_read,Tipo) VALUES ('$html',0,'venta')";
            //Crea la notificación y la inserta en la base de datos
            $res = $conn ->  query($sql);
        }
    }
    
    //Marca las ventas como notificadas
    $sql = "UPDATE ventas SET notificado = 1 WHERE notificado = 0";
    $result = $conn -> query($sql);

    //Cuenta la cantidad de notificaciones que hay sin leer en la base de datos
    $sql = "SELECT * from notificaciones WHERE Tipo = 'venta' AND is_read = 0";
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
        $data = array("notification" => $output, "count" => $count);
        echo json_encode($data,JSON_UNESCAPED_SLASHES);
    } else {
        echo json_encode(array("count" => 0));
    }
?>