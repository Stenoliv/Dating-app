<?php
include "../handy_methods.php";

if (isset($_GET['id'])) {
    $id = $_SESSION['id'];
    $otherID = test_input($_GET['id']);

    $sql = "SELECT * FROM chats WHERE FromUser=:yourID AND ToUser=:otherID OR FromUser=:otherID AND ToUser=:yourID";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':yourID' => $id, ':otherID' => $otherID]);

    if ($stmt) {
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        include '../view_chatbox.php';
    } else {
        echo "Failed to open chat! Try again!";
    }
}
