<nav class="navbar">
        <?php
                if(!isset($_SESSION["login_user_tienda"])) {
                
                    echo("<div class='navbar-left'>");     
                    echo("<a href='articulos.php'><b>Tienda</b></a>");
                    echo("<a href='login-tienda.php'>Login</a>");
                    echo("<a href='signin-tienda.php'>Registro</a>");
                    echo("</div>");
                }
                else{
                echo("<div class='navbar-item'>");  
                echo("<a href='articulos.php'><b>Tienda</b></a>");
                echo("<p>Bienvenido, <b>" . $_SESSION['login_user_tienda']. "!</b></p>");
                echo("</div>");
                echo("<div class='navbar-item'>");  
                ?>
                <li class = "productos">Productos
                    <ul class="dropdown-menu products">
                        <?php
                        if(empty($_SESSION["cart_list"])) {
                          echo("<li>Vacio</li>");
                        }
                        else {
                         foreach($_SESSION["cart_list"] as $k => $v) {
                          echo("<li>$v</li>");
                         }
                        }
                        ?>
                    </ul>
                </li>
                <?php
                echo("<a href='api/signouttienda.php'>Logout</a>");
                echo("</div>");
                }
        ?>
</nav>