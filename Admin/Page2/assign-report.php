<?Php
session_start();

if(isset($_POST['edit_detail'])){
 $name1=$_POST['name_id'];
    
require "config.php"; // connection to database 
$count="select * from assign Where employee_name='$name1' LIMIT 0,10"; // SQL to get 10 records 
require('fpdf.php');

class PDF extends FPDF
{
// Page header
function Header()
{
 $this->Image('11.png',10,-1,40);
 $this->SetFont('Arial','B',13);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(80,10,'Assigned order List',1,0,'C');
    // Line break
    $this->Ln(20);
}
// Page footer
function Footer()
{
 $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}
$pdf = new PDF(); 
$pdf->AddPage('p','A4', 0);

$width_cell=array(10,30,40,30,60);
$pdf->SetFont('Arial','B',12);

$pdf->SetFillColor(193,229,252); // Background color of header 
// Header starts /// 
$pdf->Cell($width_cell[0],10,'ID',1,0,'C',true); // First header column 
$pdf->Cell($width_cell[1],10,'BOOKING ID',1,0,'C',true); // Second header column
$pdf->Cell($width_cell[2],10,'EMPLOYEE NAME',1,0,'C',true); // Third header column 
$pdf->Cell($width_cell[3],10,'TASK',1,0,'C',true); // Fourth header column
$pdf->Cell($width_cell[4],10,'TIME',1,1,'C',true); // Third header column

//// header ends ///////

$pdf->SetFont('Arial','',10);		
$pdf->SetFillColor(235,236,236); // Background color of header 
$fill=false; // to give alternate background fill color to rows 

/// each record is one row  ///
foreach ($dbo->query($count) as $row) {
$pdf->Cell($width_cell[0],10,$row['id'],1,0,'C',$fill);
$pdf->Cell($width_cell[1],10,$row['booking_id'],1,0,'C',$fill);
$pdf->Cell($width_cell[2],10,$row['employee_name'],1,0,'C',$fill);
$pdf->Cell($width_cell[3],10,$row['task'],1,0,'C',$fill);
$pdf->Cell($width_cell[4],10,$row['time'],1,1,'C',$fill);
$fill = !$fill; // to give alternate background fill  color to rows
}
/// end of records /// 

$pdf->Output('Assigned_order_report.pdf','D');

}else {
    header("Location: /cleaning/Admin/Page2/assign.php");
     exit();
}
?>
