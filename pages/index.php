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
                <h2 class="titleofpage">Welcome to Profiles Please comrade!</h2>
                <p class="infotext">Here you can look at others profiles on the site!</p>
                <?php include "../scripts/php/view_advertisements.php" ?>
            </article>

        </section>

        <!-- Footern innehåller t.ex. somelänkar och kontaktuppg -->
        <footer>
            Made by The Soviet Union<sup>&#169;</sup>
        </footer>

    </div>
    <script src="../scripts/js/filterbutton.js"></script>
</body>

</html>