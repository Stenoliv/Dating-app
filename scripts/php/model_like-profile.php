<?php
include "./handy_methods.php";
include "./classes/class_like-profile.php";


if (isset($_POST['Like'])) {
    $like = new likeProfile;
    $like->user_id = $_SESSION['id'];
    $like->likedId = $_POST['Like'];
    $like->likeProfile($conn);
}
