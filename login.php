<?php

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Hostel Complaint System</title>
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
    $LogAs=stripcslashes($_REQUEST['LogAs']);
    // If form submitted, insert values into the database.
    if (isset($_POST['username']) && $LogAs==Resident){
		
		$username = stripslashes($_REQUEST['username']); // removes backslashes
		$username = mysqli_real_escape_string($con,$username); //escapes special characters in a string
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);
		
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `users` WHERE username='$username' and password='".md5($password)."'";
		$result = mysqli_query($con,$query) or die(mysql_error());
		$rows = mysqli_num_rows($result);
		
        if($rows==1){
        				$_SESSION['username'] = $username;
			header("Location: index.php"); // Redirect user to index.php
            }
            else{
				echo "<div3 class='form'><h3>Username/password is incorrect.</h3><br/>Click here to <a href='login.php'>Login</a></div3>";
				}
    }
    if (isset($_POST['username']) && $LogAs==Staff){
        
        $username = stripslashes($_REQUEST['username']); // removes backslashes
        $username = mysqli_real_escape_string($con,$username); //escapes special characters in a string
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con,$password);
        
    //Checking is user existing in the database or not
           $query = "SELECT * FROM `staff` WHERE staffusername='$username' and staffpassword='".md5($password)."'";
        $result = mysqli_query($con,$query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
            if($rows==1){
                        $_SESSION['staffusername'] = $username;
            header("Location: staffindex.php"); // Redirect user to index.php
            }
            
            else{
                echo "<div3 class='form'><h3>Username/password is incorrect.</h3><br/>Click here to <a href='login.php'>Login</a></div3>";
                }}

if (isset($_POST['username']) && $LogAs==Admin){
        
        $username = stripslashes($_REQUEST['username']); // removes backslashes
        $username = mysqli_real_escape_string($con,$username); //escapes special characters in a string
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con,$password);
        
    //Checking is user existing in the database or not
          $query = "SELECT * FROM `admin` WHERE Adminusername='$username' and Adminpassword='".md5($password)."'";
        $result = mysqli_query($con,$query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
            if($rows==1){
                        $_SESSION['Adminusername'] = $username;
            header("Location: indexAdmin.php"); // Redirect user to index.php
            }
            else{
                echo "<div3 class='form'><h3>Username/password is incorrect.</h3><br/>Click here to <a href='login.php'>Login</a></div3>";
                }

                
        }else{



?>
<center><img src="<?php echo $image_url;?>"></center>
<div1 class="form">
<h1>Hostel Complaint System</h1>
<h2>Log In</h2>
<form action="" method="post" name="login">
<input type="text" name="username" placeholder="Username" required /><br>
<input type="password" name="password" placeholder="Password" required /><br>

<select name="LogAs" required>
 <option value="" disabled selected>Log In As :</option>
  <option value="Resident">Hostel Resident</option>
  <option value="Staff">Staff</option>
  <option value="Admin">Admin</option>
  
</select><br><br><input name="submit" type="submit" value="Login" />
</form><br>
<p>Click to Register For <a href='registration.php'>Hostel Resident </a>or <a href='Staffregister.php'>Staff </a></p>

</div1>
</div>

<?php } ?>


</body>
</html>
