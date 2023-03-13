<header>
    <!-- Logo och meny i headern -->
    <img class="headerLogo" src="../media/logo.svg" alt="Website logo" />
    <div id="logo">Profiles Please</div>
    

    <nav>
        <!-- Huvudmenyn -->
        <ul>
            <li><a href="./">Home</a></li>
            <?php 
            if(!isset($_SESSION['username']))
            {
                include "../scripts/php/notLoggedIn_header.php";
            } else {
                //print("Välkommen tillbaka ". $_SESSION['username']);
                include "../scripts/php/loggedIn_header.php";
            }
            ?>
        </ul>
    </nav>
</header>