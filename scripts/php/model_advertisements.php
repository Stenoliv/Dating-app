<?php
$id =0;
if(isset($_SESSION['id']))
{
    $profileid = $_SESSION['id'];
}
if(isset($_COOKIE['viewdprof']))
{
    $id = $_COOKIE['viewdprof'];
}
if(isset($_SESSION['username']))
{
    if(!isset($_COOKIE['filter']))
    {
        $gend = 0;
        $prefs = 0;
        $salary = 0;
        $likes = 0;
        $filter = array($gend,$prefs,$likes,$salary);
    }
    else
    {
        $filter = json_decode($_COOKIE['filter']); 
    }
    
    $sql = "SELECT * FROM profiles WHERE id>:lastid AND IF(:gender > 0,gender = :gender,gender=gender) 
    AND IF(:preference > 0,preference = :preference,preference=preference) 
    AND IF(:salary > 0,salary >= :salary,salary=salary)
    AND IF(:likes > 0,likes >= :likes,likes=likes) AND id!=:yourid LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':lastid'=>$id,':gender'=>$filter[0],':preference'=>$filter[1],':likes'=>$filter[2],':salary'=>$filter[3],':yourid'=>$profileid]);
    $result = $stmt ->fetchAll(PDO::FETCH_ASSOC);
    if($stmt->rowCount()<=0) 
    {
        setcookie("viewdprof","",-1);
        Print("<p>NO PROFILES FOUND</p>");
    }
    else setcookie('viewdprof',$result[array_key_last($result)]['id'],time()+60*60*24*30*4);
    

    foreach($result as $value)
    {
        $dobbie = $value['dateofbirth'] ;
        $stampped = strtotime($dobbie);
        $dobnew = date("d-m-Y",$stampped);

        //lånad kod för uträkning av ålder från https://www.codexworld.com/how-to/calculate-age-from-date-of-birth-php/
        $today = date("Y-m-d");
        $age = date_diff(date_create($dobnew), date_create($today));

        print("<div class = 'ads'> <div class='username'><p>Username: ".$value['username']."</p></div>"
        ."<div class='firstname'><p>Firstname: ".$value['first_name']."</p></div>"
        ."<div class='lastname'><p>Surname: ".$value['last_name']."</p></div>"
        ."<div class='dob'><p>Date of birth: ".$dobnew."</p></div>"
        ."<div class='age'><p>Age: ".$age->format('%y')." years old"."</p></div>"
        ."<div class='zipcode'><p>Zipcode: ".$value['zipcode']."</p></div>"
        ."<div class='bio'><p>Bio: </p><p>".$value['bio']."</p></div>"
        ."<div class='salary'><p>Salary: ".$value['salary']." Euros annually"."</p></div>"
        ."<div class='email'><p>Email: ".$value['email']."</p></div>"
        ."<div class='likes'><p>Number of likes: ".$value['likes']."</p></div>");

        if($value['gender']==1) $gender = "Male"; 
        elseif($value['gender']==2) $gender = "Female";
        elseif($value['gender']==3) $gender = "Other";
        print("<div class='gender'><p>Gender: ".$gender."</p></div>");

        if($value['preference']==1) $pref = "Male";
        elseif($value['preference']==2) $pref = "Female";
        elseif($value['preference']==3) $pref = "other";
        elseif($value['preference']==4) $pref = "Any";
        print("<div class='preference'><p>Preference: ".$pref."</p></div>");
    }
}
else
{
    $sql = "SELECT * FROM profiles WHERE id>$id ORDER BY id LIMIT 3" ;
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
        print("<p>Username</p> <p>".$value['username']."</p>"."<p>Firstname</p>"."<p>".$value['first_name']."</p>"."<p>Surname</p>".
        "<p>".$value['last_name']."</p>"."<p>Bio</p>"."<p>".$value['bio']);
        if($value['gender']==1) $gender = "Male"; 
        elseif($value['gender']==2) $gender = "Female";
        elseif($value['gender']==3) $gender = "Other";
        print("<p>Gender</p><p>".$gender."</p>");
    }
}
?>