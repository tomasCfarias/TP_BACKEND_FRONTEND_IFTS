<?php
    include("./api/connection.php");
    $conn = conexion();

    session_start();
    if(!isset($_SESSION['login_user'])){ //if login in session is not set
    header("Location: login.php");
    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $id = $_POST["id"];
        $nombre = $_POST["nombre"];
        $email = $_POST["email"];
        $telefono = $_POST["telefono"];

        $sql = "UPDATE proveedores SET Nombre = ?, Email = ?, Telefono = ? WHERE id = ?";

        $stmt = $conn -> prepare($sql);

        $stmt->bind_param('ssss', $nombre, $email, $telefono, $id);

        if ($stmt->execute()) {
            //header("Location: proveedores.php");
            echo '<script type="text/javascript">
            alert("El proveedor ha sido modificado con exito!.");
            window.location.href="./proveedores.php"
            </script>';
            exit();
        } else {
            echo "Error en la actualización: " . $stmt->error;
        }

    }

$numero = $_GET["id"];
$sql = "SELECT * FROM proveedores WHERE id = '$numero'";
$result = $conn->query($sql);
$row = mysqli_fetch_array($result);

$conn->close();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Proveedor</title>
    <link rel="stylesheet" href="./css/login.css">
    <link rel="stylesheet" href="css/navbar.css">
</head>
<body>
    <?php
    include_once("./api/navbar.php")
    ?>
    <div class="main-container">
    
    <?php include_once("./api/sidebar.php") ?>

    <form action="modificarProveedor.php" method="POST" Id="user_form">
        <h2>Modificación de Proveedor</h2>

        <input type="hidden" name="id" value="<?= $row['id'] ?>">

        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" value="<?= $row['Nombre'] ?>">
        <label for="nombre">Email</label>
        <input type="text" name="email" id="email" value="<?= $row['Email'] ?>">
        <label for="nombre">Telefono</label>
        <input type="number" name="telefono" id="telefono" value="<?= $row['Telefono'] ?>">

        <input id="user_form_btn" type="submit" value="Modificar"/>


    </form>

</body>
</html>