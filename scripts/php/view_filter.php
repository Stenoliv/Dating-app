<h2>Filter your results</h2>
        <form method='post' action='./index.php'>
            Gender:
            <input type='radio' name='gender' <?php if (isset($gender) && $gender=='female') echo 'checked';?> value='2'>Female
            <input type='radio' name='gender' <?php if (isset($gender) && $gender=='male') echo 'checked';?> value='1'>Male
            <input type='radio' name='gender' <?php if (isset($gender) && $gender=='other') echo 'checked';?> value='3'>Other
            <br>
            Preference: 
            <input type='radio' name='preference' <?php if (isset($pref) && $pref=='female') echo 'checked';?> value='2'>Female
            <input type='radio' name='preference' <?php if (isset($pref) && $pref=='male') echo 'checked';?> value='1'>Male
            <input type='radio' name='preference' <?php if (isset($pref) && $pref=='other') echo 'checked';?> value='3'>Other
            <input type='radio' name='preference' <?php if (isset($pref) && $pref=='any') echo 'checked';?> value='4'>Any
            <br>
            Salary:
            <input type='number' name='salary' value=''>
            <br>
            Likes:
            <input type='number' name='likes' value=''>
            <br>
            <input type="submit" name="submit" value="Filter">
        </form>
        <br>