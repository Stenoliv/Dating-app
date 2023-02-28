
<div class="formerror">
    <?php
    if(isset($_COOKIE["err"]))
    {
        $formerror = $_COOKIE["err"];
        setcookie("err","",-1,"/");
        echo $formerror;
    }
    ?>
</div>
<form action="../scripts/php/model_login.php" method="post"> 
    Username: <input type="text" name="username" value="" required>
    <br>
    Password: <input type="password" name="password" value="" required>
    <br>
    <input type="submit" name="submit" value="Submit">
</form>