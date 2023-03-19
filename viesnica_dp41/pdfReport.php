<?php
require('fpdf.php');
$user = 'root';
$password = '1306brbl*VD*';
 
$database = 'Viesnica_dp41';
 
$servername='localhost';
$mysqli = new mysqli($servername, $user, $password, $database);
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

class PDF extends FPDF{
	function Header() {
		$this->SetFont('Arial','B',16);
		$this->Cell(60,10,'Darbinieks',0,0);
		$this->Cell(50,10,'Viesnica',0,0);
		$this->Cell(30,10,'Telpa',0,0);
		$this->Cell(40,10,'Datums',0,1);
		$this->SetFont('Arial','8',16);
		$y = $this->GetY();
		$this->Line(10,10,199,10);
		$this->Line(10,10,10,200);
		$this->Line(199,10,199,200);
		$this->Line(10,200,199,200);
		$this->Line(10,$y,199,$y);
		$this->Line(70,10,70,200);
		$this->Line(120,10,120,200);
		$this->Line(150,10,150,200);
	}
}

$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','8',16);
while($rows=$result->fetch_assoc()){
	$pdf->Cell(60,10,$rows['darbinieks'],0,0);
	$y= $pdf->GetY();
	$pdf->Cell(50,10,$rows['nosaukums'],0,0);
	$pdf->Cell(30,10,"Nr.".$rows['telpa']. " St.".$rows['stavs'],0,0);
	$pdf->Cell(40,10,$rows['datums'],0,1);
	$pdf->Line(10,$y+10,199,$y+10);
	$pdf->SetY($y+15);
}
$pdf->Output();
?>