<?php
$id =0;
if(isset($_COOKIE['viewdprof']))
{
    $id = $_COOKIE['viewdprof'];
}


if(isset($_SESSION['username']))
{
    include "../scripts/php/model_filter.php";
    
    foreach($result as $value)
    {
        print("<div class = 'ads'> <p>".$value['username']."</p>"."<p>".$value['first_name']."</p>"."<p>".$value['last_name']."</p>".
        "<p>".$value['bio']."</p>"."<p>".$value['salary']."</p>"."<p>".$value['email']."</p>".
        "<p>".$value['likes']."</p>");

        if($value['gender']==1) $gender = "Male"; 
        elseif($value['gender']==2) $gender = "Female";
        elseif($value['gender']==3) $gender = "Other";
        print("<p>".$gender."</p>");

        if($value['preference']==1) $pref = "Male";
        elseif($value['preference']==2) $pref = "Female";
        elseif($value['preference']==3) $pref = "other";
        elseif($value['preference']==4) $pref = "Any";
        print("<p>".$pref."</p></div>");
    }
}
else
{
    $sql = "SELECT * FROM profiles WHERE id>$id ORDER BY id LIMIT 4" ;
    $stmt = $conn->query($sql);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if($stmt->rowCount()<=0) 
    {
        setcookie("viewdprof","",-1);
        header('location: ./index.php');
    }
    setcookie('viewdprof',$result[array_key_last($result)]['id'],time()+60*60*24*30*4);
    foreach($result as $value)
    {
        print("<div class = 'ads'> <p>".$value['username']."</p>"."<p>".$value['first_name']."</p>"."<p>".$value['last_name']."</p>"."<p>".$value['bio']."</p>");
        if($value['gender']==1) $gender = "Male"; 
        elseif($value['gender']==2) $gender = "Female";
        elseif($value['gender']==3) $gender = "Other";
        print("<p>".$gender."</p></div>");
    }
}
?>