<?php   
require('db.php');

?>



<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Record</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<body background="images/white-background-5.jpg">


<div class="form">

<ul><p>
<li><a onclick="history.go(-1);">Back </a>  
 
<li><a class="actives" >View Records</a>
<li style="float:right"><a href="logout.php">Logout</a></p></ul><br><br>
<script>
	function generatePdfA() {
		document.forms['getcsvpdf'].action = 'pdfReport.php';
		document.forms['getcsvpdf'].submit();
	}
</script>
<form name="getcsvpdf" action="pdfReport.php" method="POST">

<h1>Record View</h1></div>


<br>

<thead>


</thead>
<tbody>

 
<select name="LogAs" required>
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





</tbody>
</table>
</div>
</body>
</html>
