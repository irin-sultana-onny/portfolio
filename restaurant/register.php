<?php
session_start();
include_once 'dbconnect.php';
$res=mysqli_query($con,"SELECT * FROM users WHERE user_id=".$_SESSION['user']);
 $userRow=mysqli_fetch_array($res);

if(isset($_POST['btn-signup']))
{
	$uname = mysqli_real_escape_string($con,$_POST['uname']);
	$email = mysqli_real_escape_string($con,$_POST['email']);
	$upass = md5(mysqli_real_escape_string($con,$_POST['pass']));
	$desig = mysqli_real_escape_string($con,$_POST['desig']);

	$uname = trim($uname);
	$email = trim($email);
	$upass = trim($upass);
	$desig = trim($desig);

	// email exist or not
	$query = "SELECT user_email FROM users WHERE user_email='$email'";
	$result = mysqli_query($con,$query);

	$count = mysqli_num_rows($result); // if email not found then register

	if($count == 0){

		if(mysqli_query($con,"INSERT INTO users(user_name,user_email,user_pass,designation,chefavlinfo,waiteravlinfo) VALUES('$uname','$email','$upass','$desig','1','1')"))
		{
			?>
			<script>alert('successfully registered ');</script>
			<?php
		}
		else
		{
			?>
			<script>alert('error while registering you...');</script>
			<?php
		}
	}
	else{
			?>
			<script>alert('Sorry Email ID already taken ...');</script>
			<?php
	}

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>TIK Restaurant</title>
<link rel="stylesheet" href="style.css" type="text/css" />
<link rel="stylesheet" href="styles.css">
<script src="script.js"></script>

</head>
<body background="pic/70276-vintage-background.png">
 <div id="header">
         <div id="left">
            <label>TIK Restaurant</label>
         </div>
         <div id="right">
            <div id="content">
               Welcome <?php echo $userRow['user_name']; ?>&nbsp;<a href="logout.php?logout">Sign Out</a>
            </div>
         </div>
      </div>
      <div id='cssmenu'>
      <ul>
         <li><a href='admin.php'>Home</a></li>
         <li class='active'><a href='register.php'>Add Employe</a></li>
         <li><a href='makeorder.php'>Make New Order</a></li>
         <li><a href='showorder.php'>Show Order</a></li>
         <li><a href='makecomplete.php'>Complete Order</a></li>
         <li><a href='employee.php'>Employee details</a></li>
		 <li><a href='requestedorder.php'>Show Requested Order</a></li>
		 <li><a href='requestfromemployee.php'>Complete Order Request</a></li>
      </ul>
    </div>
<center>
<div id="login-form">
<form method="post">
<table align="center" width="30%" border="0">
<tr>
<td><input type="text" name="uname" placeholder="Name" required /></td>
</tr>
<tr>
<td><input type="email" name="email" placeholder="Email" required /></td>
</tr>
<tr>
<td><input type="password" name="pass" placeholder="Password" required /></td>
</tr>
<tr>
<td><input type="designation" name="desig" placeholder="Designation, 1 for chef, 2 for waiter" required /></td>
</tr>
<tr>
<td><button type="submit" name="btn-signup">Sign Up</button></td>
</tr>
</table>
</form>
</div>
</center>
</body>
</html>
