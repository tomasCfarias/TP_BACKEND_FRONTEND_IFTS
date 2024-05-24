<?php

session_start();

if(!isset($_SESSION['login_user'])){ //if login in session is not set
    header("Location: login.php");
}

include("./api/connection.php");
$conn = conexion();

$sql = "SELECT * FROM proveedores";
$result = $conn -> query($sql);


?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/proveedores.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.css">
    <link rel="stylesheet" href="./css/mostrarusuarios.css">
    <link rel="stylesheet" href="./css/navbar.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
    <script type="text/javascript">
        function confirmar(){
            return confirm("Estas seguro?. Se eliminara el provedor");
        }
    </script>
    <title>Proveedores</title>
</head>
<body>

    <?php
        include_once("./api/navbar.php")
    ?>
    <div class="main-container">
    <?php
        include_once("./api/sidebar.php")
    ?>
    <div class="content">
    <div>
        <div class="titular m-1" >
            <h3>Proveedores</h3>
            <a type="button" class="btn btn-success" href="formProveedor.php">Agregar proveedor</a>
        </div>

        
       

        <table id="myTable" class="table-proveedores">
        
            <thead>
                
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Email</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Modificar</th>
                    <th scope="col">Accion</th>
                    <th scope="col">Borrar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if($result -> num_rows > 0){
                    while ($row = $result->fetch_assoc()){

                        echo "<tr>";
                        echo "<td scope='row' data-label='ID'>" . $row["id"] . " "."</td>";
                        echo "<td data-label='Nombre'>" . $row["Nombre"] ." ". "</td>";
                        echo "<td data-label='Email'>" . $row["Email"] . " "."</td>";
                        echo "<td data-label='Telefono'>" . $row["Telefono"] . " "."</td>";
                        echo "<td data-label='Modificar'><a href=modificarProveedor.php?id=" . $row['id'] . " ' id = 'modificarProveedor'><svg xmlns='http://www.w3.org/2000/svg' height='24px' viewBox='0 -960 960 960' width='24px' fill='#5f6368'><path d='M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm640-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z'/></svg></a></td>";
                        echo "<td data-label='Accion'><a href=pedido.php?id=".$row['id']." id = pedidoProveedor>Pedido</a></td>";
                        echo  "<td data-label='Borrar'><a  href=borrarProveedor.php?id="  . $row['id'] . "  ' id = 'borrarProveedor' onclick='return confirmar()'><svg xmlns='http://www.w3.org/2000/svg' height='24px' viewBox='0 -960 960 960' width='24px' fill='#5f6368'><path d='M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z'/></svg></a></td>";
                        
                    }   
                } else {
                    echo "NO HAY REGISTROS";
                }
                ?>
            </tbody>


            

        </table>


       

    </div>
    
    <script src="navbar.js"></script>
    <script src="confirmacion.js"></script>
    <script src="./api/LoadNotification.js"></script>
</body>

</html>