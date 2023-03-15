<header>
    <!-- Logo och meny i headern -->
    <img class="headerLogo" src="../media/logo.svg" alt="Website logo" />
    <div id="logo">Profiles Please</div>


    <nav>
        <!-- Huvudmenyn -->
        <ul>
            <li><span id="home-btn">Home</span></li>
            <?php
            if (!isset($_SESSION['username'])) {
                include "../scripts/php/notLoggedIn_header.php";
            } else {
                //print("Välkommen tillbaka ". $_SESSION['username']);
                include "../scripts/php/loggedIn_header.php";
            }
            ?>
        </ul>
    </nav>

    <script>
        document.querySelector('#home-btn').addEventListener('click', (event) => {
            const xhttp = new XMLHttpRequest;
            xhttp.onload = function() {
                window.location.href = './index.php';
            }
            xhttp.open('GET', '../scripts/php/ajax/emptyIndexCookie.php');
            xhttp.send();
        })
    </script>
</header>