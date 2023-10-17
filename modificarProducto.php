<?php
    include("./api/connection.php");
    $conn = conexion();

    session_start();
    if(!isset($_SESSION['login_user'])){ //if login in session is not set
    header("Location: login.php");
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") { // Verifica si el método del formulario es POST

        $id = $_POST["id"];
        $nombre = $_POST["nombre"];
        $precio = $_POST["precio"];
        $cantidad = $_POST["cantidad"];
        $descripcion = $_POST["descripcion"];
    
        
        $sql = "UPDATE productos SET Name = ?, quantity = ?, price = ?, description = ? WHERE id = ?";
    
        $stmt = $conn->prepare($sql);
    
        $stmt->bind_param("siisi", $nombre, $cantidad, $precio, $descripcion, $id);
    
 
        if ($stmt->execute()) {
            header("Location: mostrarProductos.php");
            exit();
        } else {
            echo "Error en la actualización: " . $stmt->error;
        }
    
        $stmt->close(); 
    }

$numero = $_GET["id"];
$sql = "SELECT * FROM productos WHERE id = '$numero'";
$result = $conn->query($sql);
$row = mysqli_fetch_array($result);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Usuario</title>
    <link rel="stylesheet" href="./css/login.css">
    <link rel="stylesheet" href="css/navbar.css">

</head>
<body>
    <?php
        include_once("./api/navbar.php")
    ?>
    <div class="main-container">

<?php include_once("./api/sidebar.php") ?>
        <form action="modificarProducto.php" method="POST" id="user_form">
        <h2>Modificación de Artículo:</h2>
        <label for="id">ID</label>
        <input type="hidden" name="id" value="<?= $row['Id'] ?>">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" value="<?= $row['Name'] ?>">
        <label for="precio">Precio</label>
        <input type="number" name="precio" id="precio" value="<?= $row['price'] ?>">
        <label for="cantidad">Cantidad</label>
        <input type="number" name="cantidad" id="cantidad" value="<?= $row['quantity'] ?>">
        <label for="descripcion">Descripción</label>
        <textarea name="descripcion" id="descripcion"><?= $row['description'] ?></textarea>

        <input id="user_form_btn" type="submit" value="Modificar"/>
    </form>
    </div>
    
    <script src="navbar.js"></script>

</body>
</html>


