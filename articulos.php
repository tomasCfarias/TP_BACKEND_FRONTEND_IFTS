<?php
    include("./api/connection.php");

    $conn = conexion();
    session_start();
    $sql = "SELECT * FROM productos";
    $result = $conn -> query($sql);

    $conn ->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />

</head>
<body>
    <?php
        include("api/navbartiendatailwind.php") 
    ?>
    <div class="flex">
    <div class="mt-2 mb-4 lg:w-44">
    <div class="hidden lg:block ml-2 border border-gray-200 bg-white rounded h-full shadow">Algo..</div>
    </div>
    <section class="my-2 ml-2 lg:ml-5  grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-2">
        <?php

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <div class="h-auto w-full max-w-xs bg-white border border-gray-200 rounded-lg shadow">
                        <img class="p-8 rounded-t-lg" src="img/boca.jfif" alt="product image" />
                        <div class="px-5 pb-5">
                        <h5 class="text-xl text-center sm:text-left font-semibold tracking-tight text-gray-900"><?php echo($row["Name"])?></h5>
                        <div class="flex items-center justify-between sm:flex-row lg: flex-col">
                        <span class="text-3xl font-bold text-gray-900 dark:text-white">$<?php echo($row["price"])?></span>
                        <a id="<?php echo($row["Id"])?>" name="product-card" class="text-white bg-blue-700 hover:cursor-pointer hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Ver más</a>
                        </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "NO HAY REGISTROS";
            }

        ?>
    </section>
    </div>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>

</body>
</html>
<script src="articulos.js"></script>