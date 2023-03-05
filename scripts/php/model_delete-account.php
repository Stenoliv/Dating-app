<?php
include "./handy_methods.php";
$cookiename = "edit-profile-output";
$cookiemsg = "";
if (isset($_SESSION['username']) && !empty($_SESSION['username']) && isset($_POST['user-passw'])) {

    $passw = test_input($_POST['user-passw']);

    $sql = "SELECT password FROM profiles WHERE username=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$_SESSION['username']]);

    if ($stmt) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (password_verify($passw, $row['password'])) {
            $sql = "DELETE FROM profiles WHERE username=:username";
            $stmt = $conn->prepare($sql);
            $stmt->execute([':username' => $_SESSION['username']]);

            if ($stmt) {
                $sql = 'DELETE FROM likes WHERE user_id = :userId OR liked_user_id = :userId';
                $stmt = $conn->prepare($sql);
                $stmt->execute([':userId' => $_SESSION['id']]);
                session_unset();
                session_destroy();
                header("Location: ../../pages/");
                exit;
            } else {
                $cookiemsg = "Delete Failed!/red";
                setcookie($cookiename, $cookiemsg, $time, "/");
                header("Location: ../../pages/profile.php");
                exit;
            }
        } else {
            $cookiemsg = "Wrong Password!/red";
            setcookie($cookiename, $cookiemsg, $time, "/");
            header("Location: ../../pages/profile.php");
            exit;
        }
    } else {
        $cookiemsg = "Something Went Wrong!/red";
        setcookie($cookiename, $cookiemsg, $time, "/");
        header("Location: ../../pages/profile.php");
        exit;
    }
}
