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
                <h2 class="registertitle">Welcome to Profiles Please comrade! Here you will submit your registration!</h2>
                <?php include "../scripts/php/view_register.php"?>
                
            </article>
            <article>
                <h3 class="noprofile">Already have a profile? click here to log in!</h3>
                <a class="linktoreg" href="../pages/login.php">Login</a>
            </article>
        </section>

        <!-- Footern innehåller t.ex. somelänkar och kontaktuppg -->
        <?php include "../scripts/php/footer.php"?>

    </div>
</body>

</html>