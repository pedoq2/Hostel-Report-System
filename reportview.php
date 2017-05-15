<?php   
require('db.php');
include("Adminauth.php") or include("auth.php") or include("staffauth");

$ID=stripslashes($_GET['ComplaintID']);
$sel_query="SELECT * from complaintreport where ComplaintID='".$ID."'";
$result = mysqli_query($con,$sel_query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);


?>



<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Record</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<body background="images/white-background-5.jpg">


<div class="form">

<ul><p>
<li><a onclick="history.go(-1);">Back </a>  
 
<li><a class="actives" >View Records</a>
<li style="float:right"><a href="logout.php">Logout</a></p></ul><br><br>
<script>
	function generatePdfA() {
		document.forms['getcsvpdf'].action = 'pdfReport.php';
		document.forms['getcsvpdf'].submit();
	}
</script>
<form name="getcsvpdf" action="pdfReport.php" method="POST">

<h1>Record View</h1></div>


<br>

<thead>


</thead>
<tbody>
<?php
$count=1;
$sel_query="SELECT * from complaintreport where ComplaintID='".$ID."'";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
<td align="center"><strong>Submitted by : </strong><a href="UserProfile.php?submittedBy=<?php echo $row["submittedBy"];?>"><?php echo $row["submittedBy"];?></a></td><br><br>
<td align="center"><strong>Complaint ID : </strong>
<?php echo $row["ComplaintID"]; ?></td><br><br>
<td align="center"><strong>Staff Assign : </strong><a href="staProfile.php?StaffAssign=<?php echo $row["StaffAssign"];?>"><?php echo $row["StaffAssign"]; ?></a></td><br><br>
<td align="center"><strong>Hostel Name : </strong>
<?php echo $row["HostelName"]; ?></td><br><br>
<td align="center"><strong>Type of Report : </strong><?php echo $row["TypeOfReport"]; ?></td><br><br>
<td align="center"><strong>Report Details : </strong><?php echo $row["Details"]; ?></td><br><br>

<td align="center">
<strong>Report Progress : </strong><?php echo $row["ReportStatus"]; ?></a><br><br>

<td align="center"><strong>Complaint Receive on : </strong><?php echo $row["Reporttrn_date"]; ?></td><br><br>

<td align="center"><strong>Complaint Resolved on : </strong><?php echo $row["reportDone"]; ?></td><br><br>


<td align="center"><button><a href="pdfReport.php?ComplaintID=<?php echo $_GET["ComplaintID"]; ?>">Download Report</a></button>

</td><br>



</tr>
<?php $count++; } ?>
</tbody>
</table>
</div>
</body>
</html>









