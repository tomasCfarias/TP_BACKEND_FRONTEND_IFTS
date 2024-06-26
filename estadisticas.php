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
            $sql = "SELECT u.email, SUM(v.preciototal) AS total_compras
                FROM ventas v
                JOIN usuarios u ON v.idCliente = u.id
                GROUP BY v.idCliente
                ORDER BY total_compras DESC
                LIMIT 3";
    
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

        function getVentasPorDiaDeMesActual($conn) {

            $month = date('m');
            $year = date('Y');
            $sql = "SELECT DAY(fechaVenta) AS dia, SUM(preciototal) AS total_ventas
                    FROM ventas
                    WHERE MONTH(fechaVenta) = $month AND YEAR(fechaVenta) = $year
                    GROUP BY DAY(fechaVenta)
                    ORDER BY dia";
            
            $result = $conn->query($sql);
            if (!$result) {
                die('Error en la consulta: ' . $conn->error); // Verifica errores en la consulta
            }
            $data = [];
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }

        function getProductosMasVisitados($conn) {
            $sql = "SELECT Name, visitas
                    FROM productos
                    ORDER BY visitas DESC
                    LIMIT 10";
        
            $result = $conn->query($sql);
            if (!$result) {
                die('Error en la consulta: ' . $conn->error); // Verifica errores en la consulta
            }
            $data = [];
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }

        function getVentasPorCategoria($conn) {
            $sql = "SELECT c.Categoría, SUM(dv.cantidad) AS total_vendidos
                FROM detalleventas dv
                JOIN productos p ON dv.idProducto = p.Id
                JOIN categorías c ON p.Categoría = c.id
                GROUP BY c.Categoría
                ORDER BY total_vendidos DESC";
            
            $result = $conn->query($sql);
            if (!$result) {
                die('Error en la consulta: ' . $conn->error);
            }
            $data = [];
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }

        $productosMasVendidos = getProductosMasVendidos($conn);
        $top_clientes = getTopClientes($conn);
        $ventasPorDiaDeMayo = getVentasPorDiaDeMesActual($conn);
        $productosMasVisitados = getProductosMasVisitados($conn);
        $ventasPorCategoria = getVentasPorCategoria($conn);
        


        // Obtener datos y enviarlos en formato JSON
        header('Content-Type: application/json');
        //echo json_encode(getProductosMasVendidos($conn));
        //echo json_encode(getTopClientes($conn));
        echo json_encode([
            'topClientes' => $top_clientes,
            'topVentas' => $productosMasVendidos,
            'ventasPorDiaDeMayo' => $ventasPorDiaDeMayo,
            'prodMasVisitados' => $productosMasVisitados,
            'ventasPorCategoria' => $ventasPorCategoria
        ]);
        //echo json_encode(getTopClientes($conn));

        $conn->close();

?>



    


    
    
