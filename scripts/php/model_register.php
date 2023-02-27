<?php
include "./handy_methods.php";

 $user = test_input($_POST['username']);
 $firstname = test_input(($_POST['firstname']));
 $lastname = test_input($_POST['lastname']);
 $email = test_input($_POST['email']);
 $salary = test_input($_POST['salary']);
 $bio = test_input($_POST['bio']);
 $zipcode = test_input($_POST['zipcode']);
 $passw = test_input($_POST['password']);
 $gender = test_input($_POST['gender']);
 $preference = test_input($_POST['preference']);

 print($preference);
 print($gender);
?>