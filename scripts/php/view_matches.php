<?php
include "../scripts/php/classes/class_match.php";
$sql = "SELECT * FROM profiles WHERE id IN (SELECT liked_user_id FROM likes WHERE user_id = ? AND Matched='1')";
$stmt = $conn->prepare($sql);
$stmt->execute([$_SESSION['id']]);

if ($stmt->rowCount() > 0) {
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($result as $elem) {
        $matched_user = new matched_user;
        $matched_user->userid = $elem['id'];
        $matched_user->name = $elem['username'];
        $matched_user->pic = $elem['profile_pic'];
        $matched_user->createLink();
    }
}