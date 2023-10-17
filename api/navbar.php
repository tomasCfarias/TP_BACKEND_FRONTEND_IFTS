<header>
        <nav class="navbar">
            
            <div class="nav-item">
                <button class="openbtn"> 
                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"/></svg>
                </button>
                
                <li><a href="index.php"><b>Panel de Administración</b></a></li>
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
