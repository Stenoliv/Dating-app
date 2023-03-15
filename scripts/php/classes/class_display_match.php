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
    public $age = "";


    public function ShowProfile()
    {
        $this->gender = $this->turnGenderToString($this->gender);
        $this->preference = $this->turnPrefToString($this->preference);

        $dobbie = $this->age;
        $stampped = strtotime($dobbie);
        $dobnew = date("d-m-Y", $stampped);

        //lånad kod för uträkning av ålder från https://www.codexworld.com/how-to/calculate-age-from-date-of-birth-php/
        $today = date("Y-m-d");
        $display_age = date_diff(date_create($dobnew), date_create($today));

?>
        <div class="container-profile">
            <div class="container-border">
                <h2 class="center-text">matching permit</h2>
                <h3 class="profile_name center-text">User: <?= $this->username ?></h3>
                <div class="profile-info">
                    <div class="info-left">
                        <div class="info-row">
                            <label class="info-lc">Gender:</label>
                            <label class="info-rc"><?= $this->gender ?></label>
                        </div>
                        <div class="info-row">
                            <label class="info-lc">Preference:</label>
                            <label class="info-rc"><?= $this->preference ?></label>
                        </div>
                        <div class="info-row">
                            <label class="info-lc">Forename:</label>
                            <label class="info-rc"><?= $this->firstname ?></label>
                        </div>
                        <div class="info-row">
                            <label class="info-lc">Lastname:</label>
                            <label class="info-rc"><?= $this->lastname ?></label>
                        </div>

                        <div class="info-row">
                            <label class="info-lc">Age:</label>
                            <label class="info-rc"><?= $display_age->format('%y') ?></label>
                        </div>

                    </div>
                    <div class="info-picture">
                        <img class="profile-picture" src="../media/profile-pictures/<?= $this->profile_pic ?>" alt="Picture">
                    </div>
                </div>
                <div class="general-info-box">
                    <div class="general-row">
                        <label class="general-lc">Bio:</label>
                        <label class="general-rc bio-2"><?= $this->bio ?></label>
                    </div>
                    <div class="general-row">
                        <label class="general-lc">Email:</label>
                        <label class="general-rc"><?= $this->email ?></label>
                    </div>
                    <div class="general-row">
                        <label class="general-lc">Salary:</label>
                        <label class="general-rc"><?= $this->salary ?></label>
                    </div>
                </div>
                <div class="match-buttons">
                    <form class="match-form" action="../scripts/php/model_like-profile.php" method="post">
                        <input class="lbtn" type="submit" name="dislike_button" value="Decline Profile">
                        <label class="rbtn" for="like-button<?= $this->id ?>">Approve Profile</label>
                        <input style="display:none;" id="like-button<?= $this->id ?>" type="submit" name="like_button" value="<?= $this->id ?>">
                    </form>
                </div>

            </div>

        </div>
<?php
    }



    //Functions To Turn Ints To Right Strings
    private function turnGenderToString($data)
    {
        if ($data == '1') $data = "Male";
        else if ($data == '2') $data = "Female";
        else $data = "Other";
        return $data;
    }
    private function turnPrefToString($data)
    {
        if ($data == '1') $data = "Male";
        else if ($data == '2') $data = "Female";
        else if ($data == '3') $data = "Other";
        else $data = "Any";
        return $data;
    }
}
