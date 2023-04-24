<?php

$user = 'root';
$password = '1306brbl*VD*';
$database = 'Viesnica_dp41';
$servername='localhost';

session_start();

$data=new mysqli($servername,$user,$password,$database);
if($data===false)
{
     die("connection error");
}

$sql1 = "Select lomas_ID, lomas_nosaukums 
From Viesnica_dp41.lomas";
$result1 = $data->query($sql1);

if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$name=$_POST["name"];
	$surname=$_POST["surname"];
	$personcode=$_POST["personcode"];
	$role=$_POST["role"];
	$username=$_POST["username"];
	$password=$_POST["password"];
	
	$sql="SELECT * FROM darbinieks WHERE (vards='".$name."' AND uzvards='".$surname."') 
	OR lietotajvards='".$username."'";
	
	$check = mysqli_query($data, $sql);
	
	$result=mysqli_num_rows($check);
	
	
	if($result>0){
		echo '<script type="text/javascript">alert("Jau ir tāds lietotājs")</script>';
	}
	else if(preg_match('~[0-9]+~', $name) || preg_match('~[0-9]+~', $surname)){
		echo '<script type="text/javascript">alert("Vārda vai uzvārda ir cipari")</script>';
	}
	else if(preg_match("/[a-z]/i", $personcode)){
		echo '<script type="text/javascript">alert("Personas koda ir burti")</script>';
	}
	else{
		$sql="INSERT INTO Viesnica_dp41.darbinieks(vards, uzvards, personas_kods, lietotajvards, parole, loma) 
	    VALUES ('$name','$surname','$personcode','$username','$password','$role')";
		
		$result = $data->query($sql);
		
		if($result){
            echo "<script> window.location.href = 'http://localhost/viesnica/login-dm.php';
            alert('Izveidots jauns lietotājs')</script>";
		}
		
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
    <link rel="stylesheet" href="static/style-dark-mode.css">
</head>
<body>
<form action="#" method="POST">
    <div class="registration-header">
        <h1>Reģistrācija</h1>
    </div>

    <div class="registration-input">
        <label for="name">Vārds</label><br>
        <input type="text" id="name" name="name" required><br>

        <label for="surname">Uzvārds</label><br>
        <input type="text" id="surname" name="surname" required><br>
		
		<label for="surname">Personas kods</label><br>
        <input type="text" id="personcode" name="personcode" required><br>

        <label for="post">Loma</label><br>
        <div>
            <select name="role" id="post">
            <?php
            while($row1 = mysqli_fetch_array($result1)){
                echo "<option value=".$row1['lomas_ID'].">".$row1['lomas_nosaukums']."</option>";
            }
                
            ?>
            </select>
        </div>

        <label for="username">Lietotājvārds</label><br>
        <input type="text" id="username" name="username" required><br>

        <label for="password">Parole</label><br>
        <input type="password" id="pwd" name="password" required><br><br>

        <input type="submit" value="Reģistrēt" id="btn">
    </div>
</form>
</body>
</html>