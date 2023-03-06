<?php
class ModelMatchProfile
{
    public $id = "";
    public $username = "";
    public $firstname = "";
    public $lastname = "";
    public $email = "";
    public $salary = "";
    public $bio = "";
    public $gender = "";
    public $preference = "";
    public $profile_pic = "";
    public $zipcode = "";

    public function ShowProfile()
    {
        $this->gender = $this->turnGenderToString($this->gender);
        $this->preference = $this->turnPrefToString($this->preference);

?>
        <div class="container-profile hidden">
            <h3 class="profile_name"><?= $this->username ?></h3>
            <p class="bio">Bio: <?= $this->bio ?></p>
            <p>Preference: <?= $this->preference ?></p>
            <p>Gender: <?= $this->gender ?></p>
            <form action="../scripts/php/model_like-profile.php" method="post">
                <input type="submit" name="Dislike" value="Decline">
                <label for="like_button">Like Profile</label>
                <input id="like_button" style="display:none;" type="submit" name="Like" value="<?= $this->id ?>">
            </form>
        </div>
<?php
    }



    //Functions To Turn Ints To Right Strings
    private function turnGenderToString($data) {
        if ($data == '1') $data = "Male";
        else if ($data == '2') $data = "Female";
        else $data = "Other";
        return $data;
    }
    private function turnPrefToString($data) {
        if ($data == '1') $data = "Male";
        else if ($data == '2') $data = "Female";
        else if ($data == '3') $data = "Other";
        else $data = "Any";
        return $data;
    }
}
