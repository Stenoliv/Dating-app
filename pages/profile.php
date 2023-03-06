<!DOCTYPE html>

<?php
include "../scripts/php/handy_methods.php";
include "../scripts/php/checkIfLoggedIn.php";
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/profile.css">
    <link rel="icon" type="image/x-icon" href="../media/logoICO.ico">
</head>

<body>
    <div id="container">
        <?php include "../scripts/php/header.php" ?>
        <section>
            <?php include "../scripts/php/view_edit-profile.php" ?>
        </section>
    </div>
</body>

</html>