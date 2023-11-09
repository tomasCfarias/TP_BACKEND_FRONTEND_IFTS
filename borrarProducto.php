<?php
    include("./api/connection.php");
    $conn = conexion();

    session_start();
    if(!isset($_SESSION['login_user'])){ //if login in session is not set
    header("Location: login.php");
    }

        if(isset($_GET["id"])) {
            $numero = $_GET["id"];
            $estado = intval($_GET["estado"]);
            $sql = "UPDATE productos SET estado = $estado WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $numero);

            if ($stmt->execute()) {
                header("Location: mostrarProductos.php");
                exit();
            } else {
                echo "Error al borrar el registro: " . $stmt->error;
            }
            $stmt->close();
        }
    $conn ->close();
?>
