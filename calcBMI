<?php
session_start();
if(!empty($_POST['weight'])&&!empty($_POST['height'])){
  $weight=$_POST['weight'];
  $height=$_POST['height'];
  $BMI=$weight/($height*$height);
  $BMI=round($BMI,2);
  $_SESSION['BMI']=$BMI;
  $_SESSION['weight']=$weight;
  $_SESSION['height']=$height;
  //echo $BMI;
  header("Location: calcBMI.php");
}else{
?>
<!DOCTYPE html>
<html>
<head>
  <title>Bmi calcurater</title>
</head>
<h3>BMI calcurater</h3><br />
<p>Check your health conditon so that you can avoid to go bad.</p>
<body bgcolor="lightblue" style="margin-left:50px;" >

<form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="POST">
  Input your weight : <br />
  <input type="text" name="weight" /><br />
  Input your Height : <br />
  <input type="text" name="height" />
  <input type="submit" value="Submit">
</form><br />

<?php
//echo $_SERVER['SCRIPT_NAME'];
function reflesh(){
  $_SESSION['hight']=null;
  $_SESSION['weight']=null;
  $_SESSION['BMI']=null;
  $height=null;
  $weight=null;
  $BMI=null;
}
if(!empty($_POST['reflesh'])){
  reflesh();
}
?>

<?php
if(!empty($_SESSION['BMI'])){
  $BMI=$_SESSION['BMI'];
  $height=$_SESSION['weight'];
  $weight=$_SESSION['height'];
  $now=date('Y/m/d H:i:s');
  echo "\r\nYour BMI is {$BMI}.<br /><br />" ;

  //Add function which cah store health info to the database.
  /*=======================================================
  == Add record SECTION ===================================
  =======================================================*/
  if(!empty($_POST['save'])){
    //echo $_POST['save'];
    //save health info to db.
    $dbn="mysql:dbname=library;host=localhost;charset=utf8";
    $username="root";
    $password="";
    try{
      $db=new PDO($dbn,$username,$password);
    }catch(Exception $error) {
      die("Connection failed." . $error->getMessage());
    }
    try{
      $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      $db->beginTransaction();
      //$statement=$db->prepare("Select * from test");
      //$statement->execute();
      $statement=$db->prepare("insert into bmi(date,height,weight,bmi) values (?,?,?,?)");
      $statement->execute(array($now,$height,$weight,$BMI));
      $db->commit();
      echo "Transaction succeded!!<br />";
    }catch(Exception $error){
      $db->rollback;
      echo "Incomplete transtaction." .$error->getMessage();
    }
  }

  if(!empty($BMI)){
    if($BMI<18.5){
      echo "You are too thin.<br />";
    }elseif(18.5>=$BMI || $BMI<=25.0){
      echo "Your weight is in normal range. Keep your body the same.<br />";
    }else{
      echo "You should exersize everyday or change what you eat.<br /> I recomend you to conduct a doctor, if not.<br />";
    }
  }else{
    //no process
  }
}
?>
<br />
<form action="<?php echo $_SERVER['SCRIPT_NAME'];?>" method="POST">
  <input type="hidden" name="save" value="save">
  <input type="submit" value="Save">
</form>
<br />
<form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="POST" >
  <input type="hidden" name="reflesh" value="reflesh" />
  <input type="submit" value="Reflesh">
</form>

<?php } ?>
<br />
<form action="show_history.php">
  <input type="submit" value="Show history">
</form>
</body>
</html>
