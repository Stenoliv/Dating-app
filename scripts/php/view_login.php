
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
<form class="loginform" action="../scripts/php/model_login.php" method="post"> 
    Username <br><input class="loginfield" type="text" name="username" value="" required>
    <br>
    Password <br><input class="loginfield" type="password" name="password" value="" required>
    <br>
    <input class="loginsubmit" type="submit" name="submit" value="Submit">
</form>