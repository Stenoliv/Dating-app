<header>
    <!-- Logo och meny i headern -->
    <img src="../media/logo.svg" alt="Website logo" />
    <div id="logo">Profiles Please</div>

    <nav>
        <!-- Huvudmenyn -->
        <ul>
            <li><a href="./">Home</a></li>
            <?php 
            if(!isset($_SESSION['username']))
            {
                print("<li><a href='../pages/login.php'>login</a></li>
                <li><a href='../pages/register.php'>Register</a></li>");
            }
            else
            {
                //tobehere
            } 
            ?>
            <?php
            // Hälsa på återkommande användare
            if (isset($_SESSION['username'])) {
                //print("Välkommen tillbaka ". $_SESSION['username']);
                print("<li><a href='./profile.php'>". $_SESSION['username']."'s profile</a></li>");
                print("<li><a href='../scripts/php/model_logout.php'>Logout</a></li>");
            }
            ?>
        </ul>
    </nav>
</header>