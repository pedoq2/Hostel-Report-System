<?php
require('db.php');
include("staffauth.php");
$ID=stripslashes($_GET['ComplaintID']);
$query = "SELECT * from complaintreport where ComplaintID='".$ID."'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Record</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<body background="images/white-background-5.jpg">

<div class="form">
<ul><p><link rel="stylesheet"  href="css/style.css" />
<li><a href="staffindex.php">Home</a>  
<li><a  href="viewstaff.php">View Records</a>
<li><a  href="staffprofile.php">Profile</a>
<li style="float:right"><a href="logout.php">Logout</a></p></ul></br><br></br>
<center><h1>Update Progress</h1></center>
<?php
$status = "";
$dateUpdate = date("Y-m-d H:i:s");
if(isset($_POST['new']) && $_POST['new']==1)
{
$progress=$_REQUEST['Progress'];


$submittedby = $_SESSION["username"];
$update="update complaintreport set ReportStatus='".$progress."' where ComplaintID='".$ID."'";
mysqli_query($con, $update) or die(mysqli_error());
$status = "Record Updated Successfully. </br></br>
<a href='viewstaff.php'>View Updated Record</a>";
echo '<center><p style="color:#FF0000;">'.$status.'</p></center>';
	if ($progress == Completed)
	{
		
		$update="update complaintreport set reportDone='".$dateUpdate."' where ComplaintID='".$ID."'";
		mysqli_query($con, $update) or die(mysqli_error());
	}
	else{}

}else {
?>
<center><div>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row['ComplaintID'];?>" />

<select name="Progress" required>
 <option value="" disabled selected>Select Progress:</option>
  <option value="Pending">Pending</option>
  <option value="Ongoing">Ongoing</option>
  <option value="Completed">Complete</option></select>

<p><input name="submit" type="submit" value="Update" /></p>
</form>
<?php } ?>
</div>
</div></center>
</body>
</html>