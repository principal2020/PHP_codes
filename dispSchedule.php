<!doctype html>
<html>
<?php
//This is a template code for displaying table on php.
//When using, duplicate this.

 ?>
<head><title>Test Page</title></head>
<body>
<table border=1><tr style="background-color:lightgray"><td>予定日</td><td>表題</td><td>場所</td><td>本文</td></tr>
<?php

//Set connection info.
$conn='mysql:host=localhost;dbname=calendar_schedule';
$username='root';
$password='';

//Create new instance of PDO.
try{
  $db=new PDO($conn,$username,$password);
  $statement='select * from schedule';
  $query=$db->query($statement);
}catch(PDOExcepiton $Exception){
  echo 'Something wrong with db process....';
}

while($value=$query->fetch()){
  $date=$value["date"];
  $title=$value["title"];
  $place=$value["place"];
  $content=$value["content"];
  $temp=array($date,$title,$place,$content);
  echo "<tr>";
  foreach($temp as $elm){
      echo "<td>{$elm}</td>";
  }
  echo "</tr>";
}

?>
</table>
</body>
</html>
