<?php
require('db.php');
$ID=stripslashes($_GET['id']);
$query = "SELECT * from users where id='".$ID."'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Profile</title>
<link rel="stylesheet" href="css/style.css" />

<ul><p>
<li><a href="index.php">Home</a>  
<li><a href="insert.php">Insert New Record</a> 
<li><a href="view.php">View Records</a>
<li><a class='active' >Profile</a>
<li style="float:right"><a href="logout.php">Logout</a></p></ul>
</head>
<style>
div {
   
  
}
</style><div>
<body>
<body background="images/white-background-5.jpg">
<?php
session_start();

	
    // If form submitted, insert values into the database.
    if (isset($_REQUEST['username'])){
		
		$email = stripslashes($_REQUEST['email']);
		$email = mysqli_real_escape_string($con,$email);

		$Matric = stripslashes($_REQUEST['MatricNo']);
		$Matric = mysqli_real_escape_string($con,$Matric);

		
		
		$Phone = stripslashes($_REQUEST['Phone']);
		$Phone = mysqli_real_escape_string($con,$Phone);

		$password = stripslashes($_REQUEST['password']);

		$repassword = stripslashes($_REQUEST['repassword']);

		$result = 0;
		
		if($password == $repassword)
        {$query = "update users set password ='".md5($password)." , email='".$email." , matricno ='".$Matric." ,phone ='".$Phone." WHERE id ='".$ID."'";
        $result = mysqli_query($con,$query) or die(mysqli_error());}
        else{
        	echo "<br><br><br><br><br><br><br><br><br><center><div3><font color='red'> <class='form'><h3>Your Password Is Not match!</h3></font></div3><center>";
        }

        	if($result == mysqli_query($con,$query)){
            	echo "<center><div3 class='form'><h3>You are registered successfully.</h3><br/>Click here to <a href='login.php'>Login</a></div3><center>";
        }
    }else{
?>
<img src="<?php echo $image_url;?>">
<div1 class="form">
<h1>Update Profile</h1>


<form name="registration" action="" method="post">
E-mail :  <input type="text" name="email" placeholder="Email" required /><br>
Matric No :<input type="text" name="MatricNo" placeholder="Matric Number" required /><br>
Phone Number : <input type="text" name="Phone" placeholder="Phone Number" required /><br>
Password  : <input type="password" name="password" placeholder="Password" required /><br>
Re-type Password : <input type="password" name="repassword" placeholder="Re-Type Password" required /><br><br>
<input type="submit" name="submit" value="Update" />

</form>
<br /><br />

</div1>
</div>
<?php } ?>
</body>
</html>
