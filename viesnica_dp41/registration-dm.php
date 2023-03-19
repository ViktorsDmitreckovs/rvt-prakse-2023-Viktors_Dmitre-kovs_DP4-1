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
        <input type="text" id="post" name="role" required><br>

        <label for="username">Lietotājvārds</label><br>
        <input type="text" id="username" name="username" required><br>

        <label for="password">Parole</label><br>
        <input type="password" id="pwd" name="password" required><br><br>

        <input type="submit" value="Reģistrēt" id="btn">
    </div>
</form>
</body>
</html>