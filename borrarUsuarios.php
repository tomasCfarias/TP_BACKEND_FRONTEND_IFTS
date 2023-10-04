<?php
    include("./api/connection.php");
    $conn = conexion();

    session_start();
    if(!isset($_SESSION['login_user'])){ //if login in session is not set
    header("Location: login.php");
    }

        if(isset($_GET["id"])) {
            $numero = $_GET["id"];
            $sqlSelect = "SELECT * FROM usuarios WHERE id = $numero";
            $result = $conn->query($sqlSelect);

            if ($result->num_rows > 0) {
                $sql = "DELETE FROM usuarios WHERE id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $numero);
            }
            if ($stmt->execute()) {
                header("Location: mostrarUsuarios.php");
                exit();
            } else {
                echo "Error al borrar el registro: " . $stmt->error;
            }
            $stmt->close();
        }
    $conn ->close();
?>
