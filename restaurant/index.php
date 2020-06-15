<?php
session_start();
include_once 'dbconnect.php';

if(isset($_SESSION['user'])!="")
{
	header("Location: home.php");
}

if(isset($_POST['btn-login']))
{
	$email = mysqli_real_escape_string($con,$_POST['email']);
	$upass = mysqli_real_escape_string($con,$_POST['pass']);

	$email = trim($email);
	$upass = trim($upass);

	$res=mysqli_query($con,"SELECT user_id, user_name, user_pass FROM users WHERE user_email='$email'");
	$row=mysqli_fetch_array($res);

	$count = mysqli_num_rows($res); // if uname/pass correct it returns must be 1 row

	if($count == 1 && $row['user_pass']==md5($upass))
	{
		if($row['user_id']==1)
		{
	    $_SESSION['user'] = $row['user_id'];
		header("Location: admin.php");
		}
		else{
		$_SESSION['user'] = $row['user_id'];
		header("Location: home.php");
		}
	}
	else
	{
		?>
        <script>alert('Please enter email and password');</script>
        <?php
	}

}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Bootbusiness | Short description about company">
    <meta name="author" content="Your name">
    <title>Sign_in</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap responsive -->
    <link href="css/bootstrap-responsive.min.css" rel="stylesheet">
    <!-- Font awesome - iconic font with IE7 support -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/font-awesome-ie7.css" rel="stylesheet">
    <!-- Bootbusiness theme -->
    <link href="css/boot-business.css" rel="stylesheet">
  </head>
  <body>
    <!-- Start: HEADER -->
    <header>

      <!-- Start: Navigation wrapper -->
      <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
          <div class="container">
            <a href="index.html" class="brand brand-bootbus">TIK Restaurant</a>
            <!-- Below button used for responsive navigation -->
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <!-- Start: Primary navigation -->
            <div class="nav-collapse collapse">
              <ul class="nav pull-right">
								<li>
                  <a href="all_services.html" >Menu</a>
                  <!-- <ul class="dropdown-menu">
                    <li class="nav-header"></li>
                    <li><a href="#">Breakfast</a></li>
                    <li><a href="#">Lunch</a></li>
                    <li><a href="#">Combo</a></li>
                    <li><a href="#">Beverage</a></li>
                    <li><a href="all_services.html">All Items</a></li>
                  </ul> -->
                </li>
                <li><a href="about.html">About</a></li>
                <li><a href="contact_us.html">Location</a></li>
                <li><a href="index.php">Sign in</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <!-- End: Navigation wrapper -->
    </header>
    <!-- End: HEADER -->

    <!-- Start: MAIN CONTENT -->
    <div class="content"> <br> <br> <br> <br>
      <div class="container">
        <div class="row">
          <div class="span6 offset3">
            <h4 class="widget-header"><i class="icon-lock"></i> Signin to TIK Restaurant</h4>
            <div class="widget-body">
              <div class="center-align">

                 <form class="form-horizontal form-signin-signup" method="post">
                  <input type="text" name="email" placeholder="Your Email ( admin@a.com or mis@gmail.com )" required /> <br> <br>
                  <input type="password" name="pass" placeholder="Your Password (1234)" required />
                  <div class="remember-me">
                    <div class="pull-left">
                      <label class="checkbox">
                        <input type="checkbox"> Remember me
                      </label>
                    </div>
                    <div class="pull-right">
                      <a href="#">Forgot password?</a>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <input type="submit" value="Signin" name="btn-login" class="btn btn-primary btn-large" name="btn-login">
                </form>

              </div>
            </div>
          </div>
        </div>
		    </div> <br> <br> <br> <br>
      </div>

    <!-- End: MAIN CONTENT -->

    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/boot-business.js"></script>
  </body>
</html>
