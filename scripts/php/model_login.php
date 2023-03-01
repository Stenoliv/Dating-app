<?php
include "./handy_methods.php";

if (isset($_POST['username']) && isset($_POST['password'])) {
    $user = test_input($_POST['username']);
    $passw = test_input($_POST['password']);
    $sql = "SELECT * FROM profiles WHERE username=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$user]);
    if ($stmt->rowCount() == 1) {
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if (password_verify($passw, $result["password"])) {
            $_SESSION['username'] = $result["username"];
            $_SESSION['first_name'] = $result["first_name"];
            $_SESSION['last_name'] = $result["last_name"];
            $_SESSION['email'] = $result["email"];
            $_SESSION['salary'] = $result["salary"];
            $_SESSION['zipcode'] = $result["zipcode"];
            $_SESSION['bio'] = $result["bio"];
            $_SESSION['gender'] = $result["gender"];
            $_SESSION['preference'] = $result["preference"];
            $_SESSION['profile_pic'] = $result["profile_pic"];
            header("Location:../../pages/");
            exit;
        } else {
            $errormsg = "Invalid password!";
            setcookie('err', $errormsg, time() + 60 * 60 * 24 * 30, "/");
            header("Location:../../pages/login.php");
            exit;
        }
    } else {
        $errormsg = "Invalid username!";
        setcookie('err', $errormsg, time() + 60 * 60 * 24 * 30, "/");
        header("Location:../../pages/login.php");
        exit;
    }
} else {
    $errormsg = "Invalid username or password!";
    setcookie('err', $errormsg, time() + 60 * 60 * 24 * 30, "/");
    header("Location:../../pages/login.php");
    exit;
}
