<?php
include "./handy_methods.php";
$errorurl = "Location:../../pages/register.php";
$time = time()+ 60*60*24*30;
if(isset ($_POST['username']) && isset ($_POST['firstname']) && isset ($_POST['lastname']) && isset ($_POST['email']) && isset ($_POST['salary']) && isset ($_POST['bio']) && isset ($_POST['zipcode']) && isset ($_POST['password']) && isset ($_POST['gender']) && isset ($_POST['preference']))
{
    $user = test_input($_POST['username']);
    if(empty($user)) 
        {
            $errormsg = "Fix your documentation: username!";
            setcookie('err',$errormsg,$time,"/");
            header($errorurl);
            exit;
        }
    $firstname = test_input(($_POST['firstname']));
    if(empty($firstname)) 
        {
            $errormsg = "Fix your documentation: firstname!";
            setcookie('err',$errormsg,$time,"/");
            header($errorurl);
            exit;
        }
    $lastname = test_input($_POST['lastname']);
        if(empty($lastname)) 
        {
            $errormsg = "Fix your documentation: Surname!";
            setcookie('err',$errormsg,$time,"/");
            header($errorurl);
            exit;
        }
    $email = test_input($_POST['email']);
    if(empty($email) || !filter_var($email,FILTER_VALIDATE_EMAIL)) 
    {
        $errormsg = "Fix your documentation: Email!";
        setcookie('err',$errormsg,$time,"/");
        header($errorurl);
        exit;
    }
    $salary = test_input($_POST['salary']);
    if(empty($salary) || (is_numeric($salary)==false)) 
    {
        $errormsg = "Fix your documentation: Salary!";
        setcookie('err',$errormsg,$time,"/");
        header($errorurl);
        exit;
    }
    $bio = test_input($_POST['bio']);
    if(empty($bio)) 
    {
        $errormsg = "Fix your documentation: Bio!";
        setcookie('err',$errormsg,$time,"/");
        header($errorurl);
        exit;
    }
    $zipcode = test_input($_POST['zipcode']);
    if(empty($zipcode) || (is_numeric($zipcode)==false) || strlen($zipcode)!=5) 
    {
        $errormsg = "Fix your documentation: Zipcode!";
        setcookie('err',$errormsg,$time,"/");
        header($errorurl);
        exit;
    }
    $passw = test_input($_POST['password']);
        if(empty($passw)|| strlen($passw)<8)
        {
            $errormsg = "Fix your documentation: Password needs to be at least 9 characters!";
            setcookie('err',$errormsg,$time,"/");
            header($errorurl);
        exit;
        }
    $gender = test_input($_POST['gender']);
    if(empty($gender)) 
    {
        $errormsg = "Fix your documentation: Dont be a scummy hacker!";
        setcookie('err',$errormsg,$time,"/");
        header($errorurl);
        exit;
    }
    else
    {
        $genderarray=[
        "1" => 'male',
        "2" => 'female',
        "3" => 'other'
        ];
        $gender = array_search($gender,$genderarray,true);
        echo $gender;
    }
    $preference = test_input($_POST['preference']);
    if(empty($preference)) 
    {
        $errormsg = "Fix your documentation: Dont be a scummy hacker!";
        setcookie('err',$errormsg,$time,"/");
        header($errorurl);
        exit;
    }
    else
    {
        $prefarray=[
        "1" => 'male',
        "2" => 'female',
        "3" => 'other',
        "4" => 'any'];
        $preference = array_search($preference,$prefarray,true);
        echo $preference;
    }
    $sql = "SELECT * FROM profiles WHERE username=? OR email=?";
    $stmt = $conn-> prepare($sql);
    $stmt-> execute([$user, $email]);
    if($stmt->rowCount()>0)
    {
        $errormsg = "Fix your documentation: Email or username is already in use";
        setcookie('err',$errormsg,$time,"/");
        header($errorurl);
        exit;
    }
    else
    {
        $sql ="INSERT INTO profiles (username,password,first_name,last_name,salary,zipcode,bio,gender,preference,email) VALUES (?,?,?,?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $hashedpassw = password_hash($passw, PASSWORD_DEFAULT);
        $gender = intval($gender);
        $preference = intval($preference);
        $salary = intval($salary);
        $stmt->execute([$user,$hashedpassw,$firstname,$lastname,$salary,$zipcode,$bio,$gender,$preference,$email]);
        if($stmt)
        {
            $_SESSION['username'] = $user;
            $_SESSION['first_name'] = $firstname;
            $_SESSION['last_name'] = $lastname;
            $_SESSION['email'] = $email;
            $_SESSION['salary'] = $salary;
            $_SESSION['zipcode'] = $zipcode;
            $_SESSION['bio'] = $bio;
            $_SESSION['gender'] = $gender;
            $_SESSION['preference'] = $preference;

            header("Location:../../pages/");
            exit;
        }
        else
        {
            $errormsg = "Somthing gone the wrong!";
            setcookie('err',$errormsg,$time,"/");
            header($errorurl);
            exit;
        }
    }

}else
{
    $errormsg = "Fix your documentation: emptyfields!";
    setcookie('err',$errormsg,$time,"/");
    header($errorurl);
    exit;

}
?>