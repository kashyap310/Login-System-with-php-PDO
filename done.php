<?php
require_once 'header.php';
if(!$loggedin) die();
if (isset($_SESSION['uid']))
{
#update company information
if(isset($_POST['companyedit'])){
// echo $_POST['editcname']."<br>";
// echo $_POST['editcdesc']."<br>";
$cname=sanitizeString($_POST['editcname']);
$cdesc=sanitizeString($_POST['editcdesc']);

queryMysql("UPDATE companyinfo SET cname='$cname', cdesc='$cdesc' where id={$_SESSION['uid']}");

}

#update user information
if(isset($_POST['useredit'])){
    // echo $_POST['editemail']."<br>";
    // echo $_POST['editname']."<br>";
    $name = sanitizeString($_POST['editname']);
    $email = sanitizeString($_POST['editemail']);
    queryMysql("UPDATE user SET email='$email', name='$name' where id={$_SESSION['uid']}");
    echo "<h3>Successfully update your Data</h3>";
}
}
echo "<h3>Successfully update your Data &nbsp<a href='profile.php'>Click here </a> to continue</h3>";

?>