<?php
require_once 'header.php';
if(!$loggedin) die();
if (isset($_SESSION['uid']))
{
    
$result = queryMysql("SELECT * FROM user WHERE id={$_SESSION['uid']}");
$r = $result ->fetch(PDO::FETCH_ASSOC);

#Assign user type based on form
if ($r['usertype']==0) $utype="Normal User";
else $utype="Admin";
echo <<<_END
    <div class='main'><h3>Edit your company profile</h3>
    <div class='form'>
    <form method="post" action="done.php">
    <span class='fieldname'>User Id</span>
    <input type="text" placeholder = {$r['id']} } readonly><br>


    <span class='fieldname'>Login name</span>
    <input type="text" placeholder = {$r['user']} } readonly><br>
   
    <span class='fieldname'>User Type</span>
    <input type="text" placeholder = {$utype}   readonly><br>
    
    <span class='fieldname'>Your name</span>
    <input type="text" placeholder = {$r['name']} name='editname' value={$r['name']}><br>

    
    <span class='fieldname'>Email </span>
    <input type="text" placeholder = {$r['email']} name='editemail' value={$r['email']}  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" ><br>

    
    
    <span class='fieldname'>&nbsp;</span>
   
    <input type='submit' name="useredit" value='edit'>  
    </form>
    </div>

 _END;

}
?>