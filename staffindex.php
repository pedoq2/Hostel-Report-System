<?php
$image_url='images/LogoJawi.png' ;
include("staffauth.php"); //include auth.php file on all secure pages ?>
<!DOCTYPE html>
<html>
<head>
<ul><p>
<li><a class="acti" href="staffindex.php">Home</a>  
<li><a href="viewstaff.php">View Assigned Complaint</a>
<li><a  href="staffprofile.php">Profile</a>

<li style="float:right"><a href="logout.php">Logout</a></p></ul>
<meta charset="utf-8">
<title>Welcome Home</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<body background="images/white-background-5.jpg">
<div class="form"><br>
<p><center><img src="<?php echo $image_url;?>">
</p><h2>HOSTEL COMPLAINT SYSTEM</h2>
<p>Welcome <?php echo $_SESSION['staffusername']; ?>!</p>
<p><a href="viewstaff.php">View Assigned Complaint</a></p>
<p><a href="staffprofile.php">Profile</a></p>
<a href="logout.php">Logout</a></center>


<br /><br /><br /><br />

</div>
</body>
</html>
