<?php

    include("./api/connection.php");
    $conn = conexion();

    session_start();
    if(!isset($_SESSION['login_user'])){ //if login in session is not set
    header("Location: login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../images/favicon.png">
    <link rel="stylesheet" href="./css/contacto.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Contacto</title>
</head>
<body>
    
    <section class="cardContact" >
        
        <h1 class="title">Contáctenos</h1>

            
        
        <div class="contact-wrapper">
            <div class="contact-form">
                <form id="formContacto" method="post" action="./email/index.php">
                    
                    <input type="hidden" name="id" value="<?= $_SESSION["userid_tienda"] ?>"><br>
                    <div class="mb-3">

                        <label for="fullname" class="form-label">Nombre:</label>
                        <input type="text" name="name" class="form-control" id="fullname" placeholder="Ingrese su nombre" required value="<?php if (isset($nombre))
                                                                                                                                                echo $nombre ?>">
                    </div>


                    <div class="mb-3">

                        <label for="email" class="form-label">Email:</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Ingrese su email" required value="<?php if (isset($email))
                                                                                                                                            echo $email ?>">
                    </div>

                    <div class="mb-3">

                        <label for="telefono" class="form-label">Teléfono:</label>
                        <input type="number" name="telefono" class="form-control" pattern="[0-9] {10}" title="Solo se podran colocar 10 digitos" id="telefono" placeholder="Ingrese su telefono" required value="<?php if (isset($tel))
                                                                                                                                                                                                                    echo $tel ?>">
                    </div>


                    <div class="mb-3">

                        <label for="mensaje" class="form-label">Mensaje:</label>
                        <textarea class="form-control" placeholder="Ingrese su mensaje" name="mensaje" id="mensaje" required></textarea>

                    </div>


                    <p class="botones">
                        <button class="btn btn-success m-2" type="submit" name="submit">Enviar</button>

                        <a type="button" class="btn btn-light m-2" style=" text-align: center;" href="articulos.php"> Volver</a>
                    </p>
                    <?php
                    //include("validar1.php"); PASAR CONTACTO.PHP A LA CARPETA DEL MAILER PARA TRABAJAR MAS FACIL Y VER SI X LO MENOS SE ENVIAN LOS MENSAJE

                    ?>
                </form>
            </div>

        </div>
    </section>

    <script src="https://kit.fontawesome.com/ce1f10009b.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>


</body>
</html>