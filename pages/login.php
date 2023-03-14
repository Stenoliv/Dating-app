<?php include "../scripts/php/handy_methods.php" ?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profiles Please</title>
    <link rel="stylesheet" href="../style/style.css">
    <link rel="icon" type="image/x-icon" href="../media/logoICO.ico">
</head>

<body>

    <div id="container">
        <?php include "../scripts/php/header.php" ?>
        <section>

            <article>
                <h2 class="logintitle">Welcome to Profiles Please comrade! Please log in!</h2>
                <?php include "../scripts/php/view_login.php" ?>
            </article>
            <article>
                <h3 class="noprofile">No profile? click here to register today!</h3>
                <a class="linktoreg" href="../pages/register.php">Register</a>
            </article>
        </section>

        <!-- Footern innehåller t.ex. somelänkar och kontaktuppg -->
        <footer>
            Made by The Soviet Union<sup>&#169;</sup>
        </footer>

    </div>
</body>

</html>