<form action="../scripts/php/model_register.php" method="post"> 
    Username: <input type="text" name="username" value="">
    <br>
    E-mail: <input type="text" name="email" value="">
    <br>
    Firstname: <input type="text" name="firstname" value="">
    <br>
    Surname: <input type="text" name="lastname" value="">
    <br>
    Salary: <input type="number" name="salary" value="">
    <br>
    Zipcode: <input type="number" name="zipcode" value="">
    <br>
    Bio: <textarea rows="5" cols="40" name="bio" value=""></textarea>
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
    Password: <input type="text" name="password" value="">
    <br>
    <input type="submit" name="submit" value="Submit">
</form>
