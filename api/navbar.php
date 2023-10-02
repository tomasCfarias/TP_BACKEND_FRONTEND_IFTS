<script src="js/navbar.js"></script>
<header>
        <nav class="navbar">
            <div class="nav-item">
                <li><a href="index.php"><b>INICIO</b></a></li>
                
                <?php
                if(!isset($_SESSION["login_user"])) {
                    echo("<li><a href='login.php'>Login</a></li>");
                }

                else {
                    echo("<li><a href='api/signout.php'>Logout</a></li>");
                
                ?>
            </div>
            <div class="nav-item">
                <li class = "usuarios">Usuarios
                    <ul class="dropdown-menu users">
                        <li><a href="mostrarUsuarios.php">Lista Usuarios</a></li>
                        <li><a href="modificarUsuarios.php">Modificar Usuario</a></li>
                        <li><a href="borrarUsuarios.php">Borrar Usuario</a></li>
                    </ul>
                </li>
                <li class = "productos">Productos
                    <ul class="dropdown-menu products">
                        <li><a href="mostrarProductos.php">Lista Articulos</a></li>
                        <li><a href="subirProducto.php">Nuevo Articulo </a></li>
                        <li><a href="modificarProducto.php">Modificar Articulo </a></li>
                        <li><a href="borrarProducto.php">Borrar Articulo </a></li>
                    </ul>
                </li>
            </div>
            <?php  } ?>
        </nav>
</header>
