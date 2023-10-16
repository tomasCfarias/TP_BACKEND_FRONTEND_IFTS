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
    <table class="table-products">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Cantidad</th>
                <th>Precio</th>
            <th>Descripción</th>
        </tr>
    </thead>
    <tbody>
        <?php

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["Id"] . " "."</td>";
        echo "<td>" . $row["Name"] ." ". "</td>";
        echo "<td>" . $row["quantity"] . " "."</td>";
        echo "<td>" . $row["price"] ." ". "</td>";
        echo "<td>" . $row["description"] ." ". "</td>";
        echo "<td><a href='modificarProducto.php?id=" . $row['Id'] . "' id = 'crudM'>MODIFICAR</a></td>";
        echo "<td><a href='borrarProducto.php?id=" . $row['Id'] . "'id='crudBorrar'>BORRAR</a></td>";
        echo "</tr>";
    }
} else {
    echo "NO HAY REGISTROS";
}
?>  
        </tbody>
    </table>
    <a class="button" href="subirProducto.php">Nuevo Articulo</a>
    <button class="button" id="pdfout" onclick="generarPDF()">Exportar a pdf</button>
    <button class="button" id="excelout" onclick="exportarAExcel()">Exportar a excel</button>
    <?php
        include_once("./api/footer.php")
    ?>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js" integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/@linways/table-to-excel@1.0.4/dist/tableToExcel.min.js"></script>
    <script type="text/javascript">

        const generarPDF = () => {

            window.jsPDF = window.jspdf.jsPDF;

            var doc = new jsPDF("l","px","a4");
            var table = document.getElementsByClassName("table-products")[0]

            doc.html(table, {
                callback: (doc) => {
                    doc.save("table.pdf")
                }
            })
        }

        const exportarAExcel = () => {
            var table = document.getElementsByClassName("table-products")[0]
            console.log(table)
            TableToExcel.convert(table, {
                name: "products.xlsx",
                sheet: {
                    name: "Sheet 1"
                }
            })
        }


    

    </script>
</body>
</html>