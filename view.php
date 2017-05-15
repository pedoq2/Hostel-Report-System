<?php
require('db.php');
include("auth.php");
$image_url='images/eye.png' ;
?>
<!DOCTYPE html>
<html><link rel="stylesheet"  href="css/style.css" />
<head><ul><p>
<li><a href="index.php">Home</a>  
<li><a href="insert.php">Submit a Complaint</a> 
<li><a class="active" href="view.php">View Records</a>
<li><a href="dashboard.php">Profile</a>

<li style="float:right"><a href="logout.php">Logout</a></p></ul>

<meta charset="utf-8">
<title>View Records</title>

</head>
<body>
<body background="images/white-background-5.jpg">
<div class="form">

<h2>View Records</h2>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
<th><strong>No</strong></th>
<th><strong>Hostel Name</strong></th>
<th><strong>Type of Report</strong></th>
<th><strong>Report Details</strong></th>
<th><strong>Report Progress</strong></th>
<th><strong>Submitted by</strong></th>
<th><strong>Report Submitted On</strong></th>
<th><strong>View</strong></th>
<th><strong>Staff Assign</strong></th>

</tr>
</thead>
<tbody>
<?php
session_start();
$count=1;

$usercomplaint=($_SESSION['username']);

$sel_query="SELECT * from complaintreport  where submittedBy = '".$usercomplaint."' ORDER BY ComplaintID desc";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result) ) { ?>
<tr><td align="center"><?php echo $count; ?></td>
<td align="center"><?php echo $row["HostelName"]; ?></td>
<td align="center"><?php echo $row["TypeOfReport"]; ?></td>
<td align="center"><?php echo $row["Details"]; ?></td>
<td align="center"><?php echo $row["ReportStatus"]; ?></td>
<td align="center"><?php echo $row["submittedBy"]; ?></td>
<td align="center"><?php echo $row["Reporttrn_date"]; ?></td>
<td align="center">
<a href="reportview.php?ComplaintID=<?php echo $row["ComplaintID"];?>"><img src="<?php echo $image_url;?>">
<td align="center"><?php echo $row["StaffAssign"]; ?></a></td>


</td>
</tr>
<?php $count++; } ?>
</tbody>
</table>
</div>
</body>
</html>