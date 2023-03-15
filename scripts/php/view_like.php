<div class="like-columns">
<?php
include "../scripts/php/classes/class_like.php";

$sql = "SELECT user_id FROM likes WHERE liked_user_id = ? AND Matched != 1";
$stmt = $conn->prepare($sql);
$stmt->execute([$_SESSION['id']]);
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
if($stmt->rowCount() > 0) {
    foreach ($result as $elem) {
        $sql = "SELECT * FROM profiles WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$elem['user_id']]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        $profile = new view_profile;
        $profile->username = $user['username'];
        $profile->profilepic = $user['profile_pic'];
        $profile->display_like();
    }
} else {
    ?>
    <div class="center-elem">
        <p>You have not recieved any likes yet!</p>
    </div>
    <?php
}

?>
</div>