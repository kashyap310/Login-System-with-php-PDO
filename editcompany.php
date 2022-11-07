<?php
require_once 'header.php';
if (!$loggedin)
    die();
if(isset($_SESSION['uid'])){
echo "<div class='main'><h3>Edit your company profile</h3>";
$result = queryMysql("SELECT * FROM companyinfo WHERE id ={$_SESSION['uid']}");
$r = $result ->fetch(PDO::FETCH_ASSOC);

echo <<<_END
    <div class='form'>
    <form method="post" action="done.php">
    <span class='fieldname'>User Id</span>
    <input type="text" placeholder = {$r['id']} readonly><br>
   
    <span class='fieldname'> company name</span>
    <input type="text" placeholder = {$r['cname']} name='editcname' value={$r['cname']}><br>
    
    <span class='fieldname' style='margine-bottom=2px;'>Company Description</span><br>
    <textarea  rows=3 cols=50  name='editcdesc' >{$r['cdesc']}</textarea><br>
   
    <span class='fieldname'>&nbsp;</span>
   
    <input type='submit' name="companyedit" value='edit'>  
    </form>
    </div>

 _END;
}
?>
