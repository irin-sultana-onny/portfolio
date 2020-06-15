<?php
session_start();
include_once 'dbconnect.php';
$res=mysqli_query($con,"SELECT * FROM users WHERE user_id=".$_SESSION['user']);
$userRow=mysqli_fetch_array($res);
?>
<!DOCTYPE html >
<html >
<head>
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
        <li><a href='makeorder.php'>Make New Order</a></li>
        <li><a href='showorder.php'>Show Order</a></li>
        <li><a href='makecomplete.php'>Complete Order</a></li>
        <li class='active'><a href='employee.php'>Employee details</a></li>
		<li><a href='requestedorder.php'>Show Requested Order</a></li>
		<li><a href='requestfromemployee.php'>Complete Order Request</a></li>
     </ul>
   </div>
<center>
  <form method="post">
<div id="body">
   <a>Select Employee Name</a>
   <br>
   <?php
   $query = "SELECT * FROM users WHERE user_id>1";
   $result = mysqli_query($con,$query);
   ?>

   <select name="select1">
   <?php while ($row=mysqli_fetch_array($result)) {
   	?>
   	<option value="<?php echo $row['user_name'];?>"> <?php echo $row['user_name'];
   	?>
   	 </option>
   <?php
   }
   ?>
   </select>
   <br>
   <tr>
   <td><button type="submit" name="btn-go">Show Details</button></td>
   </tr>
 </form>
 </div>
 </center>
 <?php
 if(isset($_POST['btn-go']))
  {
    $employeename = mysqli_real_escape_string($con,$_POST['select1']);

    $employeename = trim($employeename);

  }
  $querytest=mysqli_query($con,"SELECT * FROM users WHERE user_name='$employeename'") or die(mysqli_error());
 $query=mysqli_query($con,"SELECT * FROM foodorder WHERE waiter_name='$employeename' || chef_name='$employeename'") or die(mysqli_error());
 if(mysqli_num_rows($querytest)>0):
 ?>
 <tr>
          <div id="body">
             <a>Employee Profile</a>
          </div>
</tr>
<br>
<center>
  <p>Employee Name: <?php echo "$employeename"; ?></p>
  <p>Designation  : <?php
  $query2=mysqli_query($con,"SELECT * FROM users WHERE user_name='$employeename'") or die(mysqli_error());
  $row=mysqli_fetch_object($query2);
  if( $row->designation == 1)
  echo "Chef";
  else {
    echo "Waiter";
  }

   ?>
   <p>Total Number Of Order :<?php echo "$row->total_order" ?></p>
</center>
 <tr>
          <div id="body">
             <a>Order Details</a>
          </div>
</tr>
 <center>
 <table>
 <center>
   <tr>
     <td align="center">Id</td>
     <td align="center">Customar Name</td>
     <td align="center">Table Number</td>
     <td align="center">Chef Name</td>
     <td align="center">Waiter Name</td>
     <td align="center">Ordered Item</td>
     <td align="center">Order Complete Status</td>
     <td align="center">Time</td>
   </tr>
   <?php
   while($row=mysqli_fetch_object($query)):?>
   <tr>
     <td align="center"><?php echo $row->order_id;?></td>
     <td align="center"><?php echo $row->customar_name; ?></td>
     <td align="center"><?php echo $row->table_number;?></td>
     <td align="center"><?php echo $row->chef_name; ?></td>
     <td align="center"><?php echo $row->waiter_name; ?></td>
     <td align="center"><?php echo $row->food_details;  ?></td>
     <td align="center"><?php if($row->completestatus=1) echo "Yes"; else echo "No";;  ?></td>
     <td align="center"><?php echo $row->created_at;  ?></td>
   </tr>
   <?php endwhile;?>
   </center>
 </table>
 </center>
 <?php
 // no result show
 else: ?>
 <h3>No Result found</h3>
 <?php endif; ?>
</div>
</body>
</html>
