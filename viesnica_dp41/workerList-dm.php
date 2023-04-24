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
 
$sql = "SELECT CONCAT_WS(' ',Viesnica_dp41.darbinieks.vards, Viesnica_dp41.darbinieks.uzvards) as darbinieks,
IF(SUM(IF((MONTH(Viesnica_dp41.saraksts.datums) = MONTH(NOW())
AND DAY(Viesnica_dp41.saraksts.datums) = DAY(NOW()) 
AND YEAR(Viesnica_dp41.saraksts.datums) = YEAR(NOW())),1,0))>0,'strāda','brīvs/a')
AS 'Statuss'
FROM Viesnica_dp41.darbinieks
INNER JOIN Viesnica_dp41.saraksts
on Viesnica_dp41.darbinieks.darbinieka_ID = viesnica_dp41.saraksts.darbinieka_ID
GROUP BY viesnica_dp41.darbinieks.vards, viesnica_dp41.darbinieks.uzvards";
$result = $mysqli->query($sql);
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
            <a id="FonsBTN" href="workerList.php">Mainīt fonu</a>
        </div>
    </div>

    <div class="Schedule" style="overflow-y:auto;">
		<form action="pdfReport.php" method="POST">
        <table>
            <tr>
                <th>Darbinieks</th>
                <th>Statuss <?php echo "(" . date("Y-m-d") . ")";?></th>
            </tr>

            <?php
                while($rows=$result->fetch_assoc())
                {
            ?>
            <tr>
				<td><?php echo $rows['darbinieks'];?></td>
                <td><?php echo $rows['Statuss'];?></td>
            </tr>
            <?php
                }
            ?>
        </table>
		</form>
    </div>

</body>
</html>