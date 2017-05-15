<?php
session_start();
require('db.php');
include("Adminauth.php");

$image_url='images/delete-forever.png' ;
$image='images/eye.png' ;

?>
<!DOCTYPE html>
<html>
<head><ul><p><link rel="stylesheet"  href="css/style.css" />
<li><a href="indexAdmin.php">Home</a>  
<li><a class="activ" href="viewAdmin.php">View Records</a>
<li><a  href="analysis.php">Chart</a>
<li style="float:right"><a href="logout.php">Logout</a></p></ul>

<meta charset="utf-8">
<title>View Records</title>
</head>
<body>

<body background="images/white-background-5.jpg">
<div class="form">

<h2>View Records</h2>
<form method="GET" action="search.php">
<tr><td>

</td><td>
<input type="text" name="Search" style="width:150px;height:20px" required autofocus>
</td><td>
<input type="submit" name="view1" value="Search" style="height:30px;width:90px">
</form>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>


<th><strong>Hostel Name</strong></th>
<th><strong>Type of Report</strong></th>
<th><strong>Report Details</strong></th>
<th><strong>Report Submitted On</strong></th>
<th><strong>View</strong></th>
<th><strong>Report Progress</strong></th>
<th><strong>Staff Assign</strong></th>
<th><strong>Delete</strong></th>

</thead>
<tbody>
<?php
$count=1;
$sel_query="Select * from complaintreport ORDER BY ComplaintID desc;";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
<td align="center"><?php echo $row["HostelName"]; ?></td>
<td align="center"><?php echo $row["TypeOfReport"]; ?></td>
<td align="center"><?php echo $row["Details"]; ?></td>
<td align="center"><?php echo $row["Reporttrn_date"]; ?></td>
<td align="center">
<a href="reportview.php?ComplaintID=<?php echo $row["ComplaintID"];?>"><img src="<?php echo $image;?>"></a></td>
<td align="center">
<a href="ProgressEdit.php?ComplaintID=<?php echo $row["ComplaintID"]; ?>"><?php echo $row["ReportStatus"]; ?></a>
</td>
<td align="center">
<a href="staffassignment.php?ComplaintID=<?php echo $row["ComplaintID"]; ?>"><?php echo $row["StaffAssign"]; ?></a></td>
<td align="center">
<a href="delete.php?ComplaintID=<?php echo $row["ComplaintID"];?>"><img src="<?php echo $image_url;?>">
</a>
</td>
</tr>
<?php $count++; } ?>


</tbody>
</table>
</div>

</html>