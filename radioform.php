<?php
session_start();
 ?>
<!doctype html>
<html>
<?php

//This is a template code for displaying table on php.
//When using, duplicate this.
$makers=array('HONDA','YAMAHA','SUZUKI','KAWASAKI');
 ?>
<head><title>Test Page</title></head>
<body style='margin-left:50px;'>
<h1>バイクメーカーの選択</h1><br>
<form method="POST" action="<?php $_SERVER['SCRIPT_NAME'] ?>" />

<?php
foreach ($makers as $id =>$elm){
  echo "<input type='radio' name='makers' value='{$elm}'";
  if ($id==0){
    echo "Checked";
  }
  echo " />";
  echo $elm;
}
echo "<br><br>";
?>
<input type="submit" value="送信" />
</form><br>

<?php
  if(isset($_POST['makers'])){
    $val=$_POST['makers'];
  }
  echo "選ばれたのは{$val}でした。";
 ?>
</body>
</html>
