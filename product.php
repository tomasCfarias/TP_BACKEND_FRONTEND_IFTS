<?php 
include("./api/connection.php");
$conn = conexion();
$id = $_GET["id"];
session_start();
$query = "SELECT * FROM productos WHERE  Id = '$id' ";

$req =  mysqli_query($conn,$query);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Articulo</title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
    </head>
    <header>
        <?php
            include("api/navbartiendatailwind.php") 
        ?>
    </header>
    <body>
        <div class="ml-2 lg:ml-8 flex md:flex-row lg: flex-col">
        <?php
            $res = $req->fetch_array();
            ?>
            <img class="border p-8 rounded-t-lg h-auto w-full max-w-lg" src="img/boca.jfif" alt="product image" />
            <?php
            
            echo("<div class='flex flex-col lg:ml-14'>");
            echo "<p class='font-bold text-4xl'> " . $res["Name"] . " "."</p>";
            echo "<p class='text-xl font-semibold '> $" . $res["price"] ." ". "</p>";
            echo'<p class="mb-3 text-xl md:w-6/12 text-gray-500 md:mt-5">'. $res["description"] .'</p>';
        ?>
            

        <form id="carrito" class="mt-auto">
            <p> <span class='font-semibold mt-auto'>Stock</span>: <?php echo $res["quantity"] ?> </p>
            <input class= "rounded invalid:bg-red-200" id="stock" type="number" name="quantity" value="1" min="1" max="<?=$res['quantity']?>" placeholder="Quantity" required>
            <input type="hidden" name="id" value="<?=$res['Id']?>">
            <input type="hidden" name="price" value="<?=$res['price']?>">
            <input type="hidden" name="product_name" value="<?=$res['Name']?>">
            <button type="submit" id="add-btn" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 focus:outline-none disabled:opacity-25" <?php if(empty($_SESSION["login_user_tienda"])) {?> disabled <?php } ?>>Agregar a carrito</button>
        </form>
        </div>
        </div>
        <?php include("api/footertienda.php")?>
        <script src="acarrito.js"></script>
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
</body>
</html>
