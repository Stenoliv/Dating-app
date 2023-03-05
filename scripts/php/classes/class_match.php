<?php
class matched_user
{
    public $userid = "";
    public $name = "";
    public $pic = "";

    public function createLink()
    {
        echo "";?>
        <div class="match-chat-btn" data-user_id="<?= $this->userid?>">
            <p class="match-chat-name"><?= $this->name ?></p>
            <img class="match-chat-img" src="../media/profile-pictures/<?= $this->pic ?>" alt="Img">
        </div>
<?php
    }
}
