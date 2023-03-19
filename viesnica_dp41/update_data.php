<?php


    $user = 'root';
    $password = '1306brbl*VD*';
 
    $database = 'Viesnica_dp41';
 
    $servername='localhost';
    $mysqli = new mysqli($servername, $user, $password, $database);


    if(isset($_POST['update']))
	{
		$id=$_POST['id'];
		$name=$_POST['name'];
		$room=$_POST['room'];
		$date=$_POST['date'];
		$hours=$_POST['hours'];
		
		$sql= "UPDATE Viesnica_dp41.saraksts SET dzivokla_ID='$room', darbinieka_ID='$name', 
		datums='$date', ilgums='$hours' WHERE saraksta_ID='$id'";
			
		$result = $mysqli->query($sql);
			
		if($result){
			echo "<script> window.location.href = 'http://localhost/viesnica_dp41/schedule.php'
			alert('Sarakstā ir izmaiņas!');</script>";
		}
		else{
			echo "<script> window.location.href = 'http://localhost/viesnica_dp41/schedule.php'
			alert('Nav izmaiņas!');</script>";
		}
		}

	else if(isset($_POST['cancel'])){
		header('location: schedule.php');
	}
	
	else{
		echo '<script type="text/javascript">alert("Saraksts ir ievadīts nepareizi");</script>';
		echo '<a href="schedule.php">Atgriezties pie saraksts</a>';
	}


?>