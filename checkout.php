<?php 
    session_start();
    if($_SERVER["REQUEST_METHOD"] == "POST") {
      $id = $_POST["id"];
      unset($_SESSION["cart_list"]["$id"]);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />


</head>
<body>
    <div class="min-h-screen">
    <?php 
    include_once("api/navbartiendatailwind.php");
    ?>
    <div class="ml-8 mr-8 border rounded">
    <?php
    if(empty($_SESSION["cart_list"])) {
        echo("<p>Vacio</p>");
      }
      else {
        $total_price = 0;
        foreach($_SESSION["cart_list"] as $val) { 
             echo("<li class='block px-4 py-2'>");
             echo('<div class="flex gap-1 items-center">');
             echo("<p>". $val[1] ." </p>");
             $price = $val[2] * $val[3];
             echo(" <div class='font-bold'> x".$val[2]."</div>");
             echo("<div class='ml-auto font-bold'> $". $price ."</div>");
             ?>
             <form method="POST" action="checkout.php">
             <input type="hidden" name="id" value="<?=$val['0']?>">
             <?php
             echo('<button class=" ml-2 text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-xs px-1.5 py-0.5 mr-1 mb-1 focus:outline-none hover:cursor-pointer" type="submit" name="eliminar">Eliminar</button>
             ');
             echo("</form>");
             echo("</div>");
             echo("</li>"); 
             $total_price+= $val[2]*$val[3];
        }
        echo("<li class='flex block font-bold px-4 py-2'> Total: <span class='ml-auto'>$".$total_price."</span></li>");
        echo('<input class=" ml-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 focus:outline-none hover:cursor-pointer" type="button" value="Comprar">');
       }
      ?>
    </div>
    <?php
        include("api/footertienda.php") 
    ?>
    </div>
      <script src="https://cdn.tailwindcss.com"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
</body>
</html>