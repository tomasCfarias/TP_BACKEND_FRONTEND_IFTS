<link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.css"/>
<?php
session_start();

if(!isset($_SESSION['login_user'])){ 
    header("Location: login.php");
}

include("./api/connection.php");
$conn = conexion();

$sql = "SELECT * FROM ventas JOIN usuarios ON ventas.IdCliente = usuarios.id ORDER BY ventas.fechaVenta DESC;"; //IF(fechaEntrega = '0000-00-00', 'Activas', IF(fechaEnvio != '0000-00-00', 'Completadas', 'Activas')) AS estado
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ventas</title>
    
    
    <link rel="stylesheet" href="./css/navbar.css">
    <link rel="stylesheet" href="./css/mostrarusuarios.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/ventas.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>

    
</head>
<body>
    <?php include_once("./api/navbar.php") ?>
    <div class="main-container">
        <?php include("./api/sidebar.php") ?>
        <div class="content">
            <table id="myTable"class="table-products">
                <caption>Ventas</caption>
                <thead>
                    <tr>
                        <th scope="col"><a href="#" class="filtrar_ventas" onclick="filtrarVentas('todas')">Todas las Ventas</a></th>
                        <th scope="col"><a href="#" class="filtrar_ventas" onclick="filtrarVentas('activa')">Ventas Activas</a></th>
                        <th scope="col" ><a href="#" class="filtrar_ventas" onclick="filtrarVentas('completada')">Ventas Completadas</a></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            //defino estado de las ventas con las fechas
                            $estado = 'activa';
                            if ($row['fechaEnvio'] != '0000-00-00' && $row['fechaEntrega'] == '0000-00-00') {
                                $estado = 'activa';
                            }
                            elseif($row['fechaEnvio'] != '0000-00-00' && $row['fechaEntrega'] != '0000-00-00'){
                                $estado = 'completada';
                            }
                            else{
                                $estado = 'activa';
                            }
                            echo "<tr data-id='" . $row["IdVenta"] . "' class='venta-".$estado."'>";
                                echo "<td class='col1' data-label='ID'>". "<p id='id_venta'>#" . $row["IdVenta"]."</p>" ."</br> ". "<p id='valor_total'>Valor Total $" . $row["preciototal"]."</p>"."</br>".
                                "Fecha de Venta: " .$row["fechaVenta"]."</br>"."<div class='fecha-envio'>Fecha de envío: " .($row["fechaEnvio"] == '0000-00-00' ? 'Sin enviar' : $row["fechaEnvio"])."</div>". 
                                "<div class='fecha-entrega'>Fecha de entrega: " .($row["fechaEntrega"] == '0000-00-00' ? 'Sin entregar' : $row["fechaEntrega"])."</div>"."</td>";   
                                echo "<td data-label='Email'>"."<p id='email_comprador'>Email Comprador"."</p>" . $row["email"] . "</td>";

                                echo "<td data-label='Accion'><a href='detalleventa.php?id=" . $row["IdVenta"]."'id='crudM' class='boton_detalle' " . ">Ver Detalle</a></br>"; 
                                
                                if($row['fechaEnvio'] == "0000-00-00") {
                                    echo "<button id='boton_marcar' class='marcar-envio'>Marcar como enviado</button></br>";
                                }
                                if($row['fechaEnvio'] != "0000-00-00") {
                                    echo"<button id='boton_marcar' class='marcar-no-enviado'>Marcar como no enviado</button></br>";
                                }
                                if($row['fechaEntrega'] == "0000-00-00") {
                                    echo "<button id='boton_marcar' class='marcar-recibido'>Marcar como recibido</button></br>";
                                }
                                if($row['fechaEntrega'] != "0000-00-00") {
                                    echo "<button id='boton_marcar' class='marcar-no-recibido'>Marcar como no recibido</button></br>";
                                }
                                    
                            echo "</td></tr>";
                        }
                    } else {
                        echo "<tr><td colspan='3'>NO HAY REGISTROS</td></tr>";
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </div>
    <script src="navbar.js"></script>
    <script src="ventas.js"></script>

    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script> -->
</body>
</html>