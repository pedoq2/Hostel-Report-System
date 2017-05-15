<?php

include("Adminauth.php"); 
$image_url='images/LogoJawi.png' ;//include auth.php file on all secure pages ?>
<!DOCTYPE html>
<html>
<head>
<ul><p>
<li><a class="activ" href="indexAdmin.php">Home</a>  
<li><a href="viewAdmin.php">View Records</a>
<li><a  href="analysis.php">Chart</a>
<li style="float:right"><a href="logout.php">Logout</a></p></ul>
<meta charset="utf-8">
<title>Welcome Home</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<body background="images/white-background-5.jpg">
<div class="form">
<p><center><img src="<?php echo $image_url;?>"><h2>HOSTEL COMPLAINT SYSTEM</h2>
<p>Welcome <?php echo $_SESSION['Adminusername']; ?>!</p>

<p><a href="viewAdmin.php">View Complaint Report</a></p>
<p><a href="analysis.php">View Chart</a></p>
<a href="logout.php">Logout</a></center>


<br /><br /><br /><br />

</div>
</body>
</html>
