<?php

    session_start();

    if(!isset($_SESSION['login_user'])){ //if login in session is not set
        header("Location: login.php");
    }

    

?>
    
<?php

        include("./api/connection.php");
        $conn = conexion();

        //var_dump($conn);

        function getProductosMasVendidos($conn){
            $sql = "SELECT p.Name AS nombreProducto, SUM(dv.cantidad) AS total_vendidos
                FROM detalleventas dv
                JOIN productos p ON dv.idProducto = p.Id
                GROUP BY dv.idProducto, p.Name
                ORDER BY total_vendidos DESC
                LIMIT 10";
            

            $result = $conn->query($sql);
            if (!$result) {
                die('Error en la consulta: ' . $conn->error); // Verifica errores en la consulta
            }
            $data = [];
            while($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
        function getTopClientes($conn) {
            $sql = "SELECT v.IdCliente, c.Name, SUM(v.preciototal) AS total_compras
                FROM ventas v
                JOIN clientes c ON v.IdCliente = c.Id
                GROUP BY v.IdCliente, c.Name
                ORDER BY total_compras DESC, v.IdCliente ASC
                LIMIT 5";
    
            $result = $conn->query($sql);
            if (!$result) {
                die('Error en la consulta: ' . $conn->error);
            }
            $data = [];
            while($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }

        $productosMasVendidos = getProductosMasVendidos($conn);
        //$top_clientes = getTopClientes($conn);


        // Obtener datos y enviarlos en formato JSON
        header('Content-Type: application/json');
        echo json_encode(getProductosMasVendidos($conn));
        /*echo json_encode([
            //'topClientes' => $top_clientes,
            'topVentas' => $productosMasVendidos
        ]);*/
        //echo json_encode(getTopClientes($conn));

        $conn->close();

?>



    


    
    
