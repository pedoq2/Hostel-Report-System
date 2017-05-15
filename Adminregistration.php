<?php

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Admin Registration</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<style>
div {
   
  
}
</style><div>
<body>
<body background="http://hdwallpaperbackgrounds.net/wp-content/uploads/2016/07/white-background-5.jpg">
<?php
$image_url='http://www.utem.edu.my/portal/image/newlogo/LogoJawi.png' ;
	require('db.php');
    // If form submitted, insert values into the database.
    if (isset($_REQUEST['Adminusername'])){
		$Adminusername = stripslashes($_REQUEST['Adminusername']); // removes backslashes
		$Adminusername = mysqli_real_escape_string($con,$Adminusername); //escapes special characters in a string
		$Adminemail = stripslashes($_REQUEST['Adminemail']);
		$Adminemail = mysqli_real_escape_string($con,$Adminemail);
		$Adminpassword = stripslashes($_REQUEST['Adminpassword']);
		$Adminpassword = mysqli_real_escape_string($con,$Adminpassword);

		$Admintrn_date = date("Y-m-d H:i:s");
        $query = "INSERT into `admin` (Adminusername, Adminpassword, Adminemail, Admintrn_date) VALUES ('$Adminusername', '".md5($Adminpassword)."', '$Adminemail', '$Admintrn_date')";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<div3 class='form'><h3>You are registered successfully.</h3><br/>Click here to <a href='admin.php'>Login</a></div3>";
        }
    }else{
?>
<center><img src="<?php echo $image_url;?>">
<div1 class="form">
<h1>Admin Registration</h1>
<form name="registration" action="" method="post">
<input type="text" name="Adminusername" placeholder="Username" required /><br>
<input type="text" name="email" placeholder="Email" required /><br>
<input type="password" name="Adminpassword" placeholder="Password" required /><br><br>
<input type="submit" name="submit" value="Register" /></center>
</form>
<br /><br />

</div1>
</div>
<?php } ?>
</body>
</html>
