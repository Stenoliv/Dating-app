<?php 
$gender =""; 
$likes ="";
$salary ="";
$prefs ="";
$genderbool = 0;
$prefbool = 0;
$likesbool = 0;
$salarybool = 0;
if(isset($_POST['gender']))
{
    $gender = test_input($_POST['gender']);
    $genderbool = 1;
}
if(isset($_POST['preference']))
{
    $prefs = test_input($_POST['preference']);
    $prefbool = 1;
}
if(isset ($_POST['salary']))
{
    $salary = test_input($_POST['salary']);
    $salarybool = 1;
}
if(isset($_POST['likes']))
{
    $likes = test_input($_POST['likes']);
    $likesbool = 1;
}
$sql = "SELECT * FROM profiles WHERE IF(? = 1,gender = ?,gender=gender) 
AND IF(? = 1,preference = ?,preference=preference) 
AND IF(? = 1,salary >= ?,salary=salary)
AND IF(? = 1,likes >= ?,likes=likes)ORDER BY id LIMIT 5";
$stmt = $conn->prepare($sql);
$stmt->execute([$genderbool,$gender,$prefbool,$prefs,$salarybool,$salary,$likesbool,$likes]);
$result = $stmt ->fetchAll(PDO::FETCH_ASSOC);
if($stmt->rowCount()<=0) 
    {
        setcookie("viewdprof","",-1);
        header('location: ./index.php');
    }
?>