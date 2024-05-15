<?php 
    session_start();
    include("api/connection.php");
    if(!isset($_SESSION['login_user_tienda'])){ //if login in session is not set
      header("Location: login-tienda.php");
      }  
      
    if($_SERVER["REQUEST_METHOD"] == "POST") {

      if(isset($_POST["id"])) {
        $id = $_POST["id"];
        unset($_SESSION["cart_list"]["$id"]);
      } 


      if(!isset($_POST["id"])) {
        //Crea conexion y crea entrada en la tabla de ventas
        $conn = conexion();
        $id = $_SESSION['userid_tienda'];
        $sql = "INSERT INTO ventas (idCliente,fechaEntrega,fechaEnvio) VALUES ('$id','0000-00-00','0000-00-00')";

        //Selecciona el ID de la ultima venta creada para usarlo en el detalle de ventas
        $result = $conn -> query($sql);
        $sql = "SELECT idVenta FROM ventas ORDER BY idVenta DESC";
        $result = $conn -> query($sql);
        $id_venta = mysqli_fetch_column($result);

        $total_price = 0;
        foreach($_SESSION["cart_list"] as $val) {

          //Calcula precio total de la compra
          $price = $val[2] * $val[3];
          $total_price+= $price;

          //Inserta cada uno de los productos en la tabla detalleventas
          $id_producto = $val[0];
          $cantidad = $val[2];
          $sql = "INSERT INTO detalleventas (idVenta,idProducto,cantidad) VALUES ('$id_venta','$id_producto','$cantidad')";
          $result = $conn -> query($sql);

          //Disminuye el stock de cada uno de los productos
          $sql = "UPDATE productos SET quantity = quantity - '$cantidad' WHERE Id = $id_producto";
          $result = $conn -> query($sql);

        }
          //Agrega el precio total a la tabla ventas
          $sql = "UPDATE ventas SET preciototal = $total_price WHERE idVenta = $id_venta";
          $result = $conn -> query($sql);



        //Vacía el carrito de compra
        $_SESSION["cart_list"] = [];
      }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />


</head>
<body>
    <div class="min-h-screen">
    <?php 
    include_once("api/navbartiendatailwind.php");
    ?>
    <div class="ml-8 mr-8 border rounded">
     
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
      if(!isset($_POST["id"])) {

      echo '<div class=" bg-green-100 border border-green-400 text-green-700 mx-4 my-2 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Listo!</strong>
            <span class="block sm:inline">Gracias por tu compra.</span>
        </div>';
      }
    }
    if(empty($_SESSION["cart_list"])) {
        echo("<p class='p-5 font-medium'>No hay elementos en el carrito..</p>");
      }
      else {
        $total_price = 0;
        foreach($_SESSION["cart_list"] as $val) { 
             echo("<li class='block px-4 py-2'>");
             echo('<div class="flex gap-1 items-center">');
             echo("<p>". $val[1] ." </p>");
             $price = $val[2] * $val[3];
             echo(" <div class='font-semibold'> x".$val[2]."</div>");
             echo("<div class='ml-auto font-medium'> $". $price ."</div>");
             ?>
             <form method="POST" action="checkout.php">
             <input type="hidden" name="id" value="<?=$val['0']?>">
             <?php
             echo('<button class=" ml-2 text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-blue-300 font-normal rounded-lg text-xs px-1.5 py-0.5 mr-1 mb-1 focus:outline-none hover:cursor-pointer" type="submit" name="eliminar">Eliminar</button>
             ');
             echo("</form>");
             echo("</div>");
             echo("</li>"); 
             $total_price+= $val[2]*$val[3];
        }
        echo("<li class='flex block font-semibold px-4 py-2'> Total: <span class='ml-auto'>$".$total_price."</span></li>");
        ?>
        <form method="POST" action="checkout.php">
        <button class=" ml-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 focus:outline-none hover:cursor-pointer" type="submit" >Comprar</button>
        </form>
        <?php
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