<h2 class="filtertitle">Filter your results</h2>
<button class="openfilter">Open filter</button>
        <form class= 'filter' method='post' action='../scripts/php/model_filter.php' style="display: none;">
            Filter according to gender
            <select class='filteropt' name='gender'>
                <option value="0">Gender</option>
                <option value="1">Male</option>
                <option value="2">Female</option>
                <option value="3">Other</option>
            </select>
            <br>
            Filter according to preference 
            <select class='filteropt' name='preference'>
                <option value="0">Preference</option>
                <option value="1">Male</option>
                <option value="2">Female</option>
                <option value="3">Other</option>
                <option value="4">Any</option>
            </select>
            <br>
            Order by salary
            <select class='filteropt' name='salary'>
                <option value="0">Order by salary</option>
                <option value="1">High to low</option>
                <option value="2">Low to high</option>
            </select>
            <br>
            Order by likes
            <select class='filteropt' name='likes'>
                <option value="0">Order by likes</option>
                <option value="1">High to low</option>
                <option value="2">Low to high</option>
            </select>
            <br>
            <input class='filteropt' type="submit" name="submit" value="Filter">
        </form>
        <br>