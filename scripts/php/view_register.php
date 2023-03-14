
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
<form action="../scripts/php/model_register.php" method="post" class="registerform"> 
    Username: <input class="regfield" type="text" name="username" value="" required>
    <br>
    E-mail: <input class="regfield" type="text" name="email" value="" required>
    <br>
    Firstname: <input class="regfield" type="text" name="firstname" value="" required>
    <br>
    Surname: <input class="regfield" type="text" name="lastname" value="" required>
    <br>
    Salary: <input class="regfield" type="number" name="salary" value="" required>
    <br>
    Zipcode: <input class="regfield" type="number" name="zipcode" value="" required>
    <br>
    Date of birth: <input class="regfield" type="date" name="dob" value="" required required pattern="\d{4}-\d{2}-\d{2}">
    <br>
    Bio: <br><textarea class="regfield" rows="5" cols="30" name="bio" value="" required></textarea>
    <br>
    Gender:
    <input class="regfield" type="radio" name="gender"
    <?php if (isset($gender) && $gender=="female") echo "checked";?>
    value="female">Female
    <input class="regfield" type="radio" name="gender"
    <?php if (isset($gender) && $gender=="male") echo "checked";?>
    value="male">Male
    <input class="regfield" type="radio" name="gender"
    <?php if (isset($gender) && $gender=="other") echo "checked";?>
    value="other">Other
    <br>
    preference:
    <input class="regfield" type="radio" name="preference"
    <?php if (isset($gender) && $preference=="female") echo "checked";?>
    value="female">Female
    <input class="regfield" type="radio" name="preference"
    <?php if (isset($gender) && $preference=="male") echo "checked";?>
    value="male">Male
    <input class="regfield" type="radio" name="preference"
    <?php if (isset($gender) && $preference=="other") echo "checked";?>
    value="other">Other
    <input class="regfield" type="radio" name="preference"
    <?php if (isset($gender) && $preference=="any") echo "checked";?>
    value="other">Any
    <br>  
    Password: <input class="regfield" type="password" name="password" value="" required>
    <br>
    <input class="regsubmit" type="submit" name="submit" value="Register">
</form>
