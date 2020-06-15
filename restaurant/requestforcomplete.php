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

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
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
     	 <li><a href='home.php'>Home</a></li>
     	 <li><a href='userprofile.php'>My Profile</a></li>
		 <li class='active'><a href='requestforcomplete.php'>Complete Order</a></li>
     </ul>
     </div> <br> <br> <br> <br>
	 <div class="row">
          <div class="span6 offset3">
            <h4 class="widget-header"><i class="icon-gift"></i> Complete Order</h4>
            <div class="widget-body">
              <div class="center-align">
                <form class="form-horizontal form-signin-signup" action="completerequest.php" method="post">

                  <input type="text" name="name" placeholder="ID NO :" required> <br> <br>

                  <div>
                    <input type="submit" value="Request for Complete Order" class="btn btn-primary btn-large">
                  </div>
                </form>

              </div>
            </div>
          </div>
        </div>


</body>
</html>
