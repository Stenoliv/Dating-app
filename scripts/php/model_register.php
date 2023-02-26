<?php
include "../scripts/php/handy_methods.php";

 $user = test_input($POST['username']);
 $firstname = test_input(($POST['firstname']));
 $lastname = test_input($POST['lastname']);
 $email = test_input($POST['email']);
 $salary = test_input($POST['salary']);
 $bio = test_input($POST['bio']);
 $zipcode = test_input($POST['zipcode']);
 $passw = test_input($POST['password']);
 $gender = test_input($POST['gender']);
 $preference = test_input($POST['preference']);

 print($preference);
 print($gender);
?>