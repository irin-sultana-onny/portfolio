<?php
session_start();
include_once 'dbconnect.php';
$res=mysqli_query($con,"SELECT * FROM users WHERE user_id=".$_SESSION['user']);
 $userRow=mysqli_fetch_array($res);

if(isset($_POST['btn-order']))
{
	$cname = mysqli_real_escape_string($con,$_POST['cname']);
	$stable = mysqli_real_escape_string($con,$_POST['stable']);
	$selectchef = mysqli_real_escape_string($con,$_POST['selectchef']);
	$selectwaiter = mysqli_real_escape_string($con,$_POST['selectwaiter']);
	$food = mysqli_real_escape_string($con,$_POST['food']);

	$cname = trim($cname);
	$stable = trim($stable);
	$selectchef = trim($selectchef);
	$selectwaiter = trim($selectwaiter);
	$food = trim($food);

	if(0 == 0){

		if(mysqli_query($con,"INSERT INTO foodorder(customar_name,table_number,chef_name,waiter_name,food_details) VALUES('$cname','$stable','$selectchef','$selectwaiter','$food')"))
		{
			 mysqli_query($con,"UPDATE users SET  chefavlinfo=0 WHERE user_name='$selectchef'");
			 mysqli_query($con,"UPDATE users SET  waiteravlinfo=0 WHERE user_name='$selectwaiter'");
       mysqli_query($con,"UPDATE users SET  total_order=total_order+1 WHERE user_name='$selectwaiter'");
       mysqli_query($con,"UPDATE users SET  total_order=total_order+1 WHERE user_name='$selectchef'");
			?>
			<script>alert('successfully ordered ');</script>
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
         <li><a href='register.php'>Add Employe</a></li>
         <li class='active'><a href='makeorder.php'>Make New Order</a></li>
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
<td><input type="text" name="cname" placeholder="Customar Name" required /></td>
</tr>
<tr>
<td><input type="text" name="stable" placeholder="Enter Table Number. ex: 5" required /></td>
</tr>
<tr>
<td>
  <P>Select Chef</p>
<?php
$query = "SELECT * FROM users WHERE designation=1 && chefavlinfo=1";
$result = mysqli_query($con,$query);
?>
<select name="selectchef" >
<?php while ($row=mysqli_fetch_array($result)) {
	?>
	<option value="<?php echo $row['user_name'];?>"> <?php echo $row['user_name'];
	?>
	 </option>
<?php
}
?>
</select></td>
</tr>
<tr>
<td>
  <P>Select Waiter</p><?php
$query = "SELECT * FROM users WHERE designation=2 && waiteravlinfo=1";
$result = mysqli_query($con,$query);
?>

<select name="selectwaiter">
<?php while ($row=mysqli_fetch_array($result)) {
	?>
	<option value="<?php echo $row['user_name'];?>"> <?php echo $row['user_name'];
	?>
	 </option>
<?php
}
?>
</select></td>
</tr>

<td><input type="text" name="food" placeholder="Food Details" required /></td>
</tr>
<tr>
<td><button type="submit" name="btn-order">Make Order</button></td>
</tr>
</table>
</form>
</div>
</center>
</body>
</html>
