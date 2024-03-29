<?php
$cookiename = "edit-profile-output";
$msg = "";
$class = "";
$cookiemsg = [0 => "", 1 => ""];
if (isset($_COOKIE[$cookiename])) {
    $class = "visible";
    $cookiemsg = explode("/", $_COOKIE[$cookiename]);
    $msg = $cookiemsg[0];
    setcookie($cookiename, "", -1, "/");
} else $class = "hidden"; ?>
<?php
if (!isset($_SESSION['username'])) header("Location: ./login.php");
?>
<article class="edit-profile_form">
    <div class="edit-profile_form-borderstyle">
        <form action="../scripts/php/model_edit-profile.php" method="post" enctype="multipart/form-data">
            <h2>Dating Permit</h2>
            <div class="edit-profle_info-box">
                <div class="edit-profle_profile-text">
                    <h4 class="edit-profile_row">Your profile</h4>

                    <div class="edit-profile_row">
                        <label class="edit-profile_lc" for="">First name: </label>
                        <input class="edit-profile_rc" type="text" name="firstname" value="<?= $_SESSION['first_name']
                                                                                            ?>">
                    </div>
                    <div class="edit-profile_row">
                        <label class="edit-profile_lc" for="">Last name: </label>
                        <input class="edit-profile_rc" type="text" name="lastname" value="<?= $_SESSION['last_name']
                                                                                            ?>">
                    </div>
                    <div class="edit-profile_row">
                        <label class="edit-profile_lc" for="">Salary</label>
                        <input class="edit-profile_rc" type="number" name="salary" value="<?= $_SESSION['salary']
                                                                                            ?>">
                    </div>
                    <div class="edit-profile_row">
                        <label class="edit-profile_lc" for="">Zipcode</label>
                        <input class="edit-profile_rc" type="number" name="zipcode" value="<?= $_SESSION['zipcode']
                                                                                            ?>">
                    </div>
                </div>
                <div class="edit-profile_profile-pic">
                    <img class="profile-picture" src="
                    <?php $defaultPic = "../media/profile-pictures/default_profile_pic.png";
                    if (isset($_SESSION['profile_pic'])) {
                        $profilePic = "../media/profile-pictures/" . $_SESSION['profile_pic'];
                        if (file_exists($profilePic)) echo $profilePic;
                        else echo $defaultPic;
                    } else echo $defaultPic; ?>" alt="Profile Picture">
                    <div class="edit-profile_profile-pic-buttons">
                        <label for="fileUpload" class="edit-profile_profile-pic_upload">Upload new picture</label>
                        <input id="fileUpload" type="file" name="fileToUpload" accept="image/jpg, image/jpeg, image/png">
                        <input type="submit" name="upload-profile-pic" value="Change File">
                    </div>
                </div>
            </div>
            <div class="edit-profile_About-me">
                <div class="edit-profile_row">
                    <label class="edit-profile_lc bio" for="">Bio: </label>
                    <textarea class="edit-profile_rc bio" name="bio" maxlength="255"><?= $_SESSION['bio'] ?></textarea>
                </div>
                <div class="edit-profile_row">
                    <label class="edit-profile_lc" for="">preference</label>
                    <select class="edit-profile_rc" name="preference" id="preference_option">
                        <option value="1">Male</option>
                        <option value="2">Female</option>
                        <option value="3">Other</option>
                        <option value="4">Any</option>
                    </select>
                    <script>
                        var index = "<?= $_SESSION['preference']; ?>"
                        console.log(index)
                        document.querySelector('#preference_option').value = index
                    </script>

                </div>
                <div class="edit-profile_row">
                    <label class="edit-profile_lc" for="">Gender</label>
                    <select class="edit-profile_rc" name="gender" id="gender_option">
                        <option value="1">Male</option>
                        <option value="2">Female</option>
                        <option value="3">Other</option>
                    </select>
                    <script>
                        var index = "<?= $_SESSION['gender']; ?>"
                        console.log(index)
                        document.getElementById('gender_option').value = index
                    </script>
                </div>
                <div class="edit-profile_row">
                    <label class="edit-profile_lc">Age</label>
                    <input class="edit-profile_rc age" type="date" name="age" value="<?= $_SESSION['dob'] ?>" pattern="\d{4}-\d{2}-\d{2}">
                </div>
            </div>
            <div class="error-message <?= $class ?>">
                <p class="<?= $cookiemsg[1] ?>"><?= $msg ?></p>
            </div>
            <div class="edit-profile_AcceptChanges">
                <div class="edit-profile_AcceptChanges lc">
                    <button type="reset">Reset Changes</button>
                </div>
                <div class="edit-profile_AcceptChanges rc">
                    <button type="submit" name="submit-changes" value="update_profile">Approve Changes</button>
                </div>
            </div>
        </form>
        <form class="edit-profile_row" action="../scripts/php/model_delete-account.php" method="post">
            <input class="delete-account-passw" type="password" name="user-passw" placeholder="Your password" required>
            <button class="delete-account-button" type="submit">Delete Dating Permit</button>
        </form>
    </div>

</article>