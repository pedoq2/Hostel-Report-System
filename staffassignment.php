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
<head>
<meta charset="utf-8">
<title>Update Record</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<body background="images/white-background-5.jpg">

<div class="form">
<ul><p>
<li><a href="indexAdmin.php">Home</a>  
<li><a href="viewAdmin.php">View Records</a>
<li><a  href="analysis.php">Chart</a>
<li style="float:right"><a href="logout.php">Logout</a></p></ul><br></br><br></br>
<center><h1>Staff Assignment</h1></center>
<?php
$status = "";
$dateUpdate = date("Y-m-d H:i:s");
if(isset($_POST['new']) && $_POST['new']==1)
{
$Assign=$_REQUEST['Assign'];


$submittedby = $_SESSION["username"];
$update="update complaintreport set StaffAssign='".$Assign."' where ComplaintID='".$ID."'";
mysqli_query($con, $update) or die(mysqli_error());
$status = "Record Updated Successfully. </br></br>
<a href='viewAdmin.php'>View Updated Record</a>";
echo '<center><p style="color:#FF0000;">'.$status.'</p></center>';
	

}else {
?>
<center><div>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row['ComplaintID'];?>" />
 <select name="Assign" required><option value="" disabled selected>Assign A Staff :</option>
<?php
$count=1;
$sel_query="SELECT staffusername from staff ";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr>

<option><?php echo $row["staffusername"]; ?></option>
</td>
</tr>
<?php $count++; } ?>
</select>

     <input type="submit" name="submit" value="Assign"/> 
     <br><br></p>
</form>
<?php } ?>
</div>
</div></center>
</body>
</html>