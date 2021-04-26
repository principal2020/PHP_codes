<!--
カレンダーを出力するPHPのコードのテスト。
土日を赤文字で表示する以外は、本に掲載されているサンプルのまんま。
-->
<!doctype html>
<html>
<head>
  <title>Test Page</title>
  <style type="text/css">
  th{
    height: 10px;
    width: 70px;
    background-color: #AAAAAA;
  }
  td{
    font-family: Verdana;
    font-size: 15px;
    height: 50px;
    width: 70px;
  }
  td.today{
    font-size: 25px;
    font-weight:bold;
    background-color: #AAAAAA;
  }
  </style>
</head>
<body style='margin-left:50px;'>
<h1>カレンダーの作成</h1><br>
<?php
$tm=time(); //現在時刻
$dt=getdate($tm); //現在時刻の取得
$fm=mktime(0,0,0,$dt["mon"],1,$dt["year"]); //月の最初の日.
$fw=date("w",$fm); //週の最初の日
$ld=date("t",$tm); //月の最後の日

$wd=array("日","月","火","水","木","金","土"); //各曜日の配列を作成

echo "<h2>" . $dt['month'] . "," . $dt['year'] . "</h2>"; //現在の月と年を表示

echo "<table border=\"2\">";

//先頭行、日～月曜日までを表示
echo "<tr>";
$hol=1;
$k=0;
foreach($wd as $value){
  if($value=="土"||$value=="日"){
      echo "<th style=\"color: red;\">{$value}</th>";
      $holiday[$k]=$hol; //土日の列の数値を配列に格納する。
      $k++;
  }else{
      echo "<th>{$value}</th>";
  }
  $hol++;
}
echo "</tr>";

echo "<tr>";
//月の最初の曜日までは空のセル
$r=1; //各行の累計をカウントするための変数。
for($i=0;$i<$fw;$i++){
  echo "<td></td>";
  $r++;
}
for($j=1;$j<=$ld;$j++){
  if($j==$dt["mday"]){
    echo "<td class=\"today\">{$j}</td>";
  //$holiday配列の値と列の値が等しければ
}elseif($holiday[0]==$r||$holiday[1]==$r){
    echo "<td style=\"color: red\">{$j}</td>";
  }else{
    echo "<td>{$j}</td>";
  }
  //7の剰余が0の場合、折り返す(改行する)
  $r++;
  if(($j+$i)%7==0){
    print "</tr><tr>";
    $r=1;
  }
}

echo "</tr>";
echo "</table>";

?>
</body>
</html>
