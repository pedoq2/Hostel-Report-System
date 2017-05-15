<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php

require('db.php');
include('auth.php'); //include auth.php file on all secure pages ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Dashboard - Secured Page</title>
<link rel="stylesheet" href="css/style.css" />
</head><center>
<?php
require('db.php');
// define variables and set to empty values
$HostelErr = $TypeErr =$DetailErr  = "";
$Hostel = $Type = $Detail  = "";
$Reporttrn_date =date("Y-m-d H:i:s");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["Hostel"])) {
    $HostelErr = "Hostel Name is required!";

  } else {
    $Hostel = test_input($_POST["Hostel"]);
    $Hostel= mysqli_real_escape_string($con,$Hostel);
   
    }
  
  
  }
  
  if (empty($_POST["Type"])) {
    $typeErr = "Complaint Type is required!";
  } else {
    $Type = test_input($_POST["Type"]);
   $Type = mysqli_real_escape_string($con,$Type);
  }

  if (empty($_POST["Detail"])) {
    $DetailErr = "Please Write the details of Report";
  } else {
    $Detail = test_input($_POST["Detail"]);
    $Detail= mysqli_real_escape_string($con,$Detail);
   
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


?>

<h2>Report</h2>
<p><span style="color:#FF0000" <span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
 <font color='red'>*</font> Hostel:
  <input type="radio" name="Hostel" value="Al-Jazari">Al-Jazari
  <input type="radio" name="Hostel" value="Lestari">Lestari
  <input type="radio" name="Hostel" value="Makmur">Makmur
  <input type="radio" name="Hostel" value="Emerald Park">Emerald Park
  <input type="radio" name="Hostel" value="Bunga Raya">Bunga Raya
  <span class="error">* <?php echo $HostelErr;?></span>
  <br><br>

  

 Complaint Type:
  <input type="radio" name="Type" value="Facility">Facility
  <input type="radio" name="Type" value="Furniture">Furniture
   <input type="radio" name="Type" value="Others">Others
  
  <br><br>

  Detail:<input type="text" name='Detail' placeholder="Report Details"  maxlength="2048"></textarea><span class="error">* <?php echo $DetailErr;?></span>
  <br><br>
  
  
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>
</centre>

</body>
</html>
