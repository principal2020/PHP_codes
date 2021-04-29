<!doctype html>
<html>
<?php
//This is a template code for displaying table on php.
//When using, duplicate this.

//To make this code work, should change php.ini setting.
 ?>
<head><title>Test Page</title></head>
<body>
<form action="http://localhost:8080/php_practice/sendmail/sendmail.php" method="POST">
TO：<input type="text" name="sendto" /><br/>
Subject：<input type="text" name="subject" /><br/>
<textarea rows="10" cols="50" name="message"></textarea><br />
<input type="submit" value="submit" />
</form>
<?php
if(isset($_POST['sendto'])){
  $sendto=$_POST['sendto'];
}
if(isset($_POST['subject'])){
  $subject=$_POST['subject'];
}else{
  $subject=null;
}
if(isset($_POST['message'])){
  $message=$_POST['message'];
}else{
  $message=null;
}

$header="Content-Type: text/plain;charset=ISO-2022-JP";

mb_language("ja");

$subject=mb_convert_encoding($subject,'JIS','UTF-8');
$message=mb_convert_encoding($message,'JIS','UTF-8');

if(isset($_POST['sendto'])){
  if(mb_send_mail($sendto,$subject,$message,$header)){
    echo "Message was sent.<br/>";
  }else{
    echo "Failed to send...<br/>";
  }
}
?>
</table>
</body>
</html>
