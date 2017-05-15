<?php
require('db.php');
$Delete=stripslashes ($_GET['ComplaintID']);



$query = "DELETE FROM complaintreport WHERE ComplaintID='" . $Delete . "'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());
$status = "Record Updated Successfully. </br></br>
<a href='viewAdmin.php'>View Updated Record</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
?>