
<?php
require('db.php');
include("Adminauth.php");
$ID=stripslashes($_GET['ComplaintID']);
$query = "SELECT * from complaintreport where ComplaintID='".$ID."'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head><ul><p>
<li><a href="indexAdmin.php">Home</a>  
<li><a href="viewAdmin.php">View Records</a>
<li><a  href="analysis.php">Chart</a>
<li style="float:right"><a href="logout.php">Logout</a></p></ul>
<meta charset="utf-8">
<title>Update Record</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<body background="images/white-background-5.jpg">


<br><br><br><center><h1>Delete Record?</h1><center>
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$confirmation=$_REQUEST['confirmation'];

if($confirmation == "Yes"){
	$submittedby = $_SESSION["username"];
	$delete="Delete from complaintreport where ComplaintID='".$ID."'";
	mysqli_query($con, $delete) or die(mysqli_error());
	$status = "Record Deleted Successfully. </br></br>
	<a href='viewAdmin.php'>View Updated Record</a>";
	echo '<p style="color:#FF0000;">'.$status.'</p>';}
else{header("Location: viewAdmin.php");}

}else {
?>
<center><div>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row['ComplaintID'];?>" />
<p><input type="radio" name="confirmation"  value="Yes">Yes
<input type="radio" name="confirmation"  value="No">No
 </p>

<p><input name="submit" type="submit" value="confirm" /></p>
</form><center>
<?php } ?>
</div>
</div>
</body>
</html>
