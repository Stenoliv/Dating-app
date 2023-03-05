<?php
class likeProfile
{

    public $likedId = "";
    public $user_id = "";

    public function likeProfile($conn)
    {
        $sql = "SELECT * FROM likes WHERE liked_user_id=? AND user_id=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$this->user_id, $this->likedId]);

        if ($stmt->rowCount() == 1) {
            echo "MATCH";
            $sql = "UPDATE likes SET Matched = 1 WHERE user_id=?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$this->likedId]);

            $sql = "INSERT INTO likes (user_id, liked_user_id, Matched) VALUES (?,?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$this->user_id, $this->likedId,1]);

            $sql = "INSERT INTO chats (FromUser, ToUser) VALUES (?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$this->user_id,$this->likedId]);
            


            header("Location: ../../pages/match.php");
        } else {
            echo "LIKED";
            $sql = "INSERT INTO likes (user_id, liked_user_id) VALUES (?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$this->user_id, $this->likedId]);


            
            header("Location: ../../pages/match.php");
        }
    }
}

class dislikeProfile
{
    public $likedId = "";
    public $user_id = "";

    public function likeProfile($user, $liked)
    {
    }
}
