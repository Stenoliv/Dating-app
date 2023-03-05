<h2>Filter your results</h2>
        <form method='post' action='./model_filter.php'>
            Gender:
            <input type='radio' name='gender' <?php if (isset($gender) && $gender=='female') echo 'checked';?> value='female'>Female
            <input type='radio' name='gender' <?php if (isset($gender) && $gender=='male') echo 'checked';?> value='male'>Male
            <input type='radio' name='gender' <?php if (isset($gender) && $gender=='other') echo 'checked';?> value='other'>Other
            <br>
            Preference: 
            <input type='radio' name='preference' <?php if (isset($pref) && $pref=='female') echo 'checked';?> value='female'>Female
            <input type='radio' name='preference' <?php if (isset($pref) && $pref=='male') echo 'checked';?> value='male'>Male
            <input type='radio' name='preference' <?php if (isset($pref) && $pref=='other') echo 'checked';?> value='other'>Other
            <input type='radio' name='preference' <?php if (isset($pref) && $pref=='any') echo 'checked';?> value='any'>Any
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