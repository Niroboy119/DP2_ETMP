<?php include('include/header.php'); ?>
<!DOCTYPE html>
<html>
   <head>
      <div class="menu">
      </div>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>EMTP - Contact Us</title>
      <!-- Bootstrap v4.4.1 -->
      <link rel="stylesheet" type="text/css" href="vendor/bootstrap/bootstrap.min.css">
      <!-- favicon -->
      <link rel="shortcut icon" type="image/x-icon" href="images/favicon.jpg">
   </head>
   <body class="bg-light">
      <div class="container">
      <div class="row">
      <div class="col-md-4 offset-md-4">
      <div class="text-center mt-5">
         <img class="mb-2" src="images/logo.jpg" alt="" width="225" height="100">
      </div>
      <h1 class="text-center">Contact Us Form</h1>
  <form name="contact-form" action="" method="post" id="contact-form">
      <div class="form-group">
         <br>
         <br>
          <div class="form-group" class="mb-3">
            <label for="name">Full Name</label>
            <input type="text" class="form-control" id="your_name" name="your_name" maxlength="50"
               placeholder="Enter full name">
            <div id="fullname_error_message" class="text-danger"></div>
         </div>
          <div class="form-group" class="mb-3">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="your_email" name="your_email" maxlength="50"
               placeholder="Enter email">
            <div id="fullname_error_message" class="text-danger"></div>
         </div>
          <div class="form-group" class="mb-3">
            <label for="fullname">Phone Number</label>
            <input type="text" class="form-control" id="your_phone" name="your_phone" maxlength="50"
               placeholder="Enter Phone Number">
            <div id="fullname_error_message" class="text-danger"></div>
         </div>
          <div class="form-group" class="mb-3">
            <label>Request Phone Call:</label>
            <select name="your_phonecall" id="your_phonecall" class="custom-select">
               <option value="" hidden>Request Phone Call</option>
               <option>Yes</option>
               <option>No</option>
            </select>
            <div id="gender_error_message" class="text-danger"></div>
         </div>
          <div class="form-group" class="mb-3">
            <label for="email">Website</label>
            <input type="text" class="form-control" id="your_website" name="your_website" maxlength="50"
               placeholder="Enter Website">
            <div id="fullname_error_message" class="text-danger"></div>
         </div>
          <div class="form-group" class="mb-3">
            <label>Priority</label>
            <select name="your_priority" id="your_priority" class="custom-select">
               <option value="" hidden>Priority</option>
               <option>Low</option>
               <option>Normal</option>
               <option>High</option>
               <option>Emergency</option>
            </select>
            <div id="gender_error_message" class="text-danger"></div>
         </div>
         <div class="form-group" class="mb-3">
            <label>Regarding</label>
            <select name="your_type" id="your_type" class="custom-select">
               <option value="" hidden>Type</option>
               <option>Training Request</option>
               <option>Information</option>
               <option>Promotions</option>
            </select>
            <div id="gender_error_message" class="text-danger"></div>
         </div>
         <div class="form-group" id="othT-mb3" class="mb-3">
            <label for="comments">Message</label>
            <textarea class="form-control" id="comments" name="comments"  rows="5" cols="20">Send us your message</textarea>
            <div id="otherTraining_error_message" class="text-danger"></div>
         </div>
         <br>
         <class="mb-4">
         <input type="hidden" name="submit" id="submit_form" value="Submit">
         <button class="btn btn-primary btn-lg btn-block" type="submit">Submit</button>
         <hr
         <input type="hidden" name="action" id="action" value="reset">
         <button class="btn btn-primary btn-lg btn-block" type="reset">Reset</button>
      </form>
<div class="response_msg"></div>
</div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>
$(document).ready(function(){
$("#contact-form").on("submit",function(e){
e.preventDefault();
if($("#contact-form [name='your_name']").val() === '')
{
$("#contact-form [name='your_name']").css("border","1px solid red");
}
else if ($("#contact-form [name='your_email']").val() === '')
{
$("#contact-form [name='your_email']").css("border","1px solid red");
}
else
{
$("#loading-img").css("display","block");
var sendData = $( this ).serialize();
$.ajax({
type: "POST",
url: "form_action.php",
data: sendData,
success: function(data){
$("#loading-img").css("display","none");
$(".response_msg").text(data);
$(".response_msg").slideDown().fadeOut(3000);
$("#contact-form").find("input[type=text], input[type=email], textarea").val("");
}
});
}
});
$("#contact-form input").blur(function(){
var checkValue = $(this).val();
if(checkValue != '')
{
$(this).css("border","1px solid #eeeeee");
}
});
});
</script>
</body>
</html>
<?php include('include/footer.php'); ?>