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
                echo("<a href='articulos.php'><b>Tienda</b></a>");
                echo("<div class='navbar-right'>");  
                echo("<p>Bienvenido, <b>" . $_SESSION['login_user_tienda']. "!</b></p>");
                echo("<a href='api/signouttienda.php'>Logout</a>");
                echo("</div>");
                }
        ?>
</nav>