<header>
        <nav class="navbar">
            
        <div class="nav-left">
            <div class="nav-item">
                <button class="openbtn"> 
                    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"/></svg>
                </button>
            </div>
            <div class="nav-item">
                <li><a href="index.php"><b>Panel de Administración</b></a></li>
            </div>
        </div>
                
                
            <div class="nav-right">
            <?php
            if(isset($_SESSION["login_user"])) {
                 echo('
                 <div class="nav-item">
                <div class="notif">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="M160-200v-80h80v-280q0-83 50-147.5T420-792v-28q0-25 17.5-42.5T480-880q25 0 42.5 17.5T540-820v28q80 20 130 84.5T720-560v280h80v80H160Zm320-300Zm0 420q-33 0-56.5-23.5T400-160h160q0 33-23.5 56.5T480-80ZM320-280h320v-280q0-66-47-113t-113-47q-66 0-113 47t-47 113v280Z"/></svg>
                    <div class="notif-number"> 0</div>
                </div>
                <div class="notif-menu hideNotif">
                    <ul class="notifications">
                        
                    </ul>
                </div>
                </div>
                 ');   
            }
            ?>
            

                <div class="nav-item">
                    <?php
                if(!isset($_SESSION["login_user"])) {
                    echo('<li><a href="login.php"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="M480-120v-80h280v-560H480v-80h280q33 0 56.5 23.5T840-760v560q0 33-23.5 56.5T760-120H480Zm-80-160-55-58 102-102H120v-80h327L345-622l55-58 200 200-200 200Z"/></svg></a></li>');
                }
                
                else {
                    echo('<li><a href="api/signout.php"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h280v80H200v560h280v80H200Zm440-160-55-58 102-102H360v-80h327L585-622l55-58 200 200-200 200Z"/></svg></a></li>');
                }
                ?>
                </div>
            </div>
        </nav>
</header>

