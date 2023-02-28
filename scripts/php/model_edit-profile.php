<?php
include "./handy_methods.php";

if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    header("Location: ../../pages/");
    exit;
}

$firstname = "";
$lastname = "";
$salary = "";
$zipcode = "";
$bio = "";
$preference = "";
$gender = "";

$cookiename = "edit-profile-output";
$cookiemsg = "";
$time = time() + 60*60*24*30;

if (isset($_POST['firstname']) && !empty(test_input($_POST['firstname']))) $firstname = test_input($_POST['firstname']);
if (isset($_POST['lastname']) && !empty(test_input($_POST['lastname']))) $lastname = test_input($_POST['lastname']);
if (isset($_POST['salary']) && !empty(test_input($_POST['salary']))) $salary = test_input($_POST['salary']);
if (isset($_POST['zipcode']) && !empty(test_input($_POST['zipcode']))) $zipcode = test_input($_POST['zipcode']);
if (isset($_POST['bio']) && !empty(test_input($_POST['bio']))) $bio = test_input($_POST['bio']);
if (isset($_POST['preference']) && !empty(test_input($_POST['preference'])) && is_numeric(test_input($_POST['preference']))) $preference = test_input($_POST['preference']);
if (isset($_POST['gender']) && !empty(test_input($_POST['gender'])) && is_numeric(test_input($_POST['gender']))) $gender = test_input($_POST['gender']);

$sql = "UPDATE profiles SET first_name=?, last_name=?, salary=?, zipcode=?, bio=?, preference=?, gender=? WHERE username=?";

$stmt = $conn->prepare($sql);
$stmt->execute([$firstname, $lastname, $salary, $zipcode, $bio, $preference, $gender, $username]);

if ($stmt) {
    $_SESSION['first_name'] = $firstname;
    $_SESSION['last_name'] = $lastname;
    $_SESSION['salary'] = $salary;
    $_SESSION['zipcode'] = $zipcode;
    $_SESSION['bio'] = $bio;
    $_SESSION['gender'] = $gender;
    $_SESSION['preference'] = $preference;

    $cookiemsg = "Dating Permit updated!:green";
    setcookie($cookiename, $cookiemsg, $time, "/");
    header("Location: ../../pages/profile.php");
    exit;
} else {
    $cookiemsg = "Dating Permit update failed!:red";
    setcookie($cookiename, $cookiemsg, $time, "/");
    header("Location: ../../pages/profile.php");
    exit;
}
