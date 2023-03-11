
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
<form action="../scripts/php/model_register.php" method="post"> 
    Username: <input type="text" name="username" value="" required>
    <br>
    E-mail: <input type="text" name="email" value="" required>
    <br>
    Firstname: <input type="text" name="firstname" value="" required>
    <br>
    Surname: <input type="text" name="lastname" value="" required>
    <br>
    Salary: <input type="number" name="salary" value="" required>
    <br>
    Zipcode: <input type="number" name="zipcode" value="" required>
    <br>
    Date of birth: <input type="date" name="dob" value="" required required pattern="\d{4}-\d{2}-\d{2}">
    <br>
    Bio: <textarea rows="5" cols="40" name="bio" value="" required></textarea>
    <br>
    Gender:
    <input type="radio" name="gender"
    <?php if (isset($gender) && $gender=="female") echo "checked";?>
    value="female">Female
    <input type="radio" name="gender"
    <?php if (isset($gender) && $gender=="male") echo "checked";?>
    value="male">Male
    <input type="radio" name="gender"
    <?php if (isset($gender) && $gender=="other") echo "checked";?>
    value="other">Other
    <br>
    preference:
    <input type="radio" name="preference"
    <?php if (isset($gender) && $preference=="female") echo "checked";?>
    value="female">Female
    <input type="radio" name="preference"
    <?php if (isset($gender) && $preference=="male") echo "checked";?>
    value="male">Male
    <input type="radio" name="preference"
    <?php if (isset($gender) && $preference=="other") echo "checked";?>
    value="other">Other
    <input type="radio" name="preference"
    <?php if (isset($gender) && $preference=="any") echo "checked";?>
    value="other">Any
    <br>  
    Password: <input type="password" name="password" value="" required>
    <br>
    <input type="submit" name="submit" value="Submit">
</form>
