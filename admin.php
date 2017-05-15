<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Admin Login</title>
<link rel="stylesheet" href="css/style.css" />
</head>

<style>

div {
   

}
</style><div><center>
<body>
<body background="images/white-background-5.jpg">
<?php
$image_url='images/LogoJawi.png' ;
require('db.php');
session_start();
// If form submitted, insert values into the database.
if (isset($_POST['Adminusername'])){
        // removes backslashes
	$Adminusername = stripslashes($_REQUEST['Adminusername']);
        //escapes special characters in a string
	$Adminusername = mysqli_real_escape_string($con,$Adminusername);
	$Adminpassword = stripslashes($_REQUEST['Adminpassword']);
	$Adminpassword = mysqli_real_escape_string($con,$Adminpassword);
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `admin` WHERE Adminusername='$Adminusername'
and Adminpassword='".md5($Adminpassword)."'";
	$result = mysqli_query($con,$query) or die(mysql_error());
	$rows = mysqli_num_rows($result);
        if($rows==1){
	    $_SESSION['Adminusername'] = $Adminusername;
            // Redirect user to indexAdmin.php
	    header("Location: indexAdmin.php");
         }else{
	echo "<div3 class='form'>
<h3>Username/password is incorrect.</h3>
<br/>Click here to <a href='admin.php'>Login</a></div3>";
	}
    }else{
?>
<center><img src="<?php echo $image_url;?>"></center>
<div1 class="form">
<h1>Admin Log In</h1>
<form action="" method="post" name="login">
<input type="text" name="Adminusername" placeholder="Username" required /><br>
<input type="password" name="Adminpassword" placeholder="Password" required /><br><br>
<input name="submit" type="submit" value="Login" />
</form><br><br>
<p>Not an Admin? <a href='login.php'>Login As User Here</a></p>
</div1>
</div>
<?php } ?>
</body>
</html>