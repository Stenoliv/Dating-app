<?php
// Start the session
session_start();
// Allt möjligt viktigt som vi använder ofta, sessionshantering, form validation etc.

// En funktion som tar bort whitespace, backslashes (escape char) och gör om < till html safe motsvarigheter
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Databaskonfiguration
$servername = "localhost";
$dbname = "bistromd";
$username = "bistromd";
include "hemlis.php";
// hemlis.php ser ut såhär:
// <?php $password = "sup3rh3mlis";


?>