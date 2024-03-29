<!DOCTYPE html>
<?php include "../scripts/php/handy_methods.php";
if (!isset($_SESSION['username'])) header("Location: ./login.php");
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Likes</title>
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/like.css">
    <link rel="icon" type="image/x-icon" href="../media/logoICO.ico">
</head>

<body>

    <div id="container">
        <?php include "../scripts/php/header.php" ?>
        <section>

            <article>
                <?php include "../scripts/php/view_like.php" ?>
            </article>

        </section>

        <!-- Footern innehåller t.ex. somelänkar och kontaktuppg -->
        <?php include "../scripts/php/footer.php"?>

    </div>
</body>

</html>