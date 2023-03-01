<?php
include "./handy_methods.php";

$maxImageSize = 500000;
$cookiename = "edit-profile-output";
$cookiemsg = "";
$time = time() + 60 * 60 * 24 * 30;


if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    header("Location: ../../pages/");
    exit;
}
// Check if uploading profile pic or other changes?
if (isset($_POST['upload-profile-pic'])) {
    function checkIfFileExists($dir)
    {
        $output = array("exists" => "false", "file" => "");
        foreach ($dir as &$key) {
            if (array_search($key, $dir) >= 2) {
                $newElem = explode(".", $key)[0];
                if ($newElem == $_SESSION['username']) {
                    $output = array(
                        "exists" => "true",
                        "file" => $key
                    );
                    return $output;
                }
            }
        }
        return $output;
    }
    $targetdir = "../../media/profile-pictures/";
    $dir = scandir($targetdir);
    $file_exists = checkIfFileExists($dir)["exists"];
    print_r($file_exists);
    $target_file = $targetdir . basename($_FILES['fileToUpload']["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        $cookiemsg = "Wrong file type: jpeg,png,jpg only!/red";
        setcookie($cookiename, $cookiemsg, $time, "/");
        header("Location: ../../pages/profile.php");
        exit;
    } else if ($_FILES['fileToUpload']['size'] > $maxImageSize) {
        $cookiemsg = "To large image! Max allowed: " . ($maxImageSize / 1000) . "KB/red";
        setcookie($cookiename, $cookiemsg, $time, "/");
        header("Location: ../../pages/profile.php");
        exit;
    } else if ($file_exists == "true") {
        unlink($targetdir . checkIfFileExists($dir)["file"]);
    }

    //Cleared all checks procced to "upload" file and set as new profile-pic!
    $imageName = $targetdir . $_SESSION['username'];
    $extension = pathinfo($_FILES['fileToUpload']['name'], PATHINFO_EXTENSION);
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $imageName . "." . $extension)) {



        $sql = "UPDATE profiles SET profile_pic=? WHERE username=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$_SESSION['username'] . "." . $extension, $_SESSION['username']]);

        if ($stmt) {
            $_SESSION['profile_pic'] = $_SESSION['username'] .".". $extension;
            $cookiemsg = "File uploaded:/green";
            setcookie($cookiename, $cookiemsg, $time, "/");
            header("Location: ../../pages/profile.php");
            exit;
        } else {
            unlink($targetdir . checkIfFileExists($dir)["file"]);
            $cookiemsg = "File failed to upload:/red";
            setcookie($cookiename, $cookiemsg, $time, "/");
            header("Location: ../../pages/profile.php");
            exit;
        }
    } else {
        $cookiemsg = "Sorry something went wrong!/red";
        setcookie($cookiename, $cookiemsg, $time, "/");
        header("Location: ../../pages/profile.php");
        exit;
    }

    // Update profile
} else if (isset($_POST['submit-changes'])) {

    $firstname = "";
    $lastname = "";
    $salary = "";
    $zipcode = "";
    $bio = "";
    $preference = "";
    $gender = "";

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

        $cookiemsg = "Dating Permit updated!/green";
        setcookie($cookiename, $cookiemsg, $time, "/");
        header("Location: ../../pages/profile.php");
        exit;
    } else {
        $cookiemsg = "Dating Permit update failed!/red";
        setcookie($cookiename, $cookiemsg, $time, "/");
        header("Location: ../../pages/profile.php");
        exit;
    }
} else {
    $cookiemsg = "Unknown error!/red";
    setcookie($cookiename, $cookiemsg, $time, "/");
    header("Location: ../../pages/profile.php");
    exit;
}
