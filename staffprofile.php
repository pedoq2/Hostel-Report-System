<?php
require('db.php');
include("staffauth.php");

$username=($_SESSION['staffusername']);

$sel_query="SELECT * from staff where staffusername='".$username."'";
$result = mysqli_query($con,$sel_query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
$edit = "Edit Profile";
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Profile</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body><body background="images/white-background-5.jpg"><br><br>
<h1>Profile</h1>

<ul><p>
<li><a href="staffindex.php">Home</a>  

<li><a href="viewstaff.php">View Assigned Complaint</a>
<li><a class='acti' href="dashboard.php">Profile</a>
<li style="float:right"><a href="logout.php">Logout</a></p></ul>
<br>
<thead>


</thead>
<tbody>
<?php
$count=1;
$sel_query="SELECT * from staff where staffusername='".$username."'";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
<td align="center"><strong>Full Name : </strong><?php echo $row["staffFullName"]; ?></td><br><br>
<td align="center"><strong>User Name: </strong>
<?php echo $row["staffusername"]; ?></td><br><br>
<td align="center"><strong>Staff Number: </strong><?php echo $row["staffno"]; ?></td><br><br>
<td align="center"><strong>E-mail: </strong><?php echo $row["staffemail"]; ?></td><br><br>

<td align="center"><strong>Phone Number : </strong><?php echo $row["staffphone"]; ?></td><br><br>

<td align="center">


</td><br><br>


</tr>
<?php $count++; } ?>

</tbody>
</table>
</div>



</body>
</html>