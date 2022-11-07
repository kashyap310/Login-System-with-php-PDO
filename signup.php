<?php
require_once 'header.php';
$error = $user = $pass = "";
$name = $email = $cname = $cdesc = "";


if ($loggedin)
    destroySession();
if (isset($_POST['user'])) {
    $user = sanitizeString($_POST['user']);
    $pass = sanitizeString($_POST['pass']);
    $uid = (int) date("yHid"); 
    $utype = sanitizeString($_POST['utype']); #TRUE = ADMIN / FALSE = NORMAL USER
    $name = sanitizeString($_POST['name']);
    $email = sanitizeString($_POST['email']);
    $cname = sanitizeString($_POST['cname']);
    $cdesc = sanitizeString($_POST['cdesc']);
 

    if ($user == "" || $pass == "")
        $error = "Not all fields were entered<br><br>";
    else {
       
    
        $result = queryMysql("SELECT * FROM user WHERE user='$user'");
        if ($result->rowCount())
            #If User already exists
             $error = "<span id='alert' hidden>&#10060 This username already exists</span><script typetype='text/javascript'>alert(document.getElementById('alert').innerHTML);</script>";
          
        else {
          
            queryMysql("INSERT INTO user VALUES('$uid','$user', '$pass','$name','$email',$utype)");
            queryMysql("INSERT INTO companyinfo VALUES('$uid','$cname','$cdesc')");
            
            die("<h4>Account created</h4>Please Log in.<br><br>");
            
        }
    }
}
echo <<<_END
<div class="form">
<form  method='post' action='signup.php'>
<label for="utype" style="align-text:left">Select user type : </label>
<input type="radio" value=TRUE name="utype" style="width: 20px;" >Admin
<input type="radio" value=FALSE name="utype" style="width: 20px;" required>Normal User<br>

<label for="name" class='fieldname'>Your name</label>
<input type='text' name='name' value='$name' required><br>

<span class='fieldname'>Login name</span>
<input type='text' maxlength='16' name='user' value='$user'>$error<br>

<span class='fieldname'>Password</span>
<input type='text' maxlength='16' name='pass' value='$pass' required><br>

<span class='fieldname'>Email</span>
<input type="text" name='email' required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" value='$email'><br>

<span class='fieldname'>Company name</span>
<input type='text' name='cname' value='$cname' required><br>

<span class='fieldname'>Company Description</span><br>
<textarea name="cdesc" rows=3 cols=50 value='$cdesc' required>{$cdesc}</textarea><br>

<span id='info'></span><br>
<span class='fieldname'>&nbsp;</span>
<input type='submit' value='Sign up'>
</form>
</div>
_END;

?>


</body>

</html>