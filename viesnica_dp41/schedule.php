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
AS darbinieks, Viesnica_dp41.darbinieks.darbinieka_ID AS DarbiniekaID, Viesnica_dp41.viesnica.nosaukums, Viesnica_dp41.saraksts.dzivokla_ID, Viesnica_dp41.saraksts.datums,
Viesnica_dp41.dzivoklis.dzivokla_numurs AS telpa, Viesnica_dp41.dzivoklis.stavs AS stavs,
Viesnica_dp41.dzivokla_tips.tipa_nosaukums AS tips, Viesnica_dp41.dzivokla_izmers.izmers AS izmers
From Viesnica_dp41.darbinieks
inner join Viesnica_dp41.saraksts
on Viesnica_dp41.darbinieks.darbinieka_ID = Viesnica_dp41.saraksts.darbinieka_ID
inner join Viesnica_dp41.dzivoklis
on Viesnica_dp41.saraksts.dzivokla_ID = Viesnica_dp41.dzivoklis.dzivokla_ID
inner join Viesnica_dp41.viesnica
on Viesnica_dp41.viesnica.viesnicas_ID = Viesnica_dp41.dzivoklis.viesnicas_ID
INNER JOIN Viesnica_dp41.dzivokla_tips
ON Viesnica_dp41.dzivoklis.tipa_ID = Viesnica_dp41.dzivokla_tips.tipa_ID
INNER JOIN Viesnica_dp41.dzivokla_izmers
ON Viesnica_dp41.dzivoklis.izmera_ID = Viesnica_dp41.dzivokla_izmers.izmera_ID
Where Viesnica_dp41.saraksts.datums >= CURDATE()";
$result = $mysqli->query($sql);

$sql4 = "SELECT viesnica_dp41.viesnica.nosaukums as Nosaukums ,viesnica_dp41.dzivoklis.dzivokla_ID as ID, viesnica_dp41.dzivoklis.dzivokla_numurs as Numurs,
viesnica_dp41.dzivoklis.stavs as Stavs
FROM viesnica_dp41.dzivoklis
INNER JOIN viesnica_dp41.viesnica
ON viesnica_dp41.viesnica.viesnicas_ID = Viesnica_dp41.dzivoklis.viesnicas_ID
ORDER BY viesnica_dp41.dzivoklis.dzivokla_ID";
$result4 = $mysqli->query($sql4);

if(isset($_GET['search']))
{
	$text=$_GET['search_text'];
	
	$sql="Select Viesnica_dp41.saraksts.saraksta_ID AS saraksts, CONCAT_WS(' ',Viesnica_dp41.darbinieks.vards, Viesnica_dp41.darbinieks.uzvards)
          AS darbinieks, Viesnica_dp41.darbinieks.darbinieka_ID AS DarbiniekaID, Viesnica_dp41.viesnica.nosaukums, Viesnica_dp41.saraksts.dzivokla_ID, Viesnica_dp41.saraksts.datums,
          Viesnica_dp41.dzivoklis.dzivokla_numurs AS telpa, Viesnica_dp41.dzivoklis.stavs AS stavs,
          Viesnica_dp41.dzivokla_tips.tipa_nosaukums AS tips, Viesnica_dp41.dzivokla_izmers.izmers AS izmers
          From Viesnica_dp41.darbinieks
          inner join Viesnica_dp41.saraksts
          on Viesnica_dp41.darbinieks.darbinieka_ID = Viesnica_dp41.saraksts.darbinieka_ID
          inner join Viesnica_dp41.dzivoklis
          on Viesnica_dp41.saraksts.dzivokla_ID = Viesnica_dp41.dzivoklis.dzivokla_ID
          inner join Viesnica_dp41.viesnica
          on Viesnica_dp41.viesnica.viesnicas_ID = Viesnica_dp41.dzivoklis.viesnicas_ID
          INNER JOIN Viesnica_dp41.dzivokla_tips
          ON Viesnica_dp41.dzivoklis.tipa_ID = Viesnica_dp41.dzivokla_tips.tipa_ID
          INNER JOIN Viesnica_dp41.dzivokla_izmers
          ON Viesnica_dp41.dzivoklis.izmera_ID = Viesnica_dp41.dzivokla_izmers.izmera_ID
          Where Viesnica_dp41.saraksts.datums >= CURDATE() AND CONCAT_WS(' ',Viesnica_dp41.darbinieks.vards, Viesnica_dp41.darbinieks.uzvards) LIKE '%".$text."%'";
		  
		  $result = $mysqli->query($sql);
}
else if(isset($_GET['orderBy'])){
	$sql = "Select Viesnica_dp41.saraksts.saraksta_ID AS saraksts, CONCAT_WS(' ',Viesnica_dp41.darbinieks.vards, Viesnica_dp41.darbinieks.uzvards)
AS darbinieks, Viesnica_dp41.darbinieks.darbinieka_ID AS DarbiniekaID, Viesnica_dp41.viesnica.nosaukums, Viesnica_dp41.saraksts.dzivokla_ID, Viesnica_dp41.saraksts.datums,
Viesnica_dp41.dzivoklis.dzivokla_numurs AS telpa, Viesnica_dp41.dzivoklis.stavs AS stavs,
Viesnica_dp41.dzivokla_tips.tipa_nosaukums AS tips, Viesnica_dp41.dzivokla_izmers.izmers AS izmers
From Viesnica_dp41.darbinieks
inner join Viesnica_dp41.saraksts
on Viesnica_dp41.darbinieks.darbinieka_ID = Viesnica_dp41.saraksts.darbinieka_ID
inner join Viesnica_dp41.dzivoklis
on Viesnica_dp41.saraksts.dzivokla_ID = Viesnica_dp41.dzivoklis.dzivokla_ID
inner join Viesnica_dp41.viesnica
on Viesnica_dp41.viesnica.viesnicas_ID = Viesnica_dp41.dzivoklis.viesnicas_ID
INNER JOIN Viesnica_dp41.dzivokla_tips
ON Viesnica_dp41.dzivoklis.tipa_ID = Viesnica_dp41.dzivokla_tips.tipa_ID
INNER JOIN Viesnica_dp41.dzivokla_izmers
ON Viesnica_dp41.dzivoklis.izmera_ID = Viesnica_dp41.dzivokla_izmers.izmera_ID
ORDER BY Viesnica_dp41.saraksts.saraksta_ID";
    $result = $mysqli->query($sql);
}

