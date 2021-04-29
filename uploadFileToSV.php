<!doctype html>
<html>
<?php
//This is a template code for displaying table on php.
//When using, duplicate this.
 ?>
<head><title>Test Page</title></head>
<body>
<form enctype="multipart/form-data" action="http://localhost:8080/php_practice/send/sendFileToServer.php" method="POST">
File Name：<input type="file" name="targetFile" /><br/>
<input type="submit" value="submit" />
</form>
<?php
if(isset($_FILES['targetFile']['tmp_name'])){
  $filename="./upload_" . $_FILES['targetFile']['name'];
  if(move_uploaded_file($_FILES['targetFile']['tmp_name'],$filename)){
    echo 'The file was sent.<br/>';
  }else{
    echo 'Failed to send...<br/>';
  }
}
?>
</table>
</body>
</html>
