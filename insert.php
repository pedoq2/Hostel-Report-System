<!DOCTYPE HTML>  
<html>
<head>
<ul><p>
<li><a href="index.php">Home</a>
<li><a class="active" href="insert.php">Submit a Complaint</a>
<li><a href="view.php">View Records</a> 
<li><a href="dashboard.php">Profile</a>
 
<li style="float:right"><a href="logout.php">Logout</a></p></ul>
<meta charset="utf-8">
<meta charset="utf-8">
<title>Insert New Record</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">


<style>
.error {color: #FF0000;}
</style>
</head>
<body>  
<body background="images/white-background-5.jpg">
<?php
session_start();
require('db.php');
include('auth.php');
include('style.css');

// define variables and set to empty values
$HostelErr  = $TypeErr = $DetailErr = "";
$Hostel  = $Type = $Detail = "";
$submittedby = $_SESSION["username"];
$ReportStatus = "Pending";
$StaffAssign = "No Staff Assign Yet";
$trn_date = date("Y-m-d H:i:s");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["Hostel"])) {
    $HostelErr = "  Hostel Name is required!";
  } else {
    $Hostel = test_input($_POST["Hostel"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$Hostel)) {
      $nameErr = "Only letters and white space allowed"; 
    }
  }
  
 if (empty($_POST["Type"])) {
    $TypeErr = "  Complaint Type is required!";
  } else {
    $Type = test_input($_POST["Type"]);
  }


if (empty($_POST["Detail"])) {
    $DetailErr = "  Please Write the details of Report!";
  } else {
    $Detail = test_input($_POST["Detail"]);
   
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
<div>

<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  

 <font color='red'>*</font> Hostel:
   
<select name="Hostel" required>
 <option value="" disabled selected>Select Hostel</option>
  <option value="Al-Jazari">Al-Jazari</option>
  <option value="Lestari">Lestari</option>
  <option value="Makmur">Makmur</option>
  <option value="Emerald Park">Emerald Park</option>
  <option value="Bunga Raya">Bunga Raya</option>
  <option value="Seri Utama">Seri Utama</option>
  <span class="error">   <?php echo $HostelErr;?></span>
  </select><br><br>
  

  <font color='red'>*</font> Complaint Type:
  <select name="Type" required>
 <option value="" disabled selected>Select Type</option>
  <option value="Electric">Electric</option>
  <option value="Telephone">Telephone</option>
  <option value="Building">Building</option>
  <option value="Furniture">Furniture</option>
  <option value="Sewerage">Sewerage</option>
  <option value="Others">Others</option>
  <span class="error">  <?php echo $TypeErr;?></span>
  </select><br><br>


 <font color='red'>*</font> Detail:<br>
  <tr><td colspan="5"><textarea name="Detail" rows="10" cols="50"></textarea></td></tr>
  
  </textarea><span class="error">   <?php echo $DetailErr;?></span>
  <br><br>

  <input type="submit" name="submit" value="Submit">  
</form>
<div>

<?php
       if (!empty($_POST["Hostel"]) && !empty($_POST["Type"]) && !empty($_POST["Detail"])){
        
       $ins_query= "INSERT into complaintreport (HostelName, TypeOfReport, Details,ReportStatus, Reporttrn_date , submittedBy,StaffAssign) VALUES ('$Hostel', '$Type', '$Detail','$ReportStatus','$trn_date','$submittedby','$StaffAssign')";
        $result = mysqli_query($con,$query);}

    
    mysqli_query($con,$ins_query)
    or die(mysql_error());

    if($result == mysqli_query($con,$query))
    header("Location:sentreportconfirmation.php");

    $HostelErr  = $TypeErr = $DetailErr = "";
$Hostel  = $Type = $Detail = "";
?>
</div>
</body>
</html>