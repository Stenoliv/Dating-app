<?php
$cookieName = 'match_lastViewedID';

if(isset($_COOKIE[$cookieName])) {
    setcookie($cookieName, '', -1, "/");
}

echo "Testing!";