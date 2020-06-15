<?php
session_start();
include_once 'dbconnect.php';

if(!isset($_SESSION['user']))
{
	header("Location: index.php");
}
$res=mysqli_query($con,"SELECT * FROM users WHERE user_id=".$_SESSION['user']);
$userRow=mysqli_fetch_array($res);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>TIK Restaurant</title>
<link rel="stylesheet" href="style.css" type="text/css" />
<link rel="stylesheet" href="styles.css">
<script src="script.js"></script>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/font-awesome.css" rel="stylesheet">
<link href="css/font-awesome-ie7.css" rel="stylesheet">
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
	 <li class='active'><a href='home.php'>Home</a></li>
	 <li><a href='userprofile.php'>My Profile</a></li>
	 <li><a href='requestforcomplete.php'>Complete Order</a></li>
</ul>
</div>
<div class="content">
      <!-- Start: SERVICE LIST -->
        <div class="container">
          <div class="page-header">
            <h2>Our Food Items</h2>
          </div>
          <div class="row-fluid">
            <ul class="thumbnails">
              <li class="span3">
                <div class="thumbnail">
                  <img src="img/image food/food2.jpg" alt="product name">
                  <div class="caption">
                    <h3>Rosted Kabab.</h3>
                    <p>
					   Item no:1 <br>
					   Fride rice with rosted Kabab.
                       price:400Taka.
                    </p>
                  </div>

                </div>
              </li>
              <li class="span3">
                <div class="thumbnail">
                  <img src="img/image food/food8.jpg" alt="product name">
                  <div class="caption">
                    <h3>Crispy Brade</h3>
                    <p>
					  Item no:2 <br>
                      Criscy Brade with butter.
                       price:50taka(each).
                    </p>
                  </div>

                </div>
              </li>
              <li class="span3">
                <div class="thumbnail">
                  <img src="img/image food/food1.jpg" alt="product name">
                  <div class="caption">
                    <h3>Nan Ruti</h3>
                    <p>
					  Item no:3 <br>
                      TIK Special Nan cake. <br>
                       price:300Taka.
                    </p>
                  </div>

                </div>
              </li>
              <li class="span3">
                <div class="thumbnail">
                  <img src="img/image food/food3.jpg" alt="product name">
                  <div class="caption">
                    <h3>Paratha kabab</h3>
                    <p>
					  Item no:4 <br>
                      Paratha with rosted Kabab.
                       price:350Taka.
                    </p>
                  </div>

                </div>
              </li>
            </ul>
          </div>
          <div class="row-fluid">
            <ul class="thumbnails">
              <li class="span3">
                <div class="thumbnail">
                  <img src="img/image food/food4.jpg" alt="product name">
                  <div class="caption">
                    <h3>Faluda</h3>
                    <p>
					  Item no:5 <br>
                      Special Faluda with froots.
                       price:320Taka.
                    </p>
                  </div>

                </div>
              </li>
              <li class="span3">
                <div class="thumbnail">
                  <img src="img/image food/food5.jpg" alt="product name">
                  <div class="caption">
                    <h3>Special rice mix</h3>
                    <p>
					  Item no:6 <br>
                      Rice with mixed vuna. <br>
                       price:450Taka.
                    </p>
                  </div>

                </div>
              </li>
              <li class="span3">
                <div class="thumbnail">
                  <img src="img/image food/food6.jpg" alt="product name">
                  <div class="caption">
                    <h3>Special Moglai</h3>
                    <p>
					 Item no:7 <br>
                     Maglai Paratha.<br>
                     price:120Taka.
                    </p>
                  </div>

                </div>
              </li>
              <li class="span3">
                <div class="thumbnail">
                  <img src="img/image food/food7.jpg" alt="product name">
                  <div class="caption">
                    <h3>Adana Kabab</h3>
                    <p>
					 Item no:8 <br>
                      Adana Kabab. <br>
                       price:160Taka.
                    </p>
                  </div>

                </div>
              </li>
            </ul>
          </div>

      <!-- End: SERVICE LIST -->
    </div>
    <!-- End: MAIN CONTENT -->



</body>
</html>
