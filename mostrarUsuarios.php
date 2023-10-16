<?php
    include("./api/connection.php");

    session_start();
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
    <?php
        include_once("./api/navbar.php")
    ?>
    <table class="table-products">
        <tr>
            <th>ID</th>
            <th>EMAIL</th>
            <th>USUARIO</th>
            
        </tr>
   
        <?php

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . " "."</td>";
                echo "<td>" . $row["email"] ." ". "</td>";
                echo "<td>" . $row["username"] . " "."</td>";
                echo "<td><a href='modificarUsuarios.php?id=" . $row['id'] . "'>MODIFICAR</a></td>";
                echo "<td><a href='borrarUsuarios.php?id=" . $row['id'] . "'>BORRAR</a></td>";
                echo "</tr>";
            }
        } else {
            echo "NO HAY REGISTROS";
        }
        ?>
    </table>
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
                    doc.save("usuarios.pdf")
                }
            })
        }

        const exportarAExcel = () => {
            var table = document.getElementsByClassName("table-products")[0]
            console.log(table)
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