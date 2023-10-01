<?php
  if(!isset($_SESSION['login_user_tienda'])){ //if login in session is not set

    ?>
    <nav class="bg-white border-gray-200">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <a href="articulos.php" class="flex items-center">
        <span class="self-center text-2xl font-semibold whitespace-nowrap">Tienda</span>
    </a>
    <button data-collapse-toggle="navbar-dropdown" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="navbar-dropdown" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
        </svg>
    </button>
    <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
      <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white">
        <li>
          <a href="login-tienda.php" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0">Log In</a>
        </li>
        <li>
          <a href="signin-tienda.php" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0">Register</a>
        </li>
    
      </ul>
    </div>
  </div>
</nav>

    <?php
  } else { ?>

<nav class="bg-white border-gray-200">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <a href="articulos.php" class="flex items-center">
        <span class="self-center text-2xl font-semibold whitespace-nowrap ">Tienda</span>
    </a>
    <button data-collapse-toggle="navbar-dropdown" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="navbar-dropdown" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
        </svg>
    </button>
    <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
      <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white">
        <li>
            <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="flex items-center justify-between w-full py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto">Carrito
  </button>
            <!-- Dropdown menu -->
            <div id="dropdownNavbar" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownLargeButton">
                <?php
                        if(empty($_SESSION["cart_list"])) {
                          echo("<li class='block px-4 py-2 hover:bg-gray-100'>Vacio</li>");
                        }
                        else {
                         $total_price = 0;
                         foreach($_SESSION["cart_list"] as $val) {
                          
                              echo("<li class='block px-4 py-2 hover:bg-gray-100'>");
                              echo('<div class="flex gap-1">');
                              echo("<p>".$val[1] ." </p>");
                              echo(" <div class='font-bold'> x".$val[2]."</div>");
                              echo("<div class='ml-auto font-bold'> $".$val[2] * $val[3]."</div>");
                              echo("</div>");
                              echo("</li>"); 
                              $total_price+= $val[2]*$val[3];
                         }
                         echo("<li class='flex block font-bold px-4 py-2 hover:bg-gray-100'> Total: <span class='ml-auto'>$".$total_price."</span></li>");
                        }
                        ?>
                    
                </ul>
                <div class="py-1">
                  <a href="checkout.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Checkout</a>
                </div>
            </div>
        </li>
        <li>
          <a href="api/signouttienda.php" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0">Sign Out</a>
        </li>
    
      </ul>
    </div>
  </div>
</nav>
<?php  } ?>