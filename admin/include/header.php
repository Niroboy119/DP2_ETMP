<?php

  //header.php
  
  session_start();

  if(!isset($_SESSION["username"]))
  {
    header('location: login.html');
  }

?>

<!DOCTYPE html>
<html>
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>EMTP - Admin Panel</title>

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="../css/style.css">

    <!-- Bootstrap v4.4.1 -->
    <link rel="stylesheet" type="text/css" href="../vendor/bootstrap/bootstrap.min.css">

    <!-- Page level plugin CSS-->
    <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Font Awesome Free 5.12.0 -->
    <link rel="stylesheet" type="text/css" href="../vendor/fontawesome/css/all.css">

    <!-- favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="../images/favicon.jpg">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- favicon -->
    <style>
		@import url(https://fonts.googleapis.com/css?family=Open+Sans);

    .search {
      width: 100%;
      position: relative;
      display: flex;
    }
    
    .bar{
      font-family: "Courier New", Courier, monospace;
      font-size: 20px;
      padding: 8px;
    }
    
    .searchTerm {
      width: 100%;
      border: 3px solid #00B4CC;
      border-right: none;
      padding: 5px;
      height: 20px;
      border-radius: 5px 0 0 5px;
      outline: none;
      color: #9DBFAF;
    }
    
    .searchTerm:focus{
      color: #00B4CC;
    }
    
    .searchButton {
      width: 40px;
      height: 36px;
      border: 1px solid #00B4CC;
      background: #00B4CC;
      text-align: center;
      color: #fff;
      border-radius: 0 5px 5px 0;
      cursor: pointer;
      font-size: 20px;
    }
    
    .wrap{
      width: 30%;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
    }
    
    .center {
    text-align: center;
    padding-top:230px;
    color:DarkTurquoise;
    }
    
    .details {
    font-size:15px;
    max-width: 48rem;
    width: 30%;
    margin-top:30px;
    margin-bottom:0;
    margin-left:auto;
    margin-right:auto;
    background-color:white;
    
    }

    .center2 {
    text-align: center;
    padding-top:120px;
    padding-right:240px;
    color:DarkTurquoise;
    }


	</style>
	

  </head>

    <body class="bg-light">
      
      <!-- Navigation -->
      <nav class="navbar navbar-expand-lg navbar-dark bg-primary static-top">
        <div class="container">
          <a class="navbar-brand" href="index.php">
            <img src="../images/logo-2.jpg" alt="50">
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                  <a class="nav-link" href="index.php"><span class="fas fa-home"></span> Home</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="user.php"><span class="fas fa-users"></span> Manage Users</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="profile.php"><span class="fas fa-user"></span> Profile</a>
              </li>
               <li class="nav-item">
                  <a class="nav-link" href="../chatroom_admin.php"><span class="fas fa-comments"></span> Chat With Users</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="training_search.php"><span class="fas fa-comments"></span> Search Training</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="logout.php"><span class="fas fa-sign-out-alt"></span> Logout</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>