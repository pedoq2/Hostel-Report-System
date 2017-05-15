<?php
session_start();
require('db.php');
include("staffauth.php");

$image_url='images/delete-forever.png' ;
$image='images/eye.png' ;
$Assign =$_SESSION["staffusername"];
?>
<!DOCTYPE html>
<html>
<head><ul><p><link rel="stylesheet"  href="css/style.css" />
<li><a href="staffindex.php">Home</a>  
<li><a class="acti" href="viewstaff.php">View Assigned Complaint</a>
<li><a  href="staffprofile.php">Profile</a>
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



</thead>
<tbody>
<?php
$count=1;
$sel_query="Select * from complaintreport where StaffAssign ='".$Assign."' ORDER BY ComplaintID desc;";
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
<a href="Edit.php?ComplaintID=<?php echo $row["ComplaintID"]; ?>"><?php echo $row["ReportStatus"]; ?></a>
</td>
<td align="center">

</a>
</td>
</tr>
<?php $count++; } ?>


</tbody>
</table>
</div>

</html>