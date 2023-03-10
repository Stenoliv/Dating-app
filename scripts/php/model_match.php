<?php
include "../scripts/php/classes/class_display_match.php";

if (!isset($_SESSION['username'])) {
    session_unset();
    session_destroy();
    header("Location: ./");
    exit;
}

$gender = 4;
if ($_SESSION['preference'] == "1") $gender = 1;
else if ($_SESSION['preference'] == "2") $gender = 2;
else if ($_SESSION['preference'] == "3") $gender = 3;

$time = time() + 60 * 60 * 24 * 30;
$cookieName = 'match_lastViewedID';
$lastViewedId = 0;
if (isset($_COOKIE[$cookieName])) {
    if ($_COOKIE[$cookieName] == 'TryAgain') {
        echo 'No more profiles, Try to refresh the page!';
        setcookie($cookieName, '', -1, "/");
    } else {
        $lastViewedId = $_COOKIE[$cookieName];

        $sql = "SELECT * FROM profiles WHERE id !=:your_id AND id>:last_viewed_id AND id NOT IN 
            (SELECT liked_user_id FROM likes WHERE user_id = :your_id) 
            AND gender = IF(:gender <= 2, :gender, IF(:gender = 3, :gender, gender)) LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':your_id' => $_SESSION['id'],
            ':gender' => $gender,
            ':last_viewed_id' => $lastViewedId
        ]);
        if ($stmt->rowCount() == 1) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            setcookie($cookieName, $result['id'], $time, "/");
            if ($result['preference'] == $_SESSION['gender'] || $result['preference'] == 4) {
                $potential_match = new ModelMatchProfile;
                $potential_match->id = $result['id'];
                $potential_match->username = $result['username'];
                $potential_match->firstname = $result['first_name'];
                $potential_match->lastname = $result['last_name'];
                $potential_match->email = $result['email'];
                $potential_match->gender = $result['gender'];
                $potential_match->preference = $result['preference'];
                $potential_match->salary = $result['salary'];
                $potential_match->zipcode = $result['zipcode'];
                $potential_match->profile_pic = $result['profile_pic'];
                $potential_match->bio = $result['bio'];

                $potential_match->ShowProfile();
            } else {
                header("Location: " . $_SERVER['PHP_SELF']);
            }
        } else {
            if ($stmt->rowCount() == 0) {
                setcookie($cookieName, 'TryAgain', $time, "/");
            }
            header("Location: " . $_SERVER['PHP_SELF']);
            exit;
        }
    }
} else {

    $sql = "SELECT * FROM profiles WHERE id !=:your_id AND id>:last_viewed_id AND id NOT IN 
            (SELECT liked_user_id FROM likes WHERE user_id = :your_id) 
            AND gender = IF(:gender <= 2, :gender, IF(:gender = 3, :gender, gender)) LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':your_id' => $_SESSION['id'],
        ':gender' => $gender,
        ':last_viewed_id' => $lastViewedId
    ]);
    if ($stmt->rowCount() == 1) {
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        setcookie($cookieName, $result['id'], $time, "/");
        if ($result['preference'] == $_SESSION['gender'] || $result['preference'] == 4) {
            $potential_match = new ModelMatchProfile;
            $potential_match->id = $result['id'];
            $potential_match->username = $result['username'];
            $potential_match->firstname = $result['first_name'];
            $potential_match->lastname = $result['last_name'];
            $potential_match->email = $result['email'];
            $potential_match->gender = $result['gender'];
            $potential_match->preference = $result['preference'];
            $potential_match->salary = $result['salary'];
            $potential_match->zipcode = $result['zipcode'];
            $potential_match->profile_pic = $result['profile_pic'];
            $potential_match->bio = $result['bio'];

            $potential_match->ShowProfile();
        } else {
            header("Location: " . $_SERVER['PHP_SELF']);
        }
    } else {
        if ($stmt->rowCount() == 0) {
            setcookie($cookieName, 'TryAgain', $time, "/");
        }
        header("Location: " . $_SERVER['PHP_SELF']);
    }
}
