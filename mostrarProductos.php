<?php
    include("./api/connection.php");

    session_start();
    if(!isset($_SESSION['login_user'])){ //if login in session is not set
    header("Location: login.php");
    }
    
    $conn = conexion();

    $sql = "SELECT * FROM productos";
    $result = $conn -> query($sql);

    $conn ->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap');
    </style>
    <title>Mostrar Usuarios</title>
</head>
<link rel="stylesheet" href="./css/mostrarusuarios.css">
<link rel="stylesheet" href="./css/navbar.css">
<body>
    <?php
        include_once("./api/navbar.php")
    ?>
    <div class="main-container">
    <?php
        include_once("./api/sidebar.php")
    ?>
    <div class="content">
    <table class="table-products">
        <caption>Productos</caption>
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Precio</th>
            <th scope="col">Descripción</th>
            <th scope="col">Estado</th>
            <th scope="col">Accion</th>
            <th scope="col">Accion</th>
        </tr>
    </thead>
    <tbody>
        <?php

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {

        if ($row["estado"] == 0) {
            $estado = "Activo";
        } else { 
            $estado = "Inactivo";
        }

        echo "<tr>";
        echo "<td scope='row' data-label='ID'>" . $row["Id"] . " "."</td>";
        echo "<td data-label='Nombre'>" . $row["Name"] ." ". "</td>";
        echo "<td data-label='Cantidad'>" . $row["quantity"] . " "."</td>";
        echo "<td data-label='Precio'>" . $row["price"] ." ". "</td>";
        echo "<td data-label='Descripción'>" . $row["description"] ." ". "</td>";
        echo "<td data-label='Estado'>" . $estado ."</td>";
        echo "<td data-label='Accion'><a href='modificarProducto.php?id=" . $row['Id'] . "' id = 'crudM'>MODIFICAR</a></td>";

        if ($estado == "Activo") {
            echo "<td data-label='Accion'><a href='borrarProducto.php?estado=1&id=" . $row['Id'] . "'id='crudBorrar'>Pausar</a></td>";
        } 
        else if ($estado == "Inactivo") {
            echo "<td data-label='Accion'><a href='borrarProducto.php?estado=0&id=" . $row['Id'] . "'id='crudActivar'>Activar</a></td>";
        } 
        echo "</tr>";
    }
} else {
    echo "NO HAY REGISTROS";
}
?>  
        </tbody>
    </table>
    <a class="button" href="subirProducto.php">Nuevo Articulo</a>
    <button class="button" id="pdfout"><a href="pdfoutput.php?type=products">Exportar a pdf</a></button>
    <button class="button" id="excelout" onclick="exportarAExcel()">Exportar a excel</button>
    </div>
    </div>
   
    <script src="navbar.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js" integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/@linways/table-to-excel@1.0.4/dist/tableToExcel.min.js"></script>
    <script type="text/javascript">

        const exportarAExcel = () => {
            var table = document.getElementsByClassName("table-products")[0]
            TableToExcel.convert(table, {
                name: "productos.xlsx",
                sheet: {
                    name: "Sheet 1"
                }
            })
        }


    

    </script>
</body>
</html>