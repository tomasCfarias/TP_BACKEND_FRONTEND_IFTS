<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP LOGIN</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
</head>
<body>
    <?php
        include("api/navbartiendatailwind.php");
        include("api/connection.php");
        $conn = conexion();
        session_start();
    ?>
    
    
  <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Log In</h2>
  </div>

  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
    <form class="space-y-6" action="login-tienda.php" method="POST">
    <?php 
      //Check email format
      if($_SERVER["REQUEST_METHOD"] == "POST") {
      $myemail = $_POST['email'];
      $mypassword = $_POST['password'];    
      
      if (!filter_var($myemail, FILTER_VALIDATE_EMAIL)) {
          ?>
          <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Error!</strong>
            <span class="block sm:inline">Formato de email invalido.</span>
          </div> 
      
<?php
 }
      
      else {

          $sql = "SELECT id, password FROM usuarios WHERE email = '$myemail'";
          $result = $conn -> query($sql);
          $row = mysqli_fetch_array($result);
         
          if (is_array($row)) {
              if (password_verify($mypassword,$row[1])) {
                  $_SESSION["login_user_tienda"] = $myemail;
                  $_SESSION["userid_tienda"] = $row[0];
                  header("location: articulos.php");
              }
             
          else {
              ?>
              <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Error!</strong>
            <span class="block sm:inline">Email o contraseña incorrecta.</span>
            </div> 
          <?php
          }
        }
      }
    }    
      ?>
      <div>
        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
        <div class="mt-2">
          <input id="email" name="email" type="email" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
      </div>
      <div>
        <div class="flex items-center justify-between">
          <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Contraseña</label>
          <div class="text-sm">
            <a href="#" class="font-semibold text-indigo-600 hover:text-indigo-500">Olvidaste tu constraseña?</a>
          </div>
        </div>
        <div class="mt-2">
          <input id="password" name="password" type="password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
      </div>

      <div>
        <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign in</button>
      </div>
    </form>

    <p class="mt-10 text-center text-sm text-gray-500">
      No tenés cuenta?
      <a href="signin-tienda.php" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Registrate</a>
    </p>
  </div>
</div>
    <?php
        include("api/footertienda.php") 
    ?>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
</body>
</html>

