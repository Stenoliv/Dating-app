<?php 
include "./handy_methods.php";
$gender =0; 
$likes =0;
$salary =0;
$prefs =0;
if(isset($_POST['gender']))
{
    $gender = test_input($_POST['gender']);
    
}
if(isset($_POST['preference']))
{
    $prefs = test_input($_POST['preference']);
    
}
if(isset ($_POST['salary']))
{
    $salary = test_input($_POST['salary']);
    
}
if(isset($_POST['likes']))
{
    $likes = test_input($_POST['likes']);
    
}
$filter = array($gender,$prefs,$likes,$salary);
$filterjson = json_encode($filter);
setcookie('filter',$filterjson,time()+60*60*24,"/");
header('location: ../../pages/index.php');
?>