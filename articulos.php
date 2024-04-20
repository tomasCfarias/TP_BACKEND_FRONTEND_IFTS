<?php
    include("./api/connection.php");

    $conn = conexion();
    session_start();

    
    $pagenumber = empty($_GET["page"]) ? 1 : $_GET["page"];
    $cantidad_por_pagina = 8;
    $offset = $cantidad_por_pagina * $pagenumber == $cantidad_por_pagina ? 0 : $cantidad_por_pagina * ($pagenumber - 1);
    if (empty($_GET["q"])) {
        $total = "SELECT * FROM productos WHERE estado = 0";  
        $sql = "SELECT * FROM productos WHERE estado = 0 LIMIT $offset,$cantidad_por_pagina";
        if (isset($_GET["categoria"])) {
            $categoria = $_GET["categoria"];
            $sql = "SELECT * FROM productos WHERE estado = 0 AND Categoría = '$categoria' LIMIT $offset,$cantidad_por_pagina";

        };
    }
    else {
        $param = $_GET["q"];
        $total = "SELECT * FROM productos WHERE estado = 0 AND Name LIKE '%$param%'";  
        $sql = "SELECT * FROM productos WHERE estado = 0 AND Name LIKE '%$param%' LIMIT $offset,$cantidad_por_pagina";
        if (isset($_GET["categoria"])) {
            $categoria = $_GET["categoria"];
            $total = "SELECT * FROM productos WHERE estado = 0 AND Name LIKE '%$param%' AND Categoría = '$categoria'";
            $sql = "SELECT * FROM productos WHERE estado = 0 AND Name LIKE '%$param%' AND Categoría = '$categoria' LIMIT $offset,$cantidad_por_pagina";
        }
    }
        $result = $conn -> query($sql);

        $res = mysqli_query($conn, $total);  
        $number_of_result = mysqli_num_rows($res);  
        $number_of_pages = ceil($number_of_result / $cantidad_por_pagina); 

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
    <div class="my-2 lg:w-44">
    <div class="hidden lg:block ml-2 lg:ml-3 p-3 border border-gray-200 bg-white rounded h-full shadow">
        <b>Filtros</b>
            <form id = "filter_form">
                <ul>
                    <li><input type="radio" class="mr-1" name="categoria" value="1">Remeras</li>
                    <li><input type="radio" class="mr-1" name="categoria" value="2">Pantalones</li>
                    <li><input type="radio" class="mr-1" name="categoria" value="3">Camperas</li>
                    <button id="form_btn" class="text-white bg-blue-700 hover:cursor-pointer hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg my-2 text-sm px-5 py-1 text-center" value="Filtrar">Filtrar</button>
                </ul>
            </form>
        
        <!--    
            <label for="precio">Precio maximo</label>
                <li><input name="Precio" type="range" min="1" max="10000" value="50"></li>
                <button type="submit" class="text-white bg-blue-700 hover:cursor-pointer hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg my-2 text-sm px-5 py-1 text-center" value="Filtrar">Filtrar</button>
                </ul>
            </form>
        
        <b>Ordenar por</b>
            <form action="" method="get">
                <ul>
                <li><input type="checkbox" class="mr-1">Precio (Menor a mayor)</li>
                <li><input type="checkbox" class="mr-1">Precio (Mayor a menor)</li>
                <li><input type="checkbox" class="mr-1">Mas vendidos</li>
                <input type="button" class="text-white bg-blue-700 hover:cursor-pointer hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg my-2 text-sm px-5 py-1 text-center" value="Ordenar">
                </ul>
            </form>
        -->
    </div>
    </div>
    <section class="my-2 mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-2">
        <?php

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <div class="h-fit w-full max-w-xs bg-white border border-gray-200 rounded-lg shadow">
                        <img class="max-h-64 w-full p-8 rounded-t-lg" src="<?php 
                        if($row["img_url"] != "") {
                            echo("img/".$row['img_url']);
                        } else
                        {
                            
                        echo "img/default.png"; 
                        }
                        ?>" alt="product image" />
                        <div class="px-5 pb-5">
                        <h5 class="text-xl text-center sm:text-left font-bold tracking-tight text-gray-900"><?php echo($row["Name"])?></h5>
                        <div class="flex items-center justify-between flex-col sm:flex-row">
                        <span class="text-xl font-semibold text-gray-900">$<?php echo($row["price"])?></span>
                        <a id="<?php echo($row["Id"])?>" name="product-card" class="text-white bg-blue-700 hover:cursor-pointer hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Ver más</a>
                        </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "<div>No hay articulos que cumplan con esta busqueda. </div>";
            }

        ?>
    </section>
    </div>
    <nav class="flex justify-center" aria-label="Page navigation example">
    <ul class="flex items-center -space-x-px h-10 text-base">
        <li>
        <a href='<?php 
        $url = $_SERVER["REQUEST_URI"];
        if(str_contains($url,"page")) {
            $newUrl = substr($url,0,-1) . $pagenumber-1 ;
        } else {
            if (str_contains($url,"?")) {
                $url .= "&page=".$pagenumber-1;
                $newUrl = $url;
            }
            else {
                $url .= "?page=".$pagenumber-1;
                $newUrl = $url;
            }
        }
        echo $newUrl;    
?>' class="flex items-center justify-center px-4 h-10 ml-0 leading-tight text-gray-500 <?php if($pagenumber == 1) echo 'bg-gray-100'?> border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700 <?php if($pagenumber == 1) echo 'pointer-events-none'?>">
            <span class="sr-only">Previous</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M5 1 1 5l4 4"/>
            </svg>
        </a>
        </li>
        <?php 
        for($page = 1; $page<= $number_of_pages; $page++) {

        if ($page == $pagenumber) {
        echo('<li>
        <a href="'. $_SERVER["REQUEST_URI"] .'" class="z-10 flex items-center justify-center px-4 h-10 leading-tight text-blue-600 border border-blue-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700">'. $page .'</a>
        </li>');
        }
        else { 
        
        $url = $_SERVER["REQUEST_URI"];
            if(str_contains($url,"page")) {
                $newUrl = substr($url,0,-1) . $page ;
            } else {
                if (str_contains($url,"?")) {
                    $url .= "&page=$page";
                    $newUrl = $url;
                }
                else {
                    $url .= "?page=$page";
                    $newUrl = $url;
                }
            }
            
        echo('<li>
        <a href=" '.$newUrl.' " class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 border border-gray-300 hover:bg-gray-100 hover:text-gray-700">'. $page .'</a></li>');
        }
    }
        ?>
        <li>
        <a href='<?php 
        $url = $_SERVER["REQUEST_URI"];
        if(str_contains($url,"page")) {
            $newUrl = substr($url,0,-1) . $pagenumber+1 ;
        } else {
            if (str_contains($url,"?")) {
                $url .= "&page=".$pagenumber+1;
                $newUrl = $url;
            }
            else {
                $url .= "?page=".$pagenumber+1;
                $newUrl = $url;
            }
        }
        echo $newUrl;
        ?>' class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 <?php if($pagenumber == $number_of_pages) echo 'bg-gray-100'?> border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700 <?php if($pagenumber == $number_of_pages) echo 'pointer-events-none'?>">
            <span class="sr-only">Next</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="m1 9 4-4-4-4"/>
            </svg>
        </a>
        </li>
    </ul>
    </nav>
    <?php
        include("api/footertienda.php") 
    ?>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>

</body>
</html>
<script src="articulos.js"></script>