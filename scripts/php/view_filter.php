<h2>Filter your results</h2>
        <form method='post' action='../scripts/php/model_filter.php'>
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
            <select name='salary'>
                <option value="0">Order by salary</option>
                <option value="1">High to low</option>
                <option value="2">Low to high</option>
            </select>
            <br>
            Likes:
            <select name='likes'>
                <option value="0">Order by likes</option>
                <option value="1">High to low</option>
                <option value="2">Low to high</option>
            </select>
            <br>
            <input type="submit" name="submit" value="Filter">
        </form>
        <br>