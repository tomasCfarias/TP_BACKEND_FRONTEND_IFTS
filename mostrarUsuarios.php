<?php
    include("./api/connection.php");

    if(!isset($_SESSION['login_user'])){ //if login in session is not set
    header("Location: login.php");
    }
    
    $conn = conexion();

    $sql = "SELECT * FROM usuarios";
    $result = $conn -> query($sql);

    $conn ->close();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Usuarios</title>
</head>
<link rel="stylesheet" href="./css/mostrarusuarios.css">
<link rel="stylesheet" href="./css/navbar.css">
<body>
    <!-- <?php
        include_once("./api/navbar.php")
    ?> -->

    <div class="main-container">
    <!-- <?php
    include("./api/sidebar.php")    
    ?> -->
    <div class="content">
    <table class="table-products">
        <caption>Usuarios</caption>
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Email</th>
                <th scope="col">Usuario</th>
            <th scope="col">Accion</th>
            <th scope="col">Accion</th>
        </tr>
    </thead>
    <tbody>
    <?php

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td data-label='ID'>" . $row["id"] . " "."</td>";
        echo "<td data-label='Email'>" . $row["email"] ." ". "</td>";
        echo "<td data-label='Usuario'>" . $row["username"] . " "."</td>";
        echo "<td data-label='Accion'><a href='modificarUsuarios.php?id=" . $row['id'] . "'id='crudM'>MODIFICAR</a></td>";
        echo "<td data-label='Accion'><a href='borrarUsuarios.php?id=" . $row['id'] . "'id='crudBorrar'>BORRAR</a></td>";
        echo "</tr>";
    }
} else {
    echo "NO HAY REGISTROS";
}
?>
        </tbody>
    </table>
    <button class="button" id="pdfout"><a href="pdfoutput.php?type=user">Exportar a pdf</a></button>
    <button class="button" id="excelout" onclick="exportarAExcel()">Exportar a excel</button>
    </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/@linways/table-to-excel@1.0.4/dist/tableToExcel.min.js"></script>
    <script type="text/javascript">
        
        const exportarAExcel = () => {
            var table = document.getElementsByClassName("table-products")[0]
            TableToExcel.convert(table, {
                name: "usuarios.xlsx",
                sheet: {
                    name: "Sheet 1"
                }
            })
        }
    </script>
</body>
</html>