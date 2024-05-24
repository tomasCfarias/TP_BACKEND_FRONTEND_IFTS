<?php 
session_start();

if(!isset($_SESSION['login_user'])){ //if login in session is not set
    header("Location: login.php");
}
include("./api/connection.php");
$conn = conexion();
$sql = "SELECT * FROM pedidoproveedor JOIN proveedores ON pedidoproveedor.idProveedor = proveedores.Id ORDER BY pedidoproveedor.fechaPedido DESC";
$result = $conn -> query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/mostrarusuarios.css">
    <link rel="stylesheet" href="./css/navbar.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.css">
    <title>Historial de pedidos</title>
</head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>

<body>
<?php
        include_once("./api/navbar.php")
    ?>
    <div class="main-container">
        <?php include_once("./api/sidebar.php") ?>
        <div class="content">
            <table id="myTable"class="table-products">
                <caption>Pedidos</caption>
                <thead>
                    <tr>
                        <th scope="col">Proveedor</th>
                        <th scope="col">Precio Total</th>
                        <th scope="col">Fecha Pedido</th>
                        <th scope="col">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "
                                <tr>
                                <td>".$row['Nombre']."</td>
                                <td> $".$row['precioPedido']."</td>
                                <td>".$row['fechaPedido']."</td>
                                <td><a href='#' id = 'crudM'>Ver detalle</a></td>
                               
                                </tr>
                            ";
                        }
                    } else {
                        echo "<tr><td colspan='3'>NO HAY REGISTROS</td></tr>";
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </div>
</body>

<script src="navbar.js"></script>
<script src="./api/LoadNotification.js"></script>
</html>