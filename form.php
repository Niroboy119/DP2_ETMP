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
      <form action="form_action.php" method="POST">
         <br>
         <br>
         <div class="mb-3">
            <label for="fullname">Full Name</label>
            <input type="text" class="form-control" id="fullname" name="fullname" maxlength="50"
               placeholder="Enter full name">
            <div id="fullname_error_message" class="text-danger"></div>
         </div>
         <div class="mb-3">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email" maxlength="50"
               placeholder="Enter email">
            <div id="fullname_error_message" class="text-danger"></div>
         </div>
         <div class="mb-3">
            <label for="fullname">Phone Number</label>
            <input type="text" class="form-control" id="phone" name="phone" maxlength="50"
               placeholder="Enter Phone Number">
            <div id="fullname_error_message" class="text-danger"></div>
         </div>
         <div class="mb-3">
            <label>Request Phone Call:</label>
            <select name="request" id="request" class="custom-select">
               <option value="" hidden>Request Phone Call</option>
               <option>Yes</option>
               <option>No</option>
            </select>
            <div id="gender_error_message" class="text-danger"></div>
         </div>
         <div class="mb-3">
            <label for="email">Website</label>
            <input type="text" class="form-control" id="website" name="website" maxlength="50"
               placeholder="Enter Website">
            <div id="fullname_error_message" class="text-danger"></div>
         </div>
         <div class="mb-3">
            <label>Priority</label>
            <select name="priority" id="priority" class="custom-select">
               <option value="" hidden>Priority</option>
               <option>Low</option>
               <option>Normal</option>
               <option>High</option>
               <option>Emergency</option>
            </select>
            <div id="gender_error_message" class="text-danger"></div>
         </div>
         <div class="mb-3">
            <label>Regarding</label>
            <select name="type" id="type" class="custom-select">
               <option value="" hidden>Type</option>
               <option>Training Request</option>
               <option>Information</option>
               <option>Promotions</option>
            </select>
            <div id="gender_error_message" class="text-danger"></div>
         </div>
         <div id="othT-mb3" class="mb-3">
            <label for="message">Message</label>
            <textarea class="form-control" id="description" name="description"  rows="5" cols="20">Send us your message</textarea>
            <div id="otherTraining_error_message" class="text-danger"></div>
         </div>
         <br>
         <class="mb-4">
         <input type="hidden" name="action" id="action" value="submit">
         <button class="btn btn-primary btn-lg btn-block" type="submit">Submit</button>
         <hr
         <input type="hidden" name="action" id="action" value="reset">
         <button class="btn btn-primary btn-lg btn-block" type="reset">Reset</button>
      </form>
	  <script>
	         $.ajax({
                        type: "POST",
                        data: { 'fullname': $("#fullname").val(), 'email': $("#email").val(), 'phone': $("#phone").val(), 'request': $("#request").val(), 'website': $("#website").val()  ,'priority': $("#priority").val(), 'type': $("#type").val(), 'description': $("#description").val() },
                        url: "form_action.php",
                        dataType: "json",
                        success: function (data) {
                            if (data.status == 'success') {
                                $("#alert_sucess_message").show();
                                $("#alert_error_message").hide();
                                $('#training_request_form')[0].reset();
                            } else if (data.status == 'error') {
                               alert("Oops! Something went wrong.");
                            }
                        },
                        error: function () {
                            alert("Oops! Something went wrong.");
                        }
                    });
					</script>
   </body>
</html>
<br>
<br>
<br>
<?php include('include/footer.php'); ?>