<!DOCTYPE html>
<html>
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>EMTP - Expert Management Training Portal</title>
    
     <!-- Dropdown 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type ="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">-->
    
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- Bootstrap v4.4.1 -->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/bootstrap.min.css">
    <!-- Font Awesome Free 5.12.0 -->
    <link rel="stylesheet" type="text/css" href="vendor/fontawesome/css/all.css">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.jpg">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type ="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    
  </head>
    <body class="bg-light">
      
      <!-- Navigation -->
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
        <div class="container">
          <a class="navbar-brand" href="index.php">
            
           
                <!--  <a class="nav-link" href="admin/login.html"><span class="fas fa-user-shield"></span> Admin</a>-->
          
              
            <img src="images/logo-2.jpg" alt="50">
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                  <a class="nav-link" href="index2.php"><span class="fas fa-home"></span> Home</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="profile.php"><span class="fas fa-user"></span> Profile</a>
              </li>
               <li class="nav-item">
                  <a class="nav-link" href="requestform.html"><span class="fas fa-book"></span> Booking</a>
              </li>
                   <li class="nav-item">
                  <a class="nav-link" href="chatroom.php"><span class="fas fa-comments"></span> Chat With Us</a>
              </li>
                <li class="nav-item">
                  <a class="nav-link" href="form.html"><span class="fas fa-address-book"></span> Contact Us</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="logout.php"><span class="fas fa-sign-out-alt"></span> Logout</a>
              </li>
              <ul class="nav navbar-nav navbar-right">
      <li class="dropdown">
       <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-pill label-danger count" style="border-radius:10px;"></span> <span class="glyphicon glyphicon-envelope" style="font-size:18px;"></span></a>
       <ul class="dropdown-menu"></ul>
            </ul>
          </div>
        </div>
      </nav>
<html>
    <!--
 <head>
  <title>Notification Center</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
 </head>
 <body>
  <br /><br />
  
    <!-- <ul class="nav navbar-nav navbar-right">
      <li class="dropdown">
       <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-pill label-danger count" style="border-radius:0px;"></span> <span class="glyphicon glyphicon-envelope" style="font-size:18px;"></span></a>
       <ul class="dropdown-menu"></ul>-->
   <!--   
   <form method="post" id="comment_form">
    <div class="form-group">
     <label>Enter Subject</label>
     <input type="text" name="subject" id="subject" class="form-control">
    </div>
    <div class="form-group">
     <label>Enter Comment</label>
     <textarea name="comment" id="comment" class="form-control" rows="5"></textarea>
    </div>
    <div class="form-group">
     <input type="submit" name="post" id="post" class="btn btn-info" value="Post" />
    </div>
   </form>
   
  </div>
 </body>
</html>
-->
<script>
$(document).ready(function(){
 
 function load_unseen_notification(view = '')
 {
  $.ajax({
   url:"notification_fetch.php",
   method:"POST",
   data:{view:view},
   dataType:"json",
   success:function(data)
   {
    $('.dropdown-menu').html(data.notification);
    if(data.unseen_notification > 0)
    {
     $('.count').html(data.unseen_notification);
    }
   }
  });
 }
 
 load_unseen_notification();
 
 $('#comment_form').on('submit', function(event){
  event.preventDefault();
  if($('#subject').val() != '' && $('#comment').val() != '')
  {
   var form_data = $(this).serialize();
   $.ajax({
    url:"notification_insert.php",
    method:"POST",
    data:form_data,
    success:function(data)
    {
     $('#comment_form')[0].reset();
     load_unseen_notification();
    }
   });
  }
  else
  {
   alert("Both Fields are Required");
  }
 });
 
 $(document).on('click', '.dropdown-toggle', function(){
  $('.count').html('');
  load_unseen_notification('yes');
 });
 
 setInterval(function(){ 
  load_unseen_notification();; 
 }, 5000);
 
});
</script>