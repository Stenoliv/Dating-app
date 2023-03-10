<?php
if ($result) :
    $objChat = json_decode($result['Message'], TRUE);

    $chatUsername = "Test";
    $otherID = "";
    if ($_SESSION['id'] == $result['FromUser']) {
        $otherID = $result['ToUser'];
    } else {
        $otherID = $result['FromUser'];
    }

    $sql = "SELECT username FROM profiles WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$otherID]);
    if ($stmt->rowCount() == 1) {
        $chatUsername = $stmt->fetch(PDO::FETCH_ASSOC)['username'];
    }
    ?>
    <div class="chat-info">
        <p>Chatting With:</p>
        <p><?= $chatUsername ?></p>
        <form class="un_match" action="../scripts/php/model_unmatch.php" method="post">
            <button type="submit" name="un-match" value="<?= $chatUsername ?>">UnMatch</button>
        </form>
    </div>
    <div class="chat-view">
        <?php
        //Revers Order: $objChat = array_reverse($objChat);
        foreach ($objChat as $elem): ?>
            <div class="message <?php if ($elem['user'] == $_SESSION['username']) echo "my_text";
                                else echo "other_text" ?>">
                <div class="message-div">
                    <div class="message-info">
                        <h2 class="message-sender"><?php if ($elem['user'] == $_SESSION['username']) echo "&#60;You&#62;";
                                                    else echo "&#60;" . $elem['user'] . "&#62;"; ?></h2>
                        <p class="message-date"><?= $elem['date'] ?></p>
                    </div>
                    <div class="message-msg">
                        <p>- </p>
                        <p><?= $elem['msg'] ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="message-text_field">
        <textarea class="chat-text-field" data-other_id="<?= $otherID ?>"></textarea>
        <input class="send-btn" type="button" value="send" onclick="sendChat()">
    </div>
<?php else: ?>
    <div class="chat-view">
        <div class="message">
            <div class="message-div">
                <div class="message-info">
                    <p class="message-date"></p>
                    <h2 class="message-sender"></h2>
                </div>
                <div class="message-msg">
                    <p>- </p>
                    <p>You do not have any matches</p>
                </div>
            </div>
        </div>
    </div>
    <div class="message-text_field">
        <textarea class="chat-text-field" data-other_id="<?= $otherID ?>"></textarea>
        <input class="send-btn" type="button" value="send" onclick="sendChat()">
    </div>
<?php endif; ?>