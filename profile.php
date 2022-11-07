<?php
require_once 'header.php';
if(!$loggedin) die();
if (isset($_SESSION['uid']))
{
$user_result = queryMysql("SELECT * FROM user where id={$_SESSION['uid']}");
$u_r = $user_result -> fetch(PDO::FETCH_ASSOC);
$c_result = queryMysql("SELECT * FROM companyinfo where id={$_SESSION['uid']}");
$c_r = $c_result -> fetch(PDO::FETCH_ASSOC);

}
if ($u_r['usertype']==0) $utype=" Normal User";
else $utype="Admin";

#Display all information about User/Admin
echo <<<_END

<div class="table main">
<h3> {$utype} Profile</h3>
<table border=1 style="border-collapse: collapse;">
<tr>
<th>User Id</th>
<td>{$u_r['id']}</td>
</tr>
<tr>
<th>User type</th>
<td>{$utype}</td>
</tr>
<tr>
<th>Login name</th>
<td>{$u_r['user']}</td>
</tr>
<tr>
<th>Your Name</th>
<td>{$u_r['name']}</td>
</tr>
<tr>
<th>Email</th>
<td>{$u_r['email']}</td>
</tr>

<tr>
<th>Company Name</th>
<td>{$c_r['cname']}</td>
</tr>
<tr>
<th>Description</th>
<td>{$c_r['cdesc']}</td>
</tr>
</table><br>
</div>

_END

?>