<!doctype html>
<html>
<?php
//This is a template code for displaying table on php.
//When using, duplicate this.
$arr=array('sample.xml','sample.html','sample.php','sample.py','sample.java');
$pattern="/\.(xml|html|php)/";
 ?>
<head><title>正規表現による置換</title></head>
<body style="margin-top:50px;margin-left:100px;">
<table border=1><tr style="background-color:lightgray"><td>変換前</td><td>変換後(赤文字)</td></tr>
<?php
//echo "<tr><td>Data1</td><td>Data2</td></tr>";
foreach($arr as $elm){
  echo "<tr><td>{$elm}</td>";
  $ch=preg_replace($pattern,".txt",$elm);
  if($elm==$ch){
    echo "<td style='color:black'>{$ch}</td></tr>";
  }else{
    echo "<td style='color:red'>{$ch}</td></tr>";
  }
}
?>
</table>
</body>
</html>
