<?php
require_once 'header.php';
$error = $user = $pass = $uid = "";


if (isset($_POST['user'])) {
    $user = sanitizeString($_POST['user']);
    $pass = sanitizeString($_POST['pass']);

    #check if userid and password are null or not
    if ($user == "" || $pass == "")
        $error = "Not all fields were entered<br>";
    else {
        $result = queryMySQL("SELECT user,pass FROM user WHERE user='$user' AND pass='$pass'" );

        #check correct username and password
        
        
        if ($result->rowCount() == 0) {
            $error = "<span class='error'>Username/Password
invalid</span><br><br>";
        } else {
            $_SESSION['user'] = $user;
            $_SESSION['pass'] = $pass;
            $getid = queryMysql("SELECT id FROM user where user='$user'");
            $r = $getid->fetch(PDO::FETCH_ASSOC);
            $_SESSION['uid'] = $r['id'];
            die("You are now logged in. Please <a href='profile.php?view=$user'>" .
                "click here</a> to continue.<br><br>");
        }
    }
}
echo <<<_END
<div class="form">

<div class='main'><h3>Please enter your details to log in</h3>
<form method='post' action='login.php'>$error
<span class='fieldname'>Username</span><input type='text'
maxlength='16' name='user' value='$user'><br>
<span class='fieldname'>Password</span><input type='password'
maxlength='16' name='pass' value='$pass'>
<br>
<span class='fieldname'>&nbsp;</span>
<input type='submit' value='Login'>
</form><br></div>
_END;
?>

</body>

</html>