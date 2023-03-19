<?php
 
$user = 'root';
$password = '1306brbl*VD*';
 
$database = 'Viesnica_dp41';
 
$servername='localhost';
$mysqli = new mysqli($servername, $user, $password, $database);
	
$s_id=$_GET['id'];
	
$sql="DELETE FROM Viesnica_dp41.saraksts WHERE saraksta_ID='$s_id'";
	
$result = $mysqli->query($sql);
	
if($result)
{
	echo "<script> window.location.href = 'http://localhost/viesnica_dp41/schedule.php'
	alert('Saraksts ir dzēsts!');</script>";

}
else{
	echo "<script> window.location.href = 'http://localhost/viesnica_dp41/schedule.php'
	alert('Saraksts nav dzēsts!');</script>";
}
?>