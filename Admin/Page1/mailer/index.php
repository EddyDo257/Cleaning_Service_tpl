<?php
  use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;
	
session_start();
if (isset($_SESSION['employee_name'])&& isset($_SESSION['employee_phone']) && isset($_SESSION['customer_name']) && isset($_SESSION['customer_phone']) && isset($_SESSION['customer_email']) && isset($_SESSION['customer_service'])&& isset($_SESSION['customer_facility']) && isset($_SESSION['customer_date']) && isset($_SESSION['customer_time'])){
  $employee_name= $_SESSION['employee_name'];
  $employee_phone= $_SESSION['employee_phone'];

  $customer_name= $_SESSION['customer_name'];
  $customer_phone= $_SESSION['customer_phone'];
  $customer_email= $_SESSION['customer_email'];
  $customer_service= $_SESSION['customer_service'];
  $customer_facility= $_SESSION['customer_facility'];
  $customer_date= $_SESSION['customer_date'];
  $customer_time= $_SESSION['customer_time'];
  echo $customer_email;
  
  
  
 ?>
 
 
<?php
##########Script Information#########
  # Purpose: Send mail Using PHPMailer#
  #          & Gmail SMTP Server 	  #
  # Created: 24-11-2019 			  #
  #	Author : Hafiz Haider			  #
  # Version: 1.0					  #
  # Website: www.BroExperts.com 	  #
  #####################################

//Include required PHPMailer files
	require 'includes/PHPMailer.php';
	require 'includes/SMTP.php';
	require 'includes/Exception.php';
	require('fpdf.php');
	require "config.php";


	 // connection to database 
$count="select * from assign LIMIT 0,10"; // SQL to get 10 records 



class PDF extends FPDF
{
// Page header
function Header()
{

 // 
 $this->SetFont('Arial','B',13);
    // Move to the right
    $this->Cell(5);
    // Title
    $this->Cell(5,5,'CITY FUGIMATORS LTD',0,1);
    $this->Cell(5);
    // Title
    $this->Cell(5,5,'18 KG 33 AVE, KIGALI',0,1);
    $this->Cell(5);
    // Title
    $this->Cell(5,5,'+250 79 0614 111',0,1);
    $this->Cell(5);
    // Title
    $this->Cell(5,5,'FUMIGATOR12@GMAIL.COM',0,1);
    $this->Cell(5);
    // Title
    $this->Cell(5,5,'WWW.CITY_FUMIGATORS.COM',0,1);

    $this->Image('11.png',125,2,50);
    // Line break
    $this->Ln(10);

    $this->Cell(71 ,10,'',0,0);
	$this->Cell(175 ,10,'Customer details',0,0,'C');
	$this->Cell(59 ,10,'',0,1);

	$this->Ln(5);

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

$width_cell=array(50,130);
$pdf->SetFont('Arial','B',12);

$pdf->SetFillColor(193,229,252); // Background color of header 
$fill=false;
// Header starts /// 
$pdf->Cell(40,10,'Customer Name',1,0,'C',true); // First header column 
$pdf->Cell(50,10,$customer_name,1,0,'C',$fill); // Second header column
$pdf->Cell(40,10,'Customer Phone',1,0,'C',true); // First header column 
$pdf->Cell(50,10,$customer_phone,1,1,'C',$fill); // Second header col
$pdf->Ln(5);

$pdf->Cell(71 ,10,'',0,0);
$pdf->Cell(130 ,10,'Employee details assigned to your order',0,0,'C');
$pdf->Cell(59 ,10,'',0,1);
$pdf->Ln(5);
//// header ends ///////
$pdf->Cell(40,10,'Employee Name',1,0,'C',true); // First header column 
$pdf->Cell(50,10,$employee_name,1,0,'C',$fill); // Second header column
$pdf->Cell(40,10,'Employee Phone',1,0,'C',true); // First header column 
$pdf->Cell(50,10,$employee_phone,1,1,'C',$fill); // Second header col
$pdf->Cell(40,10,'Service ',1,0,'C',true); // First header column 
$pdf->Cell(50,10,$customer_service,1,0,'C',$fill); // Second header column
$pdf->Cell(40,10,'Facility',1,0,'C',true); // First header column 
$pdf->Cell(50,10,$customer_facility,1,1,'C',$fill); // Second header col
$pdf->Cell(40,10,'Date to come',1,0,'C',true); // First header column 
$pdf->Cell(50,10,$customer_date,1,0,'C',$fill); // Second header column
$pdf->Cell(40,10,'Time to come',1,0,'C',true); // First header column 
$pdf->Cell(50,10,$customer_time,1,1,'C',$fill); // Second header col

$fill = !$fill; // to give alternate background fill  color to rows

/// end of records /// 

	$mail = new PHPMailer();
//Set mailer to use smtp
	$mail->isSMTP();
//Define smtp host
	$mail->Host = "smtp.zoho.com";
//Enable smtp authentication
	$mail->SMTPAuth = true;
//Set smtp encryption type (ssl/tls)
	$mail->SMTPSecure = "ssl";
//Port to connect smtp
	$mail->Port = "465";
//Set gmail username
	$mail->Username = "******";
//Set gmail password
	$mail->Password = "****";
//Email subject
	$mail->Subject = "Emoloyee confirmation service order";
//Set sender email
	$mail->setFrom('******');
//Enable HTML
	$mail->isHTML(true);
//Attachment
	
	$mail->addStringAttachment($pdf->Output("S",'OrderDetails.pdf'), 'OrderDetails.pdf', $encoding = 'base64',$type = 'application/pdf');
//Email body
	$mail->Body = "<p>Dear ".$namee." find in this Attachment the Emoloyee details for your service order ";
//Add recipient
	$mail->addAddress($customer_email);
//Finally send email
	if ( $mail->send() ) {
		$_SESSION['success'] = 'Email send successfully';
		header("Location: ../assign_pending.php");
		
	}else{
		echo "Message could not be sent. Mailer Error: "{$mail->ErrorInfo};
	}
//Closing smtp connection
	$mail->smtpClose();

	
?>

<?php 
    
    }else{
           header("Location: /cleaning/Admin/");
           exit();
      }
?>
