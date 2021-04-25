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
<h1>国内バイクメーカーの特徴</h1><br>
<?php

echo "<form method='POST'><select name='ms_maker'>";
foreach($makers as $elm){
  echo "<option >{$elm}</option>";
}
echo "</select><br><br><input type='submit' value='表示'/><input name='checked' type='hidden' value='OK' /></form>";
if(isset($_POST['ms_maker'])){
    $_SESSION['ms_maker']=$_POST['ms_maker'];
}

if (isset($_SESSION['ms_maker'])&&isset($_POST['checked'])){
    echo "<br>特徴：<br>";
    switch ($_SESSION['ms_maker']){
      case 'HONDA':
        print("多用なラインナップが特徴です。");
        break;
      case 'YAMAHA':
        print("スタイリッシュなデザイン、乗りやすさが特徴です。");
        break;
      case 'SUZUKI':
        print("人を選ぶユニークなデザインが多いのが特徴です。");
        break;
      case 'KAWASAKI':
        print("様々な道路に対応した車種を展開しているのが特徴です。");
      break;
    }
}

?>
</table>
</body>
</html>
