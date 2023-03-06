<?php
include "../scripts/php/classes/class_display_match.php";

if(!isset($_SESSION['username'])) {
    session_unset();
    session_destroy();
    header("Location: ./");
    exit;
}

$gender = 4;
if ($_SESSION['preference'] == "1") $gender = 1;
else if ($_SESSION['preference'] == "2") $gender = 2;
else if ($_SESSION['preference'] == "3") $gender = 3;


$sql = "SELECT * FROM profiles WHERE id !=:your_id AND id NOT IN 
(SELECT liked_user_id FROM likes WHERE user_id = :your_id) 
AND gender = IF(:gender <= 2, :gender, IF(:gender = 3, :gender, gender)) LIMIT 5";
$stmt = $conn->prepare($sql);
$stmt->execute([
    ':your_id' => $_SESSION['id'],
    ':gender' => $gender
]);

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $elem) {
    if ($elem['preference'] == $_SESSION['gender'] || $elem['preference'] == 4) {
        $potential_match = new ModelMatchProfile;
        $potential_match->id = $elem['id'];
        $potential_match->username = $elem['username'];
        $potential_match->firstname = $elem['first_name'];
        $potential_match->lastname = $elem['last_name'];
        $potential_match->email = $elem['email'];
        $potential_match->gender = $elem['gender'];
        $potential_match->preference = $elem['preference'];
        $potential_match->salary = $elem['salary'];
        $potential_match->zipcode = $elem['zipcode'];
        $potential_match->profile_pic = $elem['profile_pic'];
        $potential_match->bio = $elem['bio'];

        $potential_match->ShowProfile();
    }
}
