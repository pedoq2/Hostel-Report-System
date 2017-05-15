<?php
require('db.php');


$username=($_GET['submittedBy']);

$sel_query="SELECT * from users where username='".$username."'";
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
<li><a onclick="history.go(-1);">Back </a> 

<li><a class='actives' >View Profile</a>
<li style="float:right"><a href="logout.php">Logout</a></p></ul>
<br>
<thead>


</thead>
<tbody>
<?php
$count=1;
$sel_query="SELECT * from users where username='".$username."'";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
<td align="center"><strong>Full Name : </strong><?php echo $row["UserFullName"]; ?></td><br><br>
<td align="center"><strong>User Name: </strong>
<?php echo $row["username"]; ?></td><br><br>
<td align="center"><strong>E-mail: </strong><?php echo $row["email"]; ?></td><br><br>
<td align="center"><strong>Matric Number : </strong><?php echo $row["matricno"]; ?></td><br><br>

<td align="center"><strong>Phone Number : </strong><?php echo $row["phone"]; ?></td><br><br>

<td align="center">


</td><br><br>


</tr>
<?php $count++; } ?>

</tbody>
</table>
</div>



</body>
</html>