else if(isset($_GET['dates']))
{
	$dates = $_GET['search_date'];
	 
    $ascSql="Select Viesnica_dp41.saraksts.saraksta_ID AS saraksts, CONCAT_WS(' ',Viesnica_dp41.darbinieks.vards, Viesnica_dp41.darbinieks.uzvards)
          AS darbinieks, Viesnica_dp41.darbinieks.darbinieka_ID AS DarbiniekaID, Viesnica_dp41.viesnica.nosaukums, Viesnica_dp41.saraksts.dzivokla_ID, Viesnica_dp41.saraksts.datums,
          Viesnica_dp41.dzivoklis.dzivokla_numurs AS telpa, Viesnica_dp41.dzivoklis.stavs AS stavs,
          Viesnica_dp41.dzivokla_tips.tipa_nosaukums AS tips, Viesnica_dp41.dzivokla_izmers.izmers AS izmers
          From Viesnica_dp41.darbinieks
          inner join Viesnica_dp41.saraksts
          on Viesnica_dp41.darbinieks.darbinieka_ID = Viesnica_dp41.saraksts.darbinieka_ID
          inner join Viesnica_dp41.dzivoklis
          on Viesnica_dp41.saraksts.dzivokla_ID = Viesnica_dp41.dzivoklis.dzivokla_ID
          inner join Viesnica_dp41.viesnica
          on Viesnica_dp41.viesnica.viesnicas_ID = Viesnica_dp41.dzivoklis.viesnicas_ID
          INNER JOIN Viesnica_dp41.dzivokla_tips
          ON Viesnica_dp41.dzivoklis.tipa_ID = Viesnica_dp41.dzivokla_tips.tipa_ID
          INNER JOIN Viesnica_dp41.dzivokla_izmers
          ON Viesnica_dp41.dzivoklis.izmera_ID = Viesnica_dp41.dzivokla_izmers.izmera_ID
          Where Viesnica_dp41.saraksts.datums >= CURDATE() AND Viesnica_dp41.dzivoklis.dzivokla_numurs = '$dates'";

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
    <link rel="stylesheet" href="static/style.css">
</head>
<body>
    <div class="scheduleSettings-header">
        <h1>Saraksts</h1>

        <div class="navbar">
            <a id= "IzlogotiesBTN" href="login.php">Iziet</a>
            <a id="DarbiniekiBTN" href="workerList.php">Darbinieki</a>
            <a id="SarakstsBTN" href="scheduleSettings.php">Izveidot</a>
            <a id="FonsBTN" href="schedule-dm.php">Mainīt fonu</a>
        </div>
    </div>
	

    <div class="Schedule">
	    <div class="Meklesana">
		    <form action="schedule.php" method="GET">
	            <input type="text" name="search_text" placeholder="Meklēt darbinieku" class="MekletINPUT">
		        <input type="submit" name="search" value="Meklēt" class="MekletBTN">
				<input type="submit" name="orderBy" value="Pilns saraksts" class="SarakstsBTN">
	        </form>
	    </div>
	    <br>
		<div class="table">
          <table>
		    <thead>
              <tr>
                  <th>Darbinieks</th>
                  <th>Viesnīca</th>
			    <form action="schedule.php" method="GET">
                  <th>Dzīvoklis
					  <select name="search_date" placeholder="Sākartot pēc numura" class="MekletNumuru">
                      <?php
                        while($row4 = mysqli_fetch_array($result4)){
                        echo "<option value=".$row4['Numurs'].">Dzīvokļa numurs: ".$row4['Numurs']."</option>";
                      }
                
                     ?>
                     </select>
					 <input type="submit" name="dates" value="Sākartot" class="FiltretBTN">
				  </th>
				</form>
                  <th>Datums </th>
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
                  <td><?php echo "<a href='worker.php?id={$rows['DarbiniekaID']}'>{$rows['darbinieks']}</a>";?></td>
                  <td><?php echo $rows['nosaukums'];?></td>
                  <td><?php echo "Numurs: ".$rows['telpa']. " Stāvs: ". $rows['stavs']. " <br>Izmērs: ".$rows['izmers']. " <br>Tips: ".$rows['tips'];?></td>
                  <td><?php echo $rows['datums'];?></td>
		          <td><?php echo "<a href='update.php?id={$rows['saraksts']}'>Mainīt</a>";?></td>
		          <td><?php echo "<a href='delete.php?id={$rows['saraksts']}'>Dzsēst</a>";?></td>
              </tr>
              <?php
                  }
              ?>
		    </tbody>
          </table>
		</div>
		<form action="pdfReport.php" method="POST">
		<div class="btn-right">
            <input type="submit" value="Izdrukāt" id="btn2">
        </div>
		</form>
    </div>

</body>
</html>