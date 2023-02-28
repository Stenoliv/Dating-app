<?php
include "./handy_methods.php";

if (isset($_SESSION['username']) || !empty($_SESSION['username'])) {
    $sql = "DELETE FROM profiles WHERE username=?";

    $stmt = $conn->prepare($sql);
    $stmt->execute([$_SESSION['username']]);

    if ($stmt) {
        session_unset();
        session_destroy();
        header("Location: ../../pages/");
        exit;
    } else {
        $cookiemsg = "Delete Failed!:green";
        setcookie($cookiename, $cookiemsg, $time, "/");
        header("Location: ../../pages/profile.php");
        exit;
    }
}
