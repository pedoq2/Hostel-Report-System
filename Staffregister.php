<?php

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Staff Registration</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<style>
div {
   
  
}
</style><div>
<body>
<body background="images/white-background-5.jpg">
<?php
session_start();
$image_url='images/LogoJawi.png' ;
	require('db.php');
    // If form submitted, insert values into the database.
    if (isset($_REQUEST['username'])){
		$username = stripslashes($_REQUEST['username']); // removes backslashes
		$username = mysqli_real_escape_string($con,$username); //escapes special characters in a string
		$email = stripslashes($_REQUEST['email']);
		$email = mysqli_real_escape_string($con,$email);

		$Staffno = stripslashes($_REQUEST['staffno']);
		$Staffno = mysqli_real_escape_string($con,$Staffno);

		$FullName = stripslashes($_REQUEST['fullname']);
		$FullName = mysqli_real_escape_string($con,$FullName);
		
		
		$Phone = stripslashes($_REQUEST['Phone']);
		$Phone = mysqli_real_escape_string($con,$Phone);

		$password = stripslashes($_REQUEST['password']);

		$repassword = stripslashes($_REQUEST['repassword']);
		$result = 0;
		$trn_date = date("Y-m-d H:i:s");
		if($password == $repassword)
        {$query = "INSERT into `staff` (staffusername, staffpassword, staffemail, stafftrn_date ,staffphone,staffFullName, staffno) VALUES ('$username', '".md5($password)."', '$email', '$trn_date' , '$Phone','$FullName' , '$Staffno' )";
        $result = mysqli_query($con,$query);}
        else{
        	echo "<br><br><br><br><br><br><br><br><br><center><div3><font color='red'> <class='form'><h3>Your Password Is Not match!</h3></font></div3><center>";
        	
        }

        	if($result){
            	echo "<center><div3 class='form'><h3>You are registered successfully.</h3><br/>Click here to <a href='login.php'>Login</a></div3><center>";
        }
    }else{
?>
<center><img src="<?php echo $image_url;?>">
<div1 class="form">
<h1>Registration</h1>
<form name="registration" action="" method="post">
Full Name : <input type="text" name="fullname" placeholder="Full Name" required /><br>
Username : <input type="text" name="username" placeholder="Example123" required /><br>
Staff Number :  <input type="number" name="staffno" placeholder="Staff Number" required /><br>

E-mail :  <input type="email" name="email" placeholder="Example123@mail.com" required /><br>

Phone Number : <input type="number" name="Phone" placeholder="01XXXXXXXXX" required /><br>
Password  : <input type="password" name="password" placeholder="Password" required /><br>
Re-type Password : <input type="password" name="repassword" placeholder="Re-Type Password" required /><br><br>
<input type="submit" name="submit" value="Register" /></center>

</form>
<br /><br />

</div1>
</div>
<?php } ?>
</body>
</html>
