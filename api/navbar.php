<header>
        <nav class="navbar">
            <div class="nav-item">
                <li><a href="index.php"><b>INICIO</b></a></li>
            </div>
                
                
            <div class="nav-item">
            <?php
                if(!isset($_SESSION["login_user"])) {
                    echo("<li><a href='login.php'>Login</a></li>");
                }

                else {
                    echo("<li><a href='api/signout.php'>Logout</a></li>");
                }
                ?>
            </div>
       
        </nav>
</header>
