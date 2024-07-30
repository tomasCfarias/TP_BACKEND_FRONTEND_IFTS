<?php

    include("../api/connection.php");
    $conn = conexion();

    session_start();
    if(!isset($_SESSION['login_user'])){ //if login in session is not set
    header("Location: login.php");
    }



    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'vendor/autoload.php';

    $mail = new PHPMailer(true);

    $nombre = $_POST['name'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $mensaje = $_POST['mensaje'];   
    $id = $_POST["id"];

    try{


        //$mail -> SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail -> Host = 'smtp.gmail.com';
        $mail -> SMTPAuth = true;
        $mail -> Username = 'ianbruzzese@gmail.com';
        $mail -> Password = "gpbj gjfo pfhv feiy";
        $mail -> SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail ->setFrom($email, $nombre);
        $mail -> addAddress('ianbruzzese@gmail.com', ' Soporte Eshop');

        $mail -> isHTML(true);
        $mail -> Subject =  $nombre.  ' Quiere comunicarse con vos! ';
        //$mail -> Body = 'Prueba de email desde el body';
        $mail -> Body = '<br>Id Usuario: '.$id.' <br>Email: ' . $email . '<br>Teléfono: ' . $telefono . '<br>' . $mensaje;
        $mail -> send();

        //echo 'Correo enviado';
        echo '<script type="text/javascript">
        alert("El formulario ha sido enviado con exito!. Nos contactaremos a la brevedad.");
        window.location.href="../articulos.php"
        </script>';


        $sql = "INSERT INTO contacto (nombre,email,telefono,mensaje) VALUES ('$nombre','$email','$telefono','$mensaje')";
        $guardando = $conn ->query($sql);

        $conn->close();

    } catch (Exception $e){
        echo 'Mensaje '. $mail -> ErrorInfo;
    }

?>  
