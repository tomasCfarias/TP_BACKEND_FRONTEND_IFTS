<?php
    include("./api/connection.php");
    $conn = conexion();
    session_start();
    if(!isset($_SESSION['login_user_tienda'])){ //if login in session is not set
      header("Location: login-tienda.php");
      }
      
      
    if ($_GET["user"] != $_SESSION["userid_tienda"])  {
      header("Location: articulos.php");
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />


</head>
<body>
    <div class="min-h-screen">

    <?php 
    include_once("api/navbartiendatailwind.php");
    ?>

    <div class="ml-8 mr-8">
            <div class="p-4 font-medium text-xl">
                <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
    <form class="space-y-6" action="settingsuser.php?user=<?=$_SESSION['userid_tienda']?>" method="POST"> 

    <?php
    
    //Check email format
    if($_SERVER["REQUEST_METHOD"] == "POST") {
    $myemail = $_POST['email'];
    $mypassword = $_POST['password'];
    $newpassword = $_POST['password_n'];
    $hash = password_hash($newpassword, PASSWORD_DEFAULT );
    $myusername = $_POST["usuario"];
    $id = $_SESSION["userid_tienda"];
    
    $sql = "SELECT password FROM usuarios WHERE id = '$id'";
    $result = $conn -> query($sql);
    $row = mysqli_fetch_array($result);
         
    //Check if email already in db
    $sql = "SELECT * from usuarios WHERE email= '$myemail'";
    $result = $conn -> query($sql);
    $row2 = mysqli_fetch_array($result);
    if (is_array($row2)) {
            ?>
          <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Error!</strong>
            <span class="block sm:inline">El email ya esta registrado.</span>
          </div>  
          <?php
        }
    elseif (!filter_var($myemail, FILTER_VALIDATE_EMAIL) || preg_match("/[^a-zA-Z0-9]+/",$myusername)) {

        ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
          <strong class="font-bold">Error!</strong>
          <span class="block sm:inline">Formato de email o nombre invalido.</span>
        </div>  
        <?php
    }
    elseif (is_array($row) && !password_verify($mypassword,$row[0])) {
       ?> 
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
          <strong class="font-bold">Error!</strong>
          <span class="block sm:inline">Tu contraseña actual es incorrecta.</span>
        </div>
       <?php

    }
    else {

        $sql = "UPDATE usuarios SET email = '$myemail', username = '$myusername', password = '$hash' WHERE id = '$id'";
        
        if ($conn->query($sql) === TRUE) {

            ?>
            <div class=" bg-green-100 border border-green-400 text-green-700 my-2 px-4 py-3 rounded relative" role="alert">
        <strong class="font-medium">Listo!</strong>
        <span class="block sm:inline">Tus datos fueron actualizados.</span>
            </div> 
        <?php
        } 
        $conn->close();
    }

 }
  ?>    

    <h1>Modificar</h1> 
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-2"> 
      <div>
        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Nuevo email</label>
        <div class="mt-2">
          <input id="email" name="email" type="email" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
      </div>
      <div>
        <label for="usuario" class="block text-sm font-medium leading-6 text-gray-900">Nuevo usuario</label>
        <div class="mt-2">
          <input id="usuario" name="usuario" type="usuario" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
      </div>
      <div>
        <div class="flex items-center justify-between">
          <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Contraseña actual</label>
        </div>
        <div class="mt-2">
          <input id="password" name="password" type="password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
      </div>

      <div>
        <div class="flex items-center justify-between">
          <label for="password_n" class="block text-sm font-medium leading-6 text-gray-900">Nueva Contraseña</label>
        </div>
        <div class="mt-2">
          <input id="password_n" name="password_n" type="password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
      </div>
</div>  
      <div>
        <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Actualizar</button>
      </div>
    </form>
        </div>
            </div>
        </div>
    </div>
    <?php
        include("api/footertienda.php") 
    ?>
    </div>
      <script src="https://cdn.tailwindcss.com"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
</body>
</html>