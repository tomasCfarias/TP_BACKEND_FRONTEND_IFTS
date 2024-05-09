<?php 
    include("connection.php");
    $conn = conexion();

    $sql = "SELECT * from ventas ORDER BY IdVenta DESC limit 5";
    $result = $conn -> query($sql);
    $output = "";
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $url = "detalleventa.php?id=" .$row["IdVenta"]."";
            $output .= "<li>Realizaste una nueva venta! Valor: <b>$" .$row["preciototal"]."</b> <b><a href= ".$url.">Ver detalle</a></b></li>";
        }
    }
    $data = array("notification" => $output, "count" => 5);
    
    

    echo json_encode($data,JSON_UNESCAPED_SLASHES)
?>