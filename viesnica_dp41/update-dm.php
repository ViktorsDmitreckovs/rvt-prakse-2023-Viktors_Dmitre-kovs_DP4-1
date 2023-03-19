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
        <h1>Sarakstu mainīšana</h1>
    </div>
	
	<?php
 
    $user = 'root';
    $password = '1306brbl*VD*';
 
    $database = 'Viesnica_dp41';
 
    $servername='localhost';
    $mysqli = new mysqli($servername, $user, $password, $database);
	
	  $s_id=$_GET['id'];
	
	  $sql="SELECT * FROM Viesnica_dp41.saraksts WHERE saraksta_ID='$s_id'";
	
	  $result = $mysqli->query($sql);
	
	  $info = $result->fetch_assoc();

    $sql1 = "Select darbinieka_ID, vards, uzvards
    From Viesnica_dp41.darbinieks";
    $result1 = $mysqli->query($sql1);

    $sql3 = "Select viesnicas_ID, nosaukums
    From Viesnica_dp41.viesnica";
    $result3 = $mysqli->query($sql3);

    $sql4 = "SELECT viesnica_dp41.viesnica.nosaukums as Nosaukums ,viesnica_dp41.dzivoklis.dzivokla_ID as ID, viesnica_dp41.dzivoklis.dzivokla_numurs as Numurs,
    viesnica_dp41.dzivoklis.stavs as Stavs
    FROM viesnica_dp41.dzivoklis
    INNER JOIN viesnica_dp41.viesnica
    ON viesnica_dp41.viesnica.viesnicas_ID = Viesnica_dp41.dzivoklis.viesnicas_ID
    ORDER BY viesnica_dp41.dzivoklis.dzivokla_ID";
    $result4 = $mysqli->query($sql4);
	

	?>
	
	  <form action="update_data-dm.php" method="POST">
                <div class="scheduleChange">
				   <div>
				      <input type="text" name="id" value="<?php echo "{$info['saraksta_ID']}"?>" hidden>
				   </div>
                   <label for="name">Darbinieks</label><br>
                   <div>
                   <select name="name" id="name">
                   <?php
                      while($row1 = mysqli_fetch_array($result1)){
                        echo "<option value=".$row1['darbinieka_ID'].">".$row1['vards']." ".$row1['uzvards']."</option>";
                     }
                   ?>
                   </select>
                   </div>

                   <label for="apartment">Telpa</label><br>
                   <div>
                   <select name="room" id="room">
                   <?php
                      while($row4 = mysqli_fetch_array($result4)){
                        echo "<option value=".$row4['ID'].">".$row4['Nosaukums']." | Viesnīcas stāvs: ".$row4['Stavs']." | Telpas numurs: ".$row4['Numurs']."</option>";
                      }
                
                   ?>
                   </select>
                   </div>

                   <label for="date">Datums</label><br>
                   <input type="text" id="date" name="date"><br><br>
				   
				           <label for="date">Ilgums</label><br>
                   <input type="text" id="hours" name="hours"><br><br>

                   <div style="overflow: auto">
                   <div class="btn-left">
                     <input type="submit" class="txt" name="update" value="Mainīt" id="btn">
                   </div>
                   <div class="btn-right">
                     <input type="submit" name="cancel" value="Atcelt" id="btn2">
                   </div>
                   </div>
                </div>			 
		</form>
	
	
</body>
</html>