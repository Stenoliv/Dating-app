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
            <li><a href="../pages/profile.php">Profile</a></li>
            <?php
            // Hälsa på återkommande användare
            if (isset($_SESSION['username'])) {
                //print("Välkommen tillbaka ". $_SESSION['username']);
                print("<li><a href='./profile.php'>". $_SESSION['username']."'s profile</a></li>");
            }
            ?>
        </ul>
    </nav>
</header>