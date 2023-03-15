<?php
class view_profile
{
    public $username = "";
    public $profilepic = "";

    public function display_like() {
        ?>
        <div class="like">
            <span class="like-user"><?= $this->username ?> likes you!</span>
            <img class="like-img" src="../media/profile-pictures/<?php if($this->profilepic != 'default_profile_pic.png') echo $this->profilepic; else echo 'default_profile_pic.png'; ?>" alt="Pic">
        </div>
        <?php
    }
}