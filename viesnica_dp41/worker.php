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
        <h1>Darbinieka informācija</h1>
    </div>
	
	<?php
 
    $user = 'root';
    $password = '1306brbl*VD*';
 
    $database = 'Viesnica_dp41';
 
    $servername='localhost';
    $mysqli = new mysqli($servername, $user, $password, $database);
	
	  $s_id=$_GET['id'];
	
	  $sql="SELECT * FROM Viesnica_dp41.darbinieks WHERE darbinieka_ID='$s_id'";
	
	  $result = $mysqli->query($sql);
	
	  $info = $result->fetch_assoc();

    $sql1 = "Select darbinieka_ID as darbinieks, vards, uzvards
    From Viesnica_dp41.darbinieks
	WHERE darbinieka_ID='$s_id'";
    $result1 = $mysqli->query($sql1);
	
	$sql2= "SELECT MAX(Viesnica_dp41.saraksts.datums) as datums, Viesnica_dp41.saraksts.darbinieka_ID as darbinieks
          FROM Viesnica_dp41.saraksts
          WHERE Viesnica_dp41.saraksts.darbinieka_ID = '$s_id'";
		  
	$result2 = $mysqli->query($sql2);

    $sql3 = "SELECT Round(SUM(Viesnica_dp41.saraksts.ilgums)/10000) AS h, 
            ROUND((SUM(Viesnica_dp41.saraksts.ilgums) - 10000*Round(SUM(Viesnica_dp41.saraksts.ilgums)/10000))/100) AS m, 
            Viesnica_dp41.saraksts.darbinieka_ID
            FROM Viesnica_dp41.saraksts
            WHERE Viesnica_dp41.saraksts.darbinieka_ID = '$s_id'
            Group BY Viesnica_dp41.saraksts.darbinieka_ID";
    $result3 = $mysqli->query($sql3);

    $sql4 = "SELECT viesnica_dp41.viesnica.nosaukums as Nosaukums ,viesnica_dp41.dzivoklis.dzivokla_ID as ID, viesnica_dp41.dzivoklis.dzivokla_numurs as Numurs,
    viesnica_dp41.dzivoklis.stavs as Stavs
    FROM viesnica_dp41.dzivoklis
    INNER JOIN viesnica_dp41.viesnica
    ON viesnica_dp41.viesnica.viesnicas_ID = Viesnica_dp41.dzivoklis.viesnicas_ID
    ORDER BY viesnica_dp41.dzivoklis.dzivokla_ID";
    $result4 = $mysqli->query($sql4);
	

	?>
	
                <div class="workersInfo">
                   <label for="name">Darbinieks</label><br>
                   <div class="name">
                   <?php
                      while($row1 = mysqli_fetch_array($result1)){
                        echo "<label value=".$row1['darbinieks'].">".$row1['vards']." ".$row1['uzvards']."</label>";
                     }
                   ?>
                   </div>

                   <label for="date">Cik nostrādāja darbinieks</label><br>
                   <div class="time">
                   <?php
                      while($row3 = mysqli_fetch_array($result3)){
					  $text = "<label value=".$row3['h'].">Ilgums(stundas:minutes): ".$row3['h'].":".$row3['m']."</label>";
                      if (str_contains($text,'-')){
					     echo "<label value=".$row3['h'].">Ilgums(stundas:minutes): ".$row3['h'].":00</label>";
					  }
					  else{
					     echo $text;
					  }
					 }
                
                   ?>
                   </div>
				   
				   <label for="last">Pedējo reizi viņš/a strādāja</label><br>
                   <div class="lastDate">
                   <?php
                      while($row2 = mysqli_fetch_array($result2)){
                        echo "<label value=".$row2['darbinieks'].">".$row2['datums']."</label>";
                      }
                
                   ?>
                   </div>
                </div>			 
	
	
</body>
</html>