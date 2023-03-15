<?php
$cookieName = 'viewdprof';

if(isset($_COOKIE[$cookieName])) {
    setcookie($cookieName, '', -1, "/");
}