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
         <li class='active'><a href='showorder.php'>Show Order</a></li>
         <li><a href='makecomplete.php'>Complete Order</a></li>
         <li><a href='employee.php'>Employee details</a></li>
		 <li><a href='requestedorder.php'>Show Requested Order</a></li>
		 <li><a href='requestfromemployee.php'>Complete Order Request</a></li>
      </ul>
    </div>
<?php
$query=mysqli_query($con,"SELECT * FROM foodorder") or die(mysqli_error());
if(mysqli_num_rows($query)>0):
?>
<tr>
         <div id="body">
            <a>Ordered Items</a>
         </div>
      </tr>
      <form method="post">
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
    <td align="center"><?php
    if($row->completestatus==1)
     echo "Yes";
      else
      echo "NO";

    ?></td>
    <td align="center"><?php echo $row->created_at;  ?></td>
  <?php endwhile;?>
   </form>
  </center>
</table>
</center>

<?php
// no result show
else: ?>
<h3>No Results found.</h3>
<?php endif; ?>
</body>
</html>
