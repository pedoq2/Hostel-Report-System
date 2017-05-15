<?php
session_start();
$image_url='images/LogoJawi.png' ;
include("auth.php"); //include auth.php file on all secure pages ?>
<!DOCTYPE html>
<html>
<head><ul><p>
<li><a class="active" href="index.php">Home</a> 
<li><a href="insert.php">Submit a Complaint</a>
<li><a href="view.php">View Records</a>
<li><a href="dashboard.php">Profile</a>
<li style="float:right"><a href="logout.php">Logout</a></p></ul>

<meta charset="utf-8">

<title>Welcome</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>

     <body background="images/white-background-5.jpg">

<div class="form"><br>

<p><center><img src="<?php echo $image_url;?>"><h2>HOSTEL COMPLAINT SYSTEM</h2>
</p><p>Welcome <?php echo $_SESSION['username']; ?>!</p>

<p><a href="dashboard.php">Profile</a></p>
<p><a href="insert.php">Submit a Complaint</a></p>
<p><a href="view.php">View submitted Complaint</a></p>
<a href="logout.php">Logout</a></center>

