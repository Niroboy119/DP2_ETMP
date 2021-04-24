<?php 
// Initialize the session
session_start(); 

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="user-scalable=0, width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Expert Training Management Portal</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/mobile.css">
    <script type="text/javascript" src="js/mobile.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; text-align: center; }
    </style>
  </head>
  <body style="   background-color: #3148a7;">
    <h1 class="my-5">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>.
      Welcome to our site.</h1>
    <p> <a href="reset-password.php" class="btn btn-warning">Reset Your
        Password</a> <a href="logout.php" class="btn btn-danger ml-3">Sign Out
        of Your Account</a> </p>
    <div id="header">
      <div style="text-align: center;"><img src="file:///C:/Users/xXx/Desktop/Expert.com/upload/images/expert%20logo.jpg"

          alt="logo" title="logo big" style="width: 272px; height: 122px;"></div>
      <h1 style="text-align: center; margin-left: -37px; width: 1039px;"><b><span

            style="color: white;">Expert Management Training Portal</span></b><span

          style="color: white;"><b><span style="font-family: Calibri;"> (EMTP)</span></b></span></h1>
      <p style="text-align: center;"><br>
      </p>
      <ul id="navigation">
        <li class="current" style="text-align: center;"> <span style="color: red;"><b

              style="color: #030303;"><a href="index.html">Home</a></b> </span></li>
        <span style="color: red;"> </span>
        <li> <b style="color: white;"><a href="about.html">Book</a></b> </li>
        <span style="color: red;"> </span>
        <li> <strong><span style="color: red;"><a href="classes.html">About Us</a></span></strong>
          <ul>
            <li> <span style="color: red;"><a href="instructors.html">Instructors</a></span>
            </li>
          </ul>
        </li>
        <span style="color: red;"> </span>
        <li style="text-align: left;"><span style="color: red;"> <strong><a href="contact.html">Contact
                US</a></strong></span><span style="color: red;"><strong><a href="login_client.html">LoGIN</a></strong></span></li>
        <li style="text-align: left;"> <br>
        </li>
      </ul>
    </div>
    <div id="body" style="width: 918px;">
      <div id="tagline">
        <h1 style="width: 823px;">&nbsp;<span style="font-family: Calibri;">Expert.com</span></h1>
        <h2 style=" text-align: justify; width: 850px;"> Expert.com is a local
          training provider which provides in-house training (or on
          site/bespoke) for companies or employees within Sarawak. The
          objectives of Training Expert.com is to provide hands-on solutions
          through practical information sharing to help solve day to day
          business challenges by developing human capitals that meets the
          company’s needs.</h2>
      </div>
      <div style="text-align: center;"><img src="file:///C:/Users/xXx/Desktop/Expert.com/upload/images/training.jpg"

          alt="traning" title="traning session" style="width: 840px; height: 560px;"></div>
    </div>
    <div id="footer">
      <div> <span style="width: 959px;">93350, Jalan Simpang Tiga, Kuching,
          Sarawak, Malaysia &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
          &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; <img

            src="file:///C:/Users/xXx/Desktop/Expert.com/upload/images/icon-facebook.png"

            alt="fb" title="fb"> &nbsp; &nbsp;<img src="file:///C:/Users/xXx/Desktop/Expert.com/upload/images/icon-twitter.png"

            alt="twitter" title="twitter"> &nbsp; <img src="file:///C:/Users/xXx/Desktop/Expert.com/upload/images/icon-googleplus.png"

            alt="google" title="google">&nbsp;&nbsp; <img src="file:///C:/Users/xXx/Desktop/Expert.com/upload/images/icon-pinterest.png"

            alt="pintrest" title="pintrest">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
          &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
          &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
          &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
          &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span>
        <p>© 2021 by Firuz Zaripov. All rights reserved. </p>
      </div>
    </div>
    
  </body>
</html>
