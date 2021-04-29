<!doctype html>
<!--
Display info of Server.
-->
<html>
<?php
//This is a template code for displaying table on php.
//When using, duplicate this.
 ?>
<head><title>Test Page</title></head>
<body>
<table border=2><tr style="background-color:#AAAAAA"><td>Server info</td><td>Content</td></tr>
<?php
$serv=array('SERVER_NAME','SERVER_ADDR','SERVER_SOFTWARE','SERVER_PORT','DOCUMENT_ROOT','PHP_SELF');
foreach($serv as $sv)
echo "<tr><td>$sv</td><td>{$_SERVER[$sv]}</td></tr><br>";
?>
</table>

<table border=2><tr style="background-color:#AAAAAA"><td>Server info</td><td>Content</td></tr>
<?php
$user=array('REMOTE_ADDR','HTTP_USER_AGENT','SERVER_PROTOCOL','REQUEST_METHOD','REQUEST_URI','HTTP_REFERER');
//,'REMOTE_HOST','HTTP_REFERER','REQUEST_URI' cannot be displayed(Modified).
foreach($user as $us){
  if ($us!="HTTP_REFERER") {
    echo "<tr><td>$us</td><td>{$_SERVER[$us]}</td></tr><br>";
  }elseif(isset($_SERVER['HTTP_REFERER'])){
    echo "<tr><td>$us</td><td>{$_SERVER[$us]}</td></tr><br>";
  }else{
    $r="";
    echo "<tr><td>HTTP_REFERER</td><td>$r</td></tr><br/>";
  }
}
?>
</table><br/>
</body>
</html> 
