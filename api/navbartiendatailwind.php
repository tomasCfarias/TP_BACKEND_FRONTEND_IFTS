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
    <div class="leftnav sm:flex">
      <a href="articulos.php" class="flex items-center mr-10">
        <span class="self-center text-2xl font-semibold whitespace-nowrap ">Tienda</span>
      </a>
      <form action="articulos.php" method="GET" id="search_form">
      <input type="search" placeholder="Busca tu producto" class="rounded-lg" id="q" name="q">
      <button type="submit" class="text-white bg-blue-700 hover:cursor-pointer hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Buscar</button>
    </form>
    </div>
    
    <div class="block w-auto" id="navbar-dropdown">
      <ul class="flex font-medium p-0 border border-gray-100 rounded-lg flex-row sm:space-x-8 mt-0 border-0 bg-white">
        <li>
          <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="flex items-center justify-between w-full py-2 pl-3 sm:pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto">
            <svg class="z-5 w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 15a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm0 0h8m-8 0-1-4m9 4a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-9-4h10l2-7H3m2 7L3 4m0 0-.792-3H1"/>
            </svg>
            <div class=" text-white text-xs relative bg-red-500 top-2 right-7 px-1 rounded-full"><?php echo (!empty($_SESSION["cart_list"]) ? count($_SESSION["cart_list"]) : 0) ?></div>
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
<!-- Second Dropdown menu -->
        <li>
            <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbarUser" class="flex items-center justify-between w-full py-2 sm:pl-3 sm:pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto"><svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 18">
    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm-2 3h4a4 4 0 0 1 4 4v2H1v-2a4 4 0 0 1 4-4Z"/>
  </svg>
  </button>
            <!-- Dropdown menu -->
            <div id="dropdownNavbarUser" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
              <div class="p-2">
                <a href="settingsuser.php?user=<?= $_SESSION["userid_tienda"] ?>" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0">Settings</a>
              </div>
              <div class="p-2">
                <a href="compras.php?user=<?= $_SESSION["userid_tienda"] ?>" class ="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0">
                  Mis compras
                </a>
              </div>
              <div class="p-2">
            <a href="api/signouttienda.php" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0">Sign Out</a>
              </div>
            </div>
        </li>
      </ul>
    </div>
  </div>
</nav>
<?php  } ?>