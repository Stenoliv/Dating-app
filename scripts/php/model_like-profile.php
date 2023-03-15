<?php
include "./handy_methods.php";
include "./classes/class_like-profile.php";


if (isset($_POST['like_button'])) {
    $like = new like_profile;
    $like->user_id = $_SESSION['id'];
    $like->likedId = $_POST['like_button'];
    $like->likeProfile($conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password));
}
else if (isset($_POST['dislike_button'])) {
    header("Location: ../../pages/match.php");
}