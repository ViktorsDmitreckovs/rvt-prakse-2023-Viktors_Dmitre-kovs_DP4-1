<?php

$user = 'root';
$password = '1306brbl*VD*';
$database = 'Viesnica_dp41';
$servername='localhost';

session_start();

$data=mysqli_connect($servername,$user,$password,$database);
if($data===false)
{
     die("connection error");
}

if($_SERVER["REQUEST_METHOD"]=="POST")
{
      $username=$_POST["username"];
      $password=$_POST["password"];
	  
	  $sql="SELECT * FROM darbinieks WHERE lietotajvards= '".$username."' AND parole= '".$password."'";
	  
	  $result=mysqli_query($data,$sql);
	  
	  $row=mysqli_fetch_array($result);
	  
	  if (isset($row["loma"])){
        $row = $row["loma"];
	  }
	  
	  if($row=="2")
	  {   
          $_SESSION["username"]=$username;
	      header("location:scheduleWorkers.php");
	  }
	  
	  else if($row=="1")
	  {
		  $_SESSION["lietotajvards"]=$username;
	      header("location:schedule.php");
	  }
	  else
	  {
	      echo '<script type="text/javascript">alert("Lietotājvārds vai parole nav pareiza");</script>';
	  }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="static/style.css">
</head>
<body>
<form action="#" method="POST">
    <div class="login-header">
        <h1>Pieslēgties</h1>
    </div>

    <div class="login-input">
        <label for="username">Lietotājvārds</label><br>
        <input type="text" id="username" name="username" ><br>

        <label for="lname">Parole</label><br>
        <input type="password" id="pwd" name="password" ><br><br>

        <a id="FonsBTN" href="login-dm.php">Mainīt fonu</a>

        <input type="submit" value="Pieteikties" id="btn" name="submit">
        
        <div class="links">
            <a id="RegistracijaBTN" href="registration.php">Izveidot jaunu kontu</a>
        </div>

    </div>
</form>
</body>
</html>