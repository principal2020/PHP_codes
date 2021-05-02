<!doctype html>
<html>
<?php
function check_date($value){
  if($value==''){
    return false;
  }else{
    $preg='/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/';
    if(!preg_match($preg,$value)){
      return false;
    }else{
      return true;
    }
  }
}

//This is a template code for displaying table on php.
//When using, duplicate this.
//UserID,Calendar上のDatetime(yyyymmdd)を渡す。
 ?>
<head><title>スケジュールの編集・登録・削除</title></head>
<body style="margin-top:100px; margin-left:50px;">

<form action="./schedule.php" method="POST" >
  予定年月日：<br/><input type="text" name="date" value="" /><br/><br/>
  処理：<br/>
  登録：<input type="radio" name="process" value="register" checked="checked" />
  更新：<input type="radio" name="process" value="update" />
  削除：<input type="radio" name="process" value="delete" />
  <br/><br/>
  表題：<br/><input type="text" name="title" /><br/>
  場所：<br/><input type="text" name="place" /><br/>
  内容：<br/><textarea rows="10" cols="50" name="message" value="" ></textarea><br/>
  <input type="hidden" name="register" value="on" />
  <input type="submit" value="submit" />
</form><br/>

<!--
削除：
<form action="./schedule.php" method="POST">
  予定年月日：<br/><input type="text" name="date" value="" /><br/><br/>
  <input type="hidden" name="delflg" value="on">
  <input type="submit" name="delete" value="delete" />
</form>
-->

<?php
if(isset($_POST['date'])){
  if(!check_date($_POST['date'])){
    //echo 'Invalid date has been detected.';
    //echo $_POST['date'];
    die();
  }else{
    //echo 'Valid date!!!';
  }
}

if(isset($date)&&isset($message)){
  echo $date . $message;
}
if(isset($_POST['process'])){
  if($_POST['process']=='register'){
    if(isset($_POST['date'])&&!empty($_POST['date'])&&isset($_POST['message'])&&isset($_POST['title'])&&isset($_POST['place'])){
      if(isset($_POST['register'])&&$_POST['register']=='on'){
        try{
          $db=new PDO('mysql:host=localhost;dbname=calendar_schedule','root','');
          $db->exec("insert into schedule values('TestUser','{$_POST['date']}','{$_POST['title']}','{$_POST['place']}','{$_POST['message']}')");
          $db=null;
        }catch(PDOExcepiton $Exception){
            echo "Something wrong with the process.";
        }
      }
    }
  }
  if($_POST['process']=='update'){
    if(isset($_POST['date'])&&!empty($_POST['date'])&&isset($_POST['message'])&&isset($_POST['title'])&&isset($_POST['place'])){
      if(isset($_POST['register'])&&$_POST['register']=='on'){
        //Making sql statemnet for updating record.
        $upd="update schedule set ";
        if(!empty($_POST['title'])){
            $upd.="title = '{$_POST['title']}' ";
        }
        if(!empty($_POST['place'])&&!empty($_POST['title'])){
          $upd.=",place = '{$_POST['place']}' ";
        }elseif(!empty($_POST['place'])){
          $upd.="place = '{$_POST['place']}' ";
        }
        if(!empty($_POST['message'])&&!empty($_POST['title'])||!empty($_POST['message'])&&!empty($_POST['place'])){
          $upd.=",content = '{$_POST['message']}' ";
        }elseif(!empty($_POST['message'])){
          $upd.="content = '{$_POST['message']}' ";
        }
        $upd.="where date = '{$_POST['date']}'";
        echo $upd;
        try{
          $db=new PDO('mysql:host=localhost;dbname=calendar_schedule','root','');
          //$db->exec("update schedule set title = '{$_POST['title']}',place = '{$_POST['place']}',content = '{$_POST['message']}' where date = '{$_POST['date']}'");
          $db->exec($upd);
          $db=null;
        }catch(PDOExcepiton $Exception){
            echo "Something wrong with the process.";
        }
      }
    }
  }
  if($_POST['process']=='delete'){
    if(isset($_POST['date'])){
      try{
        $db=new PDO('mysql:host=localhost;dbname=calendar_schedule','root','');
        $db->exec("delete from schedule where date = '{$_POST['date']}'");
        $db=null;
      }catch(PDOException $Exception){
        echo "Something wrong with the process.";
      }
    }
  }
}
?>

</body>
</html>
