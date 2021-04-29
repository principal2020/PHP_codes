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
</body>
</html>
