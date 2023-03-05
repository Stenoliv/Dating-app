<?php
include "../scripts/php/model_advertisements.php";
?>

<?php 
    if(isset($_SESSION['username']))
    {
        include "../scripts/php/view_filter.php";
    }
?>
