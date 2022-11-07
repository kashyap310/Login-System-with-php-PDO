<?php 

$db_name="mysql:host=localhost;dbname=Company";
$dbuser="root";
$dbpass="";
$proj_name="PriceSeries";

#PDO Connection
try {
    $connection = new PDO($db_name,$dbuser,$dbpass);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
}
catch(Exception $e) {
    echo 'Exception -> ';
    var_dump($e->getMessage());
    die();
}




function queryMysql($query){
    global $connection;
    $result = $connection->query($query);
    
    if (!$result) die();
     return $result;
}
function destroySession(){
    $_SESSION=array();
    if(session_id() != "" || isset($_COOKIE[session_name()]))
        setcookie(session_name(), '', time()-259200, '/');
    session_destroy();
}

function sanitizeString($var)
{
global $connection;
$var = strip_tags($var);
$var = htmlentities($var);
$var = stripslashes($var);
return $var;
}



?>