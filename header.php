<?php
    session_start();
    echo "<!DOCTYPE html>\n<html><head>";
    require_once 'function.php';

    $userstr = ' (Guest)';
    
    #Setting up Session
    if (isset($_SESSION['user'])){
        $user = $_SESSION['user'];
        $loggedin = TRUE;
        $userstr = "($user)";
      
    }
    else $loggedin = FALSE;
 
   
    echo "<title>$proj_name$userstr</title><link rel='stylesheet' href='styles.css' type='text/css'>".
        "</head>".
        "<body><p class='appname'>$proj_name</p>";

    if ($loggedin){
echo "<br ><ul class='menu'>" .
"<li><a href='profile.php'>Profile</a></li>".
"<li><a href='edituser.php'>Edit User</a></li>" .
"<li><a href='editcompany.php'>Edit Company</a></li>" .
"<li><a href='logout.php'>Log out</a></li></ul><br>";
    }

    else{
echo ("<br><ul class='menu'>" .
"<li><a href='index.php'>Home</a></li>" .
"<li><a href='signup.php'>Sign up</a></li>" .
"<li><a href='login.php'>Log in</a></li></ul><br>" .
"<span class='info'>&#8658; You must be logged in to " .
"view this page.</span><br><br>");
}
?>