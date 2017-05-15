<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<?php
require"db.php";
session_start();
$complaintid=($_GET["ComplaintID"]);
?>
<?php
    //Page header
    



//require_once('/xampp/htdocs/tcpdf/config/tcpdf_config.php');
require_once('C:\MAMP\htdocs\tcpdf\tcpdf.php');
// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//set some language-dependent strings
//$pdf->setLanguageArray($l);
// set document information
// set font
$pdf->SetFont('helvetica', 'B', 20);

// add a page
$pdf->AddPage();

$pdf->Write(0, '', '', 0, 'L', true, 0, false, false, 0);

$pdf->SetFont('helvetica', '', 8);
//$pdf->Image('/Applications/XAMPP/xamppfiles/htdocs/HAS 2/pages/stethoscope.jpg');

$pdf->SetCreator(PDF_CREATOR);




$user=$_SESSION['user'];

	$result2=mysqli_query($con,"SELECT * from complaintreport where ComplaintID='".$complaintid."'");
	
  $row2=mysqli_fetch_array($result2);
$tbl .='<h1>Report Details</h1><br><br>
<body>
<html>
<div> 

<table width="600" height="100" border="1" bordercolor="#000000">
 
    
</td><tr><br><br>
    <td width="200" height="50" ><font color="#000000" >Submitted By : &nbsp;</font></td>
    <td width="400" height="50"><font color="#000000" >'.$row2['submittedBy'].'</font>

    
</td>
  </tr>
  <tr>
    <td width="200" height="50"><font color="#000000" >Report ID : &nbsp;</font></td>
    <td width="400" height="50"><font color="#000000" >'.$row2['ComplaintID'].'</font></td>
  </tr>
  <tr>
    <td width="200" height="50"><font color="#000000" >Staff Assign : &nbsp;</font></td>
    <td width="400" height="50"><font color="#000000" >'.$row2['StaffAssign'].'</font></td>
  </tr>
  <tr>
    <td width="200" height="50"><font color="#000000" >Hostel Name : &nbsp;</font></td>
    <td width="400" height="50"><font color="#000000" >'.$row2['HostelName'].'</font></td>
  </tr>
  <tr>
    <td width="200" height="50"><font color="#000000" >Type Of Report : &nbsp;</font></td>
    <td width="400" height="50"><font color="#000000" >'.$row2['TypeOfReport'].'</font></td>
  </tr>
  <tr>
    <td width="200" height="50"><font color="#000000" >Report Details : &nbsp; </font></td>
    <td width="400" height="50"><font color="#000000" >'.$row2['Details'].'</font></td>
  </tr>
  <tr>
    <td width="200" height="50"><font color="#000000" >Report Progress:</font> </td>
    <td width="400" height="50"><font color="#000000" >'.$row2['ReportStatus'].'</font></td>
  </tr>
  <tr>
    <td width="200" height="50"><font color="#000000" >Complaint Receive On:</font> </td>
    <td width="400" height="50"><font color="#000000" >'.$row2['Reporttrn_date'].'</font></td>
  </tr>
  <tr>
    <td width="200" height="50"><font color="#000000" >Complaint  Resolved on: </font></td>
    <td width="400" height="50"><font color="#000000" >'.$row2['reportDone'].'</font></td>
  
  
    

  </tr>
</table>
<p>&nbsp;</p>

<table width="400px" border="1">
  <tr>
    <td width="100px" height="25px" align="center"></font></td>
    <td width="100px" height="25px" align="center"></font></td>
    <td width="100px" height="25px" align="center"></font></td>
    <td width="100px" height="25px" align="center"></font></td>
    <td width="113px" height="25px" align="center"></font></td>
  </tr>
  </table>
';
  $sql="SELECT * FROM cart where username = '".$user."'";

  $query = mysqli_query($con,$sql);
while($value = mysqli_fetch_array($query)){
$tbl.='

  <table width="400px"  border="1">
 <tr>
 <td align="center" width="100px" height="25px"></font></td>
    <td align="center" width="100px" height="25px" ></font></td>
    <td align="center" width="100px" height="25px"></font></td>
    <td align="center" width="100px" height="25px"></font></td>
    <td align="center" width="113px" height="25px"></font></td>
    
  </tr>


</table>

</body>
</html>
         
';
}


$pdf->writeHTML($tbl, true, false, false, false, '');
ob_end_clean();
$pdf->Output('Complaint.pdf', 'I');
?>
</body>
</body>
</html>
