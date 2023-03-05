<?php 
if(isset($_POST['gender']))
{
    $gender = test_input($_POST['gender']);
}
if(isset($_POST['pref']))
{
    $pref = test_input($_POST['pref']);
}
if($_POST['salary'])
{
    $salary = test_input($_POST['salary']);
}
if($_POST['likes'])
{
    $likes = test_input($_POST['likes']);
}

?>