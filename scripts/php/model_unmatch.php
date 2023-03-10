<?php
include "./handy_methods.php";

if (isset($_REQUEST['un-match'])) {

    $unmatchUser = test_input($_POST['un-match']);

    $sql = "SELECT id FROM profiles WHERE username=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$unmatchUser]);

    if ($stmt->rowCount() == 1) {
        //Found Match
        $id = $stmt->fetch(PDO::FETCH_ASSOC)['id'];
        $sql = "SELECT * FROM likes WHERE user_id=:your_id AND liked_user_id=:unmatchID OR user_id=:unmatchID AND liked_user_id=:your_id ";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':your_id' => $_SESSION['id'], ':unmatchID' => $id]);

        if ($stmt->rowCount() > 0) {
            // Remove Match and likes
            $sql = "DELETE FROM likes WHERE user_id=:your_id AND liked_user_id=:unmatchID OR user_id=:unmatchID AND liked_user_id=:your_id; DELETE FROM chats WHERE FromUser=:your_id AND ToUser=:unmatchID OR FromUser=:unmatchID AND ToUser=:your_id";
            $stmt = $conn->prepare($sql);
            $stmt->execute([':your_id' => $_SESSION['id'], ':unmatchID' => $id]);

            header("Location: ../../pages/chat.php");
        } else header("Location: ../../pages/chat.php");
    } else {
        header("Location: ../../pages/chat.php");
    }
}
