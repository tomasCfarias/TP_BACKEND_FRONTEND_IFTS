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
    <link rel="stylesheet" href="./css/mostrarusuarios.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/proveedores.css">
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

            <a type="button" class="btn btn-success" href="consultar.php">Consultar</a>
        </div>

        
       

        <table class="table-proveedores">
        
            <thead>
                
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Email</th>
                    <th scope="col">Telefono</th>
                    <!--<th scope="col">Consulta-->
                    <th scope="col">Modificar</th>
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
                        //echo "<td data-label='Consulta'><a type='button' href=consultar.php>Consultar</a></td>";
                        echo "<td data-label='Modificar'><a href=modificarProveedor.php?id=" . $row['id'] . " ' id = 'modificarProveedor'>Modificar</a></td>";
                        echo  "<td data-label='Borrar'><a  href=borrarProveedor.php?id="  . $row['id'] . "  ' id = 'borrarProveedor' onclick='return confirmar()'>Borrar</a></td>";
                        
                    }   
                } else {
                    echo "NO HAY REGISTROS";
                }
                ?>
            </tbody>


            

        </table>


        <!-- Editar producto 
        <div class="modal fade" id="editProduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editProductLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="editProductLabel">Editar producto</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="edit_form">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Nombre</span>
                                    <input type="text" id="edit_name" class="form-control" onkeyup="prueba()" placeholder="Nombre del producto" aria-label="nombre del producto" aria-describedby="basic-addon1">
                                </div>
                                <p id="editName_error" class="text-danger text-center" style="display: none;">El nombre
                                    del producto debe tener entre 3 o 20 caracteres.</p>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">SN</span>
                                    <input type="text" id="edit_sn" class="form-control" placeholder="Número de serie" aria-label="número de serie" aria-describedby="basic-addon1">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Cantidad</span>
                                    <input type="number" id="edit_cant" class="form-control" placeholder="Cantidad" aria-label="cantidad" aria-describedby="basic-addon1">
                                </div>
                                <select class="form-select mb-3" id="edit_mot">
                                    <option value="" selected disabled> Selecione motivo</option>
                                    <option value="Transferencia">Transferencia</option>
                                    <option value="Corrección de producto">Correcciones varias</option>
                                    <option value="Corrección de nombre">Corrección de nombre</option>
                                    <option value="Corrección de sn">Corrección de sn</option>
                                    <option value="Corrección de cantidad">Corrección de cantidad</option>
                                    <option value="Producto no existente">Producto no existente</option>
                                </select>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning" data-bs-dismiss="modal" onclick="editProduct()">Editar</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                </div>
            </div>
        </div>-->

    </div>

    <script src="confirmacion.js"></script>
    <script src="https://kit.fontawesome.com/ce1f10009b.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="editarProveedor.js"></script>
</body>

</html>