<?Php
if(isset($_POST['edit_detail'])){

require "config.php"; // connection to database 
$count="select * from employees LIMIT 0,10"; // SQL to get 10 records 
require('fpdf.php');

class PDF extends FPDF
{
// Page header
function Header()
{
 $this->Image('11.png',10,8,40);
 $this->SetFont('Arial','B',13);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(80,10,'Employee List',1,0,'C');
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

$width_cell=array(10,20,40,50,30,40);
$pdf->SetFont('Arial','B',12);

$pdf->SetFillColor(193,229,252); // Background color of header 
// Header starts /// 
$pdf->Cell($width_cell[0],10,'ID',1,0,'C',true); // First header column 
$pdf->Cell($width_cell[1],10,'NAME',1,0,'C',true); // Second header column
$pdf->Cell($width_cell[2],10,'USERNAME',1,0,'C',true); // Third header column 
$pdf->Cell($width_cell[3],10,'EMAIL',1,0,'C',true); // Fourth header column
$pdf->Cell($width_cell[4],10,'PHONE',1,0,'C',true); // Third header column
$pdf->Cell($width_cell[5],10,'TIME',1,1,'C',true); // Third header column

//// header ends ///////

$pdf->SetFont('Arial','',10);   
$pdf->SetFillColor(235,236,236); // Background color of header 
$fill=false; // to give alternate background fill color to rows 

/// each record is one row  ///
foreach ($dbo->query($count) as $row) {
$pdf->Cell($width_cell[0],10,$row['id'],1,0,'C',$fill);
$pdf->Cell($width_cell[1],10,$row['employee_name'],1,0,'C',$fill);
$pdf->Cell($width_cell[2],10,$row['employee_username'],1,0,'C',$fill);
$pdf->Cell($width_cell[3],10,$row['employee_email'],1,0,'C',$fill);
$pdf->Cell($width_cell[4],10,$row['employee_phone'],1,0,'C',$fill);
$pdf->Cell($width_cell[5],10,$row['time_saved'],1,1,'C',$fill);
$fill = !$fill; // to give alternate background fill  color to rows
}
/// end of records /// 

$pdf->Output('Employee_report.pdf','D');

}else {
    header("Location: /cleaning/Admin/Page1/employee.php");
     exit();
}
?>
