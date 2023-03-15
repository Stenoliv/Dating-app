<?php
include "../handy_methods.php";

if (isset($_GET['id']) && isset($_SESSION['lastmsg'])) {
    $id = $_SESSION['id'];
    $oldmsg = $_SESSION['lastmsg'];
    $otherID = test_input($_GET['id']);

    $sql = "SELECT Message FROM chats WHERE FromUser=:yourID AND ToUser=:otherID OR FromUser=:otherID AND ToUser=:yourID";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':yourID' => $id, ':otherID' => $otherID]);

    if ($stmt->rowCount() == 1) {
        $newMSG = $stmt->fetch(PDO::FETCH_COLUMN);
        $newMSG = json_decode($newMSG, true);

        if (count($oldmsg) != count($newMSG)) {
            $start_index = count($oldmsg);

            foreach ($newMSG as $int => $msg) {
                if (array_search($msg, $newMSG) < $start_index) continue;
?>
                <div class="message <?php if ($msg['user'] == $_SESSION['username']) echo "my_text";
                                    else echo "other_text" ?>">
                    <div class="message-div">
                        <div class="message-info">
                            <h2 class="message-sender"><?php if ($msg['user'] == $_SESSION['username']) echo "&#60;You&#62;";
                                                        else echo "&#60;" . $msg['user'] . "&#62;"; ?></h2>
                            <p class="message-date"><?= $msg['date'] ?></p>
                        </div>
                        <div class="message-msg">
                            <p>- </p>
                            <p><?= $msg['msg'] ?></p>
                        </div>
                    </div>
                </div>
<?php
            }
            $_SESSION['lastmsg'] = $newMSG;
        }
    } else {
        echo "Failed to open chat! Try again!";
    }
}
