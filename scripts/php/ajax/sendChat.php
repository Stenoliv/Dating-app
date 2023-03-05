<?php
include "../handy_methods.php";

$id = $_SESSION['id'];

if (isset($_GET['msg']) && isset($_GET['otherID'])) {
    $msg = test_input($_GET['msg']);
    $otherID = $_GET['otherID'];

    $sql = "SELECT Message FROM chats WHERE FromUser=:yourID AND ToUser=:otherID OR FromUser=:otherID AND ToUser=:yourID";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':yourID' => $id, ':otherID' => $otherID]);
    if ($stmt->rowCount() > 0) {
        $currentMSG = $stmt->fetch(PDO::FETCH_ASSOC)['Message'];
        $time = date('H:i:s d-m-Y');
        $objCurrentMsg = json_decode($currentMSG, TRUE);
        $sql = "SELECT username FROM profiles WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
        if ($stmt->rowCount() == 1) $user = $stmt->fetch(PDO::FETCH_ASSOC)['username'];
        else $user = $id;
        $objCurrentMsg[] = ['user' => "$user", 'date' => "$time", 'msg' => "$msg"];
        $jsonMSG = json_encode($objCurrentMsg);

        $sql = "UPDATE chats SET Message=:msg WHERE FromUser=:yourID AND ToUser=:otherID OR FromUser=:otherID AND ToUser=:yourID";
        $stmt = $conn->prepare($sql);
        $stmt->execute([":msg" => $jsonMSG, ':yourID' => $id, ':otherID' => $otherID]);
        if ($stmt->rowCount() > 0) {
            $objArray = ['user' => "$user", 'date' => "$time", 'msg' => "$msg"];
            $jsonNewMSG = json_encode($objArray);
            echo $jsonNewMSG;
            exit;
        } else {
            echo "ERROR Updating Data!";
        }
    } else echo "ERROR No lines selected" . ":" . $id . "/" . $otherID;
} else {
    echo "NOT SET ERROR!";
}
