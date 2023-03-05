<?php

$sql = "SELECT user_id FROM likes WHERE liked_user_id = ? AND Matched != 1";
$stmt = $conn->prepare($sql);
$stmt->execute([$_SESSION['id']]);
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($result as $elem) {
    $sql = "SELECT * FROM profiles WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$elem['user_id']]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    print_r(" / ".$user['username']);
}
