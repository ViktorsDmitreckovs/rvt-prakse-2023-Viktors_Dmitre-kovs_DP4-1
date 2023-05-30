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
 
$sql = "Select darbinieka_ID, vards, uzvards, loma
From Viesnica_dp41.darbinieks
WHERE loma = 2";
$result = $mysqli->query($sql);

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
<form method="POST">
    <div class="scheduleSettings-header">
        <h1>Sarakstu veidošana</h1>
    </div>

    <div class="scheduleSettings-input">
            <label for="name">Darbinieks</label><br>
            <div>
                <select name="name" id="name">
                <?php
                     while($row = mysqli_fetch_array($result)){
                       echo "<option value=".$row['darbinieka_ID'].">".$row['vards']." ".$row['uzvards']."</option>";
                     }
                ?>
                </select>
            </div>

            <label for="apartment">Dzīvokļis</label><br>
            <div>
                <select name="room" id="room">
                <?php
                while($row4 = mysqli_fetch_array($result4)){
                    echo "<option value=".$row4['ID'].">Dzīvokļa numurs: ".$row4['Numurs']."</option>";
                }
                
                ?>
                </select>
            </div>

            <label for="date">Datums</label><br>
            <input type="text" id="date" name="date" placeholder="YYYY-MM-DD"><br><br>
			

            <div style="overflow: auto">
                <div class="btn-left">
                    <input type="submit" class="txt" name="submit" value="Pievienot" id="btn">
                </div>
                <div class="btn-right">
                    <input type="submit" name="cancel" value="Atcelt" id="btn2">
                </div>
            </div>

            <?php
            
            if ( isset($_POST['room']) && isset($_POST['name']) && isset($_POST['date']) ){
            $telpa = $_POST['room'];
            $darbinieks = $_POST['name'];
            $datums = $_POST['date'];
			}
			
			

            if(isset($_POST['submit'])){
                $dzivoklis = $_POST['room'];
                $darbinieks = $_POST['name'];
                $datums = $_POST['date'];
              
                $query = "Insert into Viesnica_dp41.saraksts(dzivokla_ID, darbinieka_ID, datums)
                VALUES($telpa,$darbinieks,'$datums')";
                $result = $mysqli->query($query);
                if($result && $datums!=''){
                    echo "<script> window.location.href = 'http://localhost/viesnica_dp41/schedule.php'
                    alert('Saraksts pievienots!');</script>";
                }
				else if(preg_match("/[a-z]/i", $datums)){
					echo '<script type="text/javascript">alert("Ievadiet pareizi datumu")</script>';
				}
				else{
				    echo '<script type="text/javascript">alert("Ievadiet datumu")</script>';
				}
            }
			else if(isset($_POST['cancel'])){
			    header('location: schedule.php');
			}
            ?>
    </div>
 </form>
</body>
</html>
