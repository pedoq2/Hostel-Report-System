<?php
require('db.php');
include("Adminauth.php");
?>
<!DOCTYPE html>
<html><html><link rel="stylesheet"  href="css/style.css" />
<head>
<ul><p>
<li><a class="activ" href="indexAdmin.php">Home</a>  
 <li><a href="viewAdmin.php">View Records</a>
 <li><a  href="analysis.php">Chart</a>
<li style="float:right"><a href="logout.php">Logout</a></p></ul>
<meta charset="utf-8">
<title>Dashboard - Secured Page</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>

<body background="images/white-background-5.jpg">
<div class="form">
<p>Welcome to Dashboard.</p>
<p><a href="indexAdmin.php">Home</a><p>
<p><a href = "analysis.php ">graph</a><p>
<p><a href="viewAdmin.php">View Records</a><p>
<p><a href="logout.php">Logout</a></p>
</div>
</body>
</html>