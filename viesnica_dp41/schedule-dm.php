<?php
 
$user = 'root';
$password = '1306brbl*VD*';
 
$database = 'Viesnica_dp41';
 
$servername='localhost';
$mysqli = new mysqli($servername, $user,
                $password, $database);
 
if ($mysqli->connect_error) {
    die('Connect Error (' .
    $mysqli->connect_errno . ') '.
    $mysqli->connect_error);
}
 
$sql = "Select Viesnica_dp41.saraksts.saraksta_ID AS saraksts, CONCAT_WS(' ',Viesnica_dp41.darbinieks.vards, Viesnica_dp41.darbinieks.uzvards)
AS darbinieks, Viesnica_dp41.viesnica.nosaukums, Viesnica_dp41.saraksts.dzivokla_ID, Viesnica_dp41.saraksts.datums,
Viesnica_dp41.dzivoklis.dzivokla_numurs AS telpa, Viesnica_dp41.dzivoklis.stavs AS stavs
From Viesnica_dp41.darbinieks
inner join Viesnica_dp41.saraksts
on Viesnica_dp41.darbinieks.darbinieka_ID = Viesnica_dp41.saraksts.darbinieka_ID
inner join Viesnica_dp41.dzivoklis
on Viesnica_dp41.saraksts.dzivokla_ID = Viesnica_dp41.dzivoklis.dzivokla_ID
inner join Viesnica_dp41.viesnica
on Viesnica_dp41.viesnica.viesnicas_ID = Viesnica_dp41.dzivoklis.viesnicas_ID
ORDER BY Viesnica_dp41.saraksts.saraksta_ID";
$result = $mysqli->query($sql);

if(isset($_GET['search']))
{
	$text=$_GET['search_text'];
	
	$sql="Select Viesnica_dp41.saraksts.saraksta_ID AS saraksts, CONCAT_WS(' ',Viesnica_dp41.darbinieks.vards, Viesnica_dp41.darbinieks.uzvards)
          AS darbinieks, Viesnica_dp41.viesnica.nosaukums, Viesnica_dp41.saraksts.dzivokla_ID, Viesnica_dp41.saraksts.datums,
          Viesnica_dp41.dzivoklis.dzivokla_numurs AS telpa, Viesnica_dp41.dzivoklis.stavs AS stavs
          From Viesnica_dp41.darbinieks
          inner join Viesnica_dp41.saraksts
          on Viesnica_dp41.darbinieks.darbinieka_ID = Viesnica_dp41.saraksts.darbinieka_ID
          inner join Viesnica_dp41.dzivoklis
          on Viesnica_dp41.saraksts.dzivokla_ID = Viesnica_dp41.dzivoklis.dzivokla_ID
          inner join Viesnica_dp41.viesnica
          on Viesnica_dp41.viesnica.viesnicas_ID = Viesnica_dp41.dzivoklis.viesnicas_ID
          Where CONCAT_WS(' ',Viesnica_dp41.darbinieks.vards, Viesnica_dp41.darbinieks.uzvards) LIKE '%".$text."%'";
		  
		  $result = $mysqli->query($sql);
}

else if(isset($_POST['ASC']))
{
    $ascSql="Select Viesnica_dp41.saraksts.saraksta_ID AS saraksts, CONCAT_WS(' ',Viesnica_dp41.darbinieks.vards, Viesnica_dp41.darbinieks.uzvards)
          AS darbinieks, Viesnica_dp41.viesnica.nosaukums, Viesnica_dp41.saraksts.dzivokla_ID, Viesnica_dp41.saraksts.datums,
          Viesnica_dp41.dzivoklis.dzivokla_numurs AS telpa, Viesnica_dp41.dzivoklis.stavs AS stavs
          From Viesnica_dp41.darbinieks
          inner join Viesnica_dp41.saraksts
          on Viesnica_dp41.darbinieks.darbinieka_ID = Viesnica_dp41.saraksts.darbinieka_ID
          inner join Viesnica_dp41.dzivoklis
          on Viesnica_dp41.saraksts.dzivokla_ID = Viesnica_dp41.dzivoklis.dzivokla_ID
          inner join Viesnica_dp41.viesnica
          on Viesnica_dp41.viesnica.viesnicas_ID = Viesnica_dp41.dzivoklis.viesnicas_ID
          ORDER BY CONCAT_WS(' ',Viesnica_dp41.darbinieks.vards, Viesnica_dp41.darbinieks.uzvards)";

    $result = $mysqli->query($ascSql);
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
    <div class="scheduleSettings-header">
        <h1>Saraksts</h1>

        <div class="navbar">
            <a id= "IzlogotiesBTN" href="login-dm.php">Iziet</a>
            <a id="DarbiniekiBTN" href="workerList-dm.php">Darbinieki</a>
            <a id="SarakstsBTN" href="scheduleSettings-dm.php">Izveidot</a>
            <a id="FonsBTN" href="schedule.php">Mainīt fonu</a>
        </div>
    </div>
	

    <div class="Schedule">
	    <div class="Meklesana">
		    <form action="schedule-dm.php" method="GET">
	            <input type="text" name="search_text" placeholder="Meklēt darbinieku" class="MekletINPUT">
		        <input type="submit" name="search" value="Meklēt" class="MekletBTN">
	        </form>
            <form action="schedule-dm.php" method="POST">
                <input type="submit" name="ASC" value="Filtrēt" class="FiltretBTN">
            </form>
	    </div>
	    <br>
		<div class="table">
		<form action="pdfReport.php" method="POST">
          <table>
		    <thead>
              <tr>
                  <th>Darbinieks </th>
                  <th>Viesnīca</th>
                  <th>Dzīvoklis</th>
                  <th>Datums</th>
				  <th>Mainīt</th>
				  <th>Dzsēst</th>
              </tr>
		    </thead>
		  
            <tbody>
              <?php
                  while($rows=$result->fetch_assoc())
                  {
              ?>
              <tr>
                  <td><?php echo $rows['darbinieks'];?></td>
                  <td><?php echo $rows['nosaukums'];?></td>
                  <td><?php echo "Numurs: ".$rows['telpa']. " Stāvs: ". $rows['stavs'];?></td>
                  <td><?php echo $rows['datums'];?></td>
		          <td><?php echo "<a href='update-dm.php?id={$rows['saraksts']}'>Mainīt</a>";?></td>
		          <td><?php echo "<a href='delete.php?id={$rows['saraksts']}'>Dzsēst</a>";?></td>
              </tr>
              <?php
                  }
              ?>
		    </tbody>
          </table>
		</div>
		<div class="btn-right">
            <input type="submit" value="Printēt" id="btn2">
        </div>
		</form>
    </div>

</body>
</html>