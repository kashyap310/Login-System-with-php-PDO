<?php
require_once 'header.php';
echo "<br><span class='main'>Welcome,&nbsp ";
if ($loggedin) echo " {$userstr}, you are logged in.";
else echo '</span><span> please sign up and/or log in to join in.</span>';

?>
</span><br><br>
</body>
</html>