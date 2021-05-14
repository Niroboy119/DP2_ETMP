<?php include('include/header.php'); ?>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  
  
    <div class="container">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs mt-5" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active font-weight-bold" id="profile-tab" data-toggle="tab" name="profile" href="#profile" role="tab" aria-controls="home" aria-selected="true">Profile</a>
            </li>
             <li class="nav-item">
                <a class="nav-link font-weight-bold" id="profile-tab" data-toggle="tab" name="profile" href="#vrequest" role="tab" aria-controls="profile" aria-selected="false">Training Requests</a>
            </li>
             <li class="nav-item">
                <a class="nav-link font-weight-bold" id="profile-tab" data-toggle="tab" name="profile" href="#requests" role="tab" aria-controls="profile" aria-selected="false">Edit Requests</a>
            </li>
            <li class="nav-item">
                <a class="nav-link font-weight-bold" id="profile-tab" data-toggle="tab" href="#edit-profile" role="tab" aria-controls="profile" aria-selected="false">Edit Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link font-weight-bold" id="messages-tab" data-toggle="tab" href="#edit-password" role="tab" aria-controls="messages" aria-selected="false">Edit Password</a>
            </li>
        </ul class="mb-5">
        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2">
                                <strong>Full Name: </strong>
                            </div>
                            <div class="col-md-10"> <?php echo $_SESSION['fullname']; ?>
                            </div>
                            <div class="col-md-2">
                                <strong>Username: </strong>
                            </div>
                            <div class="col-md-10">
                                <?php echo $_SESSION['username']; ?>
                            </div>
                            <div class="col-md-2">
                                <strong>E-mail: </strong>
                            </div>
                            <div class="col-md-10">
                                <?php echo $_SESSION['email']; ?>
                            </div>
                            <div class="col-md-2">
                                <strong>Gender: </strong>
                            </div>
                            <div class="col-md-10">
                                <?php echo $_SESSION['gender']; ?>
                            </div>
                            <div class="col-md-2">
                                <strong>Created: </strong>
                            </div>
                            <div class="col-md-10">
                                <?php echo $_SESSION['created_date']; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             <!--View training request-->
            <div class="tab-pane" id="vrequest" role="tabpanel" aria-labelledby="profile-tab">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                          	<table class="table table-bordered table-sm" >
                            <thead>
                            <tr>
                            <th>ID</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Training Date</th>
                                <th>Training Type</th>
                                <th>Attendees</th>
                                <th>Payment</th>
                            </tr>
                            </thead>
                            <tbody id="table">
                            
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
<script>
            	$.ajax({
		url: "View_ajax.php",
		type: "POST",
		cache: false,
		success: function(data){
		//	alert(data);
			$('#table').html(data); 
			
		}
	});
        </script>
            <!--Edit training request-->
            <div class="tab-pane" id="requests" role="tabpanel" aria-labelledby="profile-tab">
                <div class="card mb-3" style="margin-top:30px">
                  <div class="card-header">
                    <div class="row">
                      <div class="col-md-9 font-weight-bold"><i class="fas fa-users"></i> Edit Training Request</div>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="show-request-data">
                        <table class="table table-bordered" id="userTable" width="100%" cellspacing="0">
                            <thead>
                              <tr>
                                <th>Request ID</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Date of Training</th>
                                <th>Training Type</th>
                                <th>Num of Attendees</th>
                                <th>Payment</th>
                              </tr>
                            </thead>
                            <tbody id="rTable">
                            </tbody>
                        </table>
                    </div>      
                    <div class="col-md-6">
                    <br>
                    <form id="training_request_form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    					<p class="lead">Edit the appropriate fields.</p>
        					<div id="alert_error_message" class="alert alert-danger collapse" role="alert">
                                <i class="fa fa-exclamation-triangle"></i>
                                Please check in on some of the fields below.
                            </div>
                            <div id="alert_sucess_message" class="alert alert-success collapse" role="alert">
                                Request created and successfully forwarded.
                            </div>
        					<div class="mb-3">
                                <label for="fullname">Full Name *</label>
                                <input type="text" class="form-control" id="fname" name="fname" maxlength="50"
                                    placeholder="Enter full name" >
                                <div id="fullname_error_message" class="text-danger"></div>
        					 </div>
                            <div class="mb-3">
                                <label for="email">Email *</label>
                                <input type="email" class="form-control" id="email" name="email" maxlength="100"
                                    placeholder="Enter email" >
                                <div id="email_error_message" class="text-danger"></div>
                            </div>
                             <!-- include calendar for when the training/workshop should be held -->
                             <div class="mb-3">
                                <label for="training-date">Date for training *</label>
                                <input type="date" class="form-control" id="dateTraining" name="dateTraining"
                                    placeholder="Pick a date" >
                                <div id="date_error_message" class="text-danger"></div>
                            </div>
                            <!-- Include a training type selection -->
                            <div class="mb-3">
                                <label>Training type *</label>
                                <select name="training-type" id="training-type" class="custom-select" onchange="change(this)" >
                                    <option hidden>Select training type</option>
                                    <option>Leadership/Communication skills training</option>
                                    <option>Work productivity training</option>
                                    <option>Language Proficiency training</option>
                                    <option>Negotiation/Presentation skills training</option>
                                    <option>Personal Development training</option>
                                    <option>Others...</option>
                                </select>
                                <div id="trainingType_error_message" class="text-danger"></div>
                            </div>
                            <!-- include text box for client to describe training needed -->
                            <!-- if the needed, training is not included in the training drop down list -->
                            <div id="othT-mb3" class="mb-3">
                                <label for="other-trainings">Other training description</label>
                                <textarea class="form-control" id="othTrainings" name="othTrainings"  rows="5" cols="20">Describe your desired training...</textarea>
                                <div id="otherTraining_error_message" class="text-danger"></div>
                            </div>
                            <div class="mb-3">
                                <label for="numOfParticipants">Number of Attendees *</label>
                                <input type="number" class="form-control" id="numOfParticipants" name="numOfParticipants" min="1" max="50" >
                                <div id="numOfAttendees_error_message" class="text-danger"></div>
                            </div>
                            <div>
                            <hr class="mb-4">    
                            <input type="hidden" name="action" id="update_request" value="register_trainingRequest">
                            <button class="btn btn-primary btn-lg btn-block" id="update_request" type="submit">Update training request</button>
                            </div>
                    </form>    
                    </div>
                    </div>
                  <!--<div class="card-body">-->
                  <!--  <div class="table-responsive">-->
                  <!--    <span id="sucess_message"></span>-->
                      <!--<table class="table table-bordered" id="userTable" width="100%" cellspacing="0">-->
                      <!--  <thead>-->
                      <!--    <tr>-->
                      <!--      <th>Request ID</th>-->
                      <!--      <th>Full Name</th>-->
                      <!--      <th>Email</th>-->
                      <!--      <th>Date of Training</th>-->
                      <!--      <th>Training Type</th>-->
                      <!--      <th>Num of Attendees</th>-->
                      <!--    </tr>-->
                      <!--  </thead>-->
                      <!--  <tfoot>-->
                      <!--  </tfoot>-->
                      <!--</table>-->
                      
                      <!-- Edit training request form -->
            <!--<div class="tab-pane" id="edit-profile" role="tabpanel" aria-labelledby="profile-tab">-->
            <!--    <div class="card">-->
                    
                </div>
            </div>

<script>
    $.ajax({
		url: "show_client_requests.php",
		type: "POST",
		cache: false,
		success: function(data){
		//	alert(data);
			$('#rTable').html(data); 
			
		}
	});
</script>
                
            <!-- Edit client password-->
            <div class="tab-pane" id="edit-profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="card">
                    <div class="card-body">    
                        <div class="col-md-6">
                            <br>
                            <form id="user_form">
                                <div id="alert_error_message" class="alert alert-danger collapse" role="alert">
                                    Please check in on some of the fields below.
                                </div>
                                <div id="alert_sucess_message" class="alert alert-success collapse" role="alert">
                                    Your profile has been updated successfully.
                                </div>
                                <div class="mb-3">
                                    <label for="fullname">Full Name *</label>
                                    <input type="text" class="form-control" id="fullname" name="fullname" maxlength="50"
                                        placeholder="Enter full name">
                                    <div id="fullname_error_message" class="text-danger"></div>
                                </div>
                                <div class="mb-3">
                                    <label for="username">Username *</label>
                                    <input type="text" class="form-control" id="username" name="username" maxlength="50"
                                        placeholder="Enter username" readonly>
                                    <div id="username_error_message" class="text-danger"></div>
                                </div>
                                <div class="mb-3">
                                    <label for="email">Email *</label>
                                    <input type="email" class="form-control" id="email" name="email" maxlength="100"
                                        placeholder="Enter email">
                                    <div id="email_error_message" class="text-danger"></div>
                                </div>
                                <div class="mb-3">
                                    <label>Gender *</label>
                                    <select name="gender" id="gender" class="custom-select">
                                        <option value="" hidden>Gender</option>
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select>
                                    <div id="gender_error_message" class="text-danger"></div>
                                </div>
                                <hr class="mb-4">
                                <input type="hidden" name="action" id="action" value="update_user">
                                <button class="btn btn-primary btn-block" type="submit">Update Profile</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
            <!--Edit client password-->
            <div class="tab-pane" id="edit-password" role="tabpanel" aria-labelledby="messages-tab">
                <div class="card">
                    <div class="card-body">    
                        <div class="col-md-6">
                            <br>
                            <form id="update_password_form">
                                <div id="update_password_alert_error_message" class="alert alert-danger collapse" role="alert">
                                    Please check in on some of the fields below.
                                </div>
                                <div id="update_password_alert_sucess_message" class="alert alert-success collapse" role="alert">
                                    Password updated successfully!
                                </div>
                                <div class="mb-3">
                                    <label for="password">Current Password *</label>
                                    <input type="password" class="form-control" id="current_password" name="current_password" placeholder="Enter current Password">
                                    <div id="current_password_error_message" class="text-danger"></div>
                                </div>
                                <div class="mb-3">
                                    <label for="password">New password *</label>
                                    <input type="password" class="form-control" id="new_password" name="new_password" maxlength="50"
                                        placeholder="Enter password">
                                    <div id="new_password_error_message" class="text-danger"></div>
                                </div>
                                <div class="mb-3">
                                    <label for="confirm-password">Confirm Password *</label>
                                    <input type="password" class="form-control" id="confirm_password" name="confirm_password"
                                        maxlength="50" placeholder="Enter confirm password">
                                    <div id="confirm_password_error_message" class="text-danger"></div>
                                </div>
                                <hr class="mb-4">
                                <button class="btn btn-primary btn-block" type="submit">Update Password</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br><br><br><br>
<?php include('include/footer.php'); ?>

    <script>
        function change(obj) {

        var selectBox = obj;
        var selected = selectBox.value;
        var othTrainingsDiv = document.getElementById("othT-mb3"); 

        if(selected === 'Others...'){
            othTrainingsDiv.style.display = "";
        }
        else{
            othTrainingsDiv.style.display = "none";
        }
        }
    </script>

<!-- script for -->

<script>
    $(document).ready(function () {

        $(document).keypress(function (e) {
            if (e.which == 13) {
                event.preventDefault();
                valForm();
            }
        });

        $('#training_request_form').on('submit', function (event) {
            event.preventDefault();
            valForm();
        });

		var error_fullname = false;
        var error_email = false;
		var error_date = false;
		var error_training = false;
		var error_attendees = false;


        $("#fname").focusout(function () {
            check_fullname();
        });

        $("#email").focusout(function () {
            check_email();
        });
		
		$("#dateTraining").focusout(function () {
            check_date();
        });
		
		$("#training-type").focusout(function () {
            check_training();
        });
		
		$("#numOfParticipants").focusout(function () {
            check_numOfAttendees();
        });
		

        function check_fullname() {
            if ($.trim($('#fname').val()) == '') {
                $("#fullname_error_message").html("Fullname is a required field.");
                $("#fullname_error_message").show();
                $("#fname").addClass("is-invalid");
                error_fullname = true;
            } else {
                $("#fullname_error_message").hide();
                $("#fname").removeClass("is-invalid");
            }
        }

        function check_email() {
            var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
            var email_length = $("#email").val().length;

            if ($.trim($('#email').val()) == '') {
                $("#email_error_message").html("Email is a required field.");
                $("#email_error_message").show();
                $("#email").addClass("is-invalid");
            } else if (!(pattern.test($("#email").val()))) {
                $("#email_error_message").html("Invalid email address");
                $("#email_error_message").show();
                error_email = true;
                $("#email").addClass("is-invalid");
            } else {
                $("#email_error_message").hide();
                $("#email").removeClass("is-invalid");
            }
        }
		
		function check_date() {

            if ($.trim($('#dateTraining').val()) == '') {
                $("#date_error_message").html("Date of training is a required field.");
                $("#date_error_message").show();
                $("#dateTraining").addClass("is-invalid");
                error_date = true;
            } else {
                $("#date_error_message").hide();
                $("#dateTraining").removeClass("is-invalid");
            }
        }
		
		function check_training() {
            if ($.trim($('#training-type').val()) == 'Select training type') {
                $("#trainingType_error_message").html("Type of Training is a required field.");
                $("#trainingType_error_message").show();
                $("#training-type").addClass("is-invalid");
                error_training = true;
            } else {
                $("#trainingType_error_message").hide();
                $("#training-type").removeClass("is-invalid");
            }
        }
		
		function check_numOfAttendees() {
            if ($.trim($('#numOfParticipants').val()) == '') {
                $("#numOfAttendees_error_message").html("Number of Attendees is a required field.");
                $("#numOfAttendees_error_message").show();
                $("#numOfParticipants").addClass("is-invalid");
                error_attendees = true;
            }

			else if ($.trim($('#numOfParticipants').val()) <= '0') {
                $("#numOfAttendees_error_message").html("The Number of Attendees should be more than zero.");
                $("#numOfAttendees_error_message").show();
                $("#numOfParticipants").addClass("is-invalid");
                error_attendees = true;
            } 				
			else {
                $("#numOfAttendees_error_message").hide();
                $("#numOfParticipants").removeClass("is-invalid");
            }
        }
		

        function valForm() {

            error_fullname = false;
            error_email = false;
			error_date=false;
            error_training= false;
			error_attendees= false;

			
			check_fullname();
            check_email();
			check_date();
			check_training();
			check_numOfAttendees();
			
			if (error_fullname == false && error_email == false && error_date == false && error_training == false && error_attendees == false)
			
			{
				
                $.ajax({
                    type: "POST",
                    data: {'fname': $("#fname").val(), 'email': $("#email").val(), 'dateTraining': $("#dateTraining").val(), 'training-type': $("#training-type").val(), 'othTrainings': $("#othTrainings").val()  ,'numOfParticipants': $("#numOfParticipants").val() },
                    url: "profile_edit_request.php",
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
                        alert("Oops! Something went wrong!!!!.");
                    }
                });
                return false;
	        } 
			
			else {
                $("#alert_sucess_message").hide();
                $("#alert_error_message").show();
                
            }				
			
        }
    });
    
</script>

<script>
    $(document).ready(function(){

    function clear_field()
    {
      $("#alert_error_message").hide();
      $('#user_form')[0].reset();
      $("#fullname_error_message").hide();
      $("#fullname").removeClass("is-invalid");
      $("#username_error_message").hide();
      $("#username").removeClass("is-invalid");
      $("#email_error_message").hide();
      $("#email").removeClass("is-invalid");
      $("#gender_error_message").hide();
      $("#gender").removeClass("is-invalid");
      $("#status_error_message").hide();
      $("#status").removeClass("is-invalid");
      $("#password_error_message").hide();
      $("#password").removeClass("is-invalid");
      $("#confirm_password_error_message").hide();
      $("#confirm_password").removeClass("is-invalid");
      document.getElementById("username").readOnly = false;
    }

    $('#add_button').click(function(){
      $('#modal_title').text('Create New User');
      $('#button_action').val('Save');
      $('#action').val('create_user');
      $('#formModal').modal('show');
      clear_field();
      $('#sucess_message').html('');
    });

    var error_fullname = false;
    var error_username = false;
    var error_email = false;
    var error_gender = false;
    var error_status = false;
    var error_password = false;
    var error_confirm_password = false;

    $("#fullname").focusout(function () {
        check_fullname();
    });

    $("#username").focusout(function () {
        check_username();
    });

    $("#email").focusout(function () {
        check_email();
    });

    $("#gender").focusout(function () {
        check_gender();
    });

    $("#status").focusout(function () {
        check_status();
    });

    $("#password").focusout(function () {
        check_password();
    });

    $("#confirm_password").focusout(function () {
        check_confirm_password();
    });

    function check_fullname() {
        if ($.trim($('#fullname').val()) == '') {
            $("#fullname_error_message").html("Fullname is a required field.");
            $("#fullname_error_message").show();
            $("#fullname").addClass("is-invalid");
            error_fullname = true;
        } else {
            $("#fullname_error_message").hide();
            $("#fullname").removeClass("is-invalid");
        }
    }

    function check_username() {
        if ($.trim($('#username').val()) == '') {
            $("#username_error_message").html("Username is a required field.");
            $("#username_error_message").show();
            $("#username").addClass("is-invalid");
            error_username = true;
        } else {
            $("#username_error_message").hide();
            $("#username").removeClass("is-invalid");
        }
    }

    function check_email() {
        var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
        var email_length = $("#email").val().length;

        if ($.trim($('#email').val()) == '') {
            $("#email_error_message").html("Email is a required field.");
            $("#email_error_message").show();
            $("#email").addClass("is-invalid");
        } else if (!(pattern.test($("#email").val()))) {
            $("#email_error_message").html("Invalid email address");
            $("#email_error_message").show();
            error_email = true;
            $("#email").addClass("is-invalid");
        } else {
            $("#email_error_message").hide();
            $("#email").removeClass("is-invalid");
        }
    }

    function check_gender() {
        if ($.trim($('#gender').val()) == '') {
            $("#gender_error_message").html("Gender is a required field.");
            $("#gender_error_message").show();
            $("#gender").addClass("is-invalid");
            error_gender = true;
        } else {
            $("#gender_error_message").hide();
            $("#gender").removeClass("is-invalid");
        }
    }

    function check_status() {
        if ($.trim($('#status').val()) == '') {
            $("#status_error_message").html("Status is a required field.");
            $("#status_error_message").show();
            $("#status").addClass("is-invalid");
            error_status = true;
        } else {
            $("#status_error_message").hide();
            $("#status").removeClass("is-invalid");
        }
    }

    function check_password() {
        var password_length = $("#password").val().length;

        if ($.trim($('#password').val()) == '') {
            $("#password_error_message").hide();
            $("#password").removeClass("is-invalid");
        } else if (password_length < 8) {
            $("#password_error_message").html("Please enter at least 8 characters!");
            $("#password_error_message").show();
            error_password = true;
            $("#password").addClass("is-invalid");
        } else {
            $("#password_error_message").hide();
            $("#password").removeClass("is-invalid");
        }
    }

    function check_confirm_password() {
        var password = $("#password").val();
        var confirm_password = $("#confirm_password").val();

        if ($.trim($('#confirm_password').val()) == '') {
            $("#confirm_password_error_message").hide();
            $("#confirm_password").removeClass("is-invalid");
        } else if (password != confirm_password) {
            $("#confirm_password_error_message").html("Passwords do not match!");
            $("#confirm_password_error_message").show();
            error_confirm_password = true;
            $("#confirm_password").addClass("is-invalid");
        } else {
            $("#confirm_password_error_message").hide();
            $("#confirm_password").removeClass("is-invalid");
        }
    }

    $('#user_form').on('submit', function(event){
      event.preventDefault();

      error_fullname = false;
      error_username = false;
      error_email = false;
      error_gender = false;
      error_status = false;
      error_password = false;
      error_confirm_password = false;

      check_fullname();
      check_username();
      check_email();
      check_gender();
      check_status();
      check_password();
      check_confirm_password();

      if (error_fullname == false && error_username == false && error_email == false && error_gender == false && error_status == false && error_password == false && error_confirm_password == false) {

        data = $('#user_form').serialize();

        $.ajax({
          type: "POST",
          data: data,
          url: "user_action.php",
          dataType: "json",
          success: function (data) {
              if (data.status == 'success') {
                $('#sucess_message').html('<div class="alert alert-success">'+data.success+'</div>');
                $("#alert_error_message").hide();
                clear_field();
                $('#formModal').modal('hide');
                datatable.ajax.reload();
              } else if (data.status=='error') {
                $("#username_error_message").html("Username already exists");
                $("#username_error_message").show();
              }
          },
          error: function () {
              alert("Oops! Something went wrong.");
          }
        });
      } else {
        $("#alert_error_message").show();
      }
    });

    $(document).on('click', '.update_user', function(){
      user_id = $(this).attr('id');
      clear_field();

      $.ajax({
        url:"user_action.php",
        method:"POST",
        data:{action:'single_fetch', user_id:user_id},
        success:function(data){
          var data = JSON.parse(data);
          $('#formModal').modal('show');
          $('#modal_title').text('Update User Information');
          $('#button_action').val('Update');
          $('#action').val('update_user');
          $('#user_id').val(data['id']);
          $('#fullname').val(data.fullname);
          document.getElementById("username").readOnly = true;
          $('#username').val(data.username);
          $('#email').val(data.email);
          $('#gender').val(data.gender);
          $('#status').val(data.status);
        }
      });
    });
  });
</script>

<script>

  $(document).ready(function(){
 
   
    getUser();

    $('#user_form').on('submit', function (event) {
        event.preventDefault();
        updateUser();
    });

    $('#update_password_form').on('submit', function (event) {
        event.preventDefault();
        updatePassword();
    });

    var error_fullname = false;
    var error_username = false;
    var error_email = false;
    var error_gender = false;
    var error_current_password = false;
    var error_new_password = false;
    var error_confirm_password = false;

    $("#profile-tab").click(function(){
        location.reload();
    });

    $("#fullname").focusout(function () {
        check_fullname();
    });

    $("#username").focusout(function () {
        check_username();
    });

    $("#email").focusout(function () {
        check_email();
    });

    $("#gender").focusout(function () {
        check_gender();
    });

    $("#current_password").focusout(function() {
        check_current_password();
    });

    $("#new_password").focusout(function() {
        check_new_password();
    });

    $("#confirm_password").focusout(function() {
        check_confirm_password();
    });

    function check_fullname() {
        if ($.trim($('#fullname').val()) == '') {
            $("#fullname_error_message").html("Fullname is a required field.");
            $("#fullname_error_message").show();
            $("#fullname").addClass("is-invalid");
            error_fullname = true;
        } else {
            $("#fullname_error_message").hide();
            $("#fullname").removeClass("is-invalid");
        }
    }

    function check_username() {
        if ($.trim($('#username').val()) == '') {
            $("#username_error_message").html("Username is a required field.");
            $("#username_error_message").show();
            $("#username").addClass("is-invalid");
            error_username = true;
        } else {
            $("#username_error_message").hide();
            $("#username").removeClass("is-invalid");
        }
    }

    function check_email() {
        var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
        var email_length = $("#email").val().length;

        if ($.trim($('#email').val()) == '') {
            $("#email_error_message").html("Email is a required field.");
            $("#email_error_message").show();
            $("#email").addClass("is-invalid");
        } else if (!(pattern.test($("#email").val()))) {
            $("#email_error_message").html("Invalid email address");
            $("#email_error_message").show();
            error_email = true;
            $("#email").addClass("is-invalid");
        } else {
            $("#email_error_message").hide();
            $("#email").removeClass("is-invalid");
        }
    }

    function check_gender() {
        if ($.trim($('#gender').val()) == '') {
            $("#gender_error_message").html("Gender is a required field.");
            $("#gender_error_message").show();
            $("#gender").addClass("is-invalid");
            error_gender = true;
        } else {
            $("#gender_error_message").hide();
            $("#gender").removeClass("is-invalid");
        }
    }

    function check_current_password() {
        var current_password_length = $("#current_password").val().length;

        if( $.trim( $('#current_password').val() ) == '' ){
            $("#current_password_error_message").html("Current password is a required field.");
            $("#current_password_error_message").show();
            $("#current_password").addClass("is-invalid");
            error_current_password = true;
        }else if(current_password_length < 8) {
            $("#current_password_error_message").html("At least 8 characters.");
            $("#current_password_error_message").show();
            $("#current_password").addClass("is-invalid");
            error_current_password = true;
        } else {
            $("#current_password_error_message").hide();
            $("#current_password").removeClass("is-invalid");
        }
    }

    function check_new_password() {

        var current_password = $("#current_password").val();
        var new_password = $("#new_password").val();
        var new_password_length = $("#new_password").val().length;

        if( $.trim( $('#new_password').val() ) == '' ){
            $("#new_password_error_message").html("New password is a required field.");
            $("#new_password_error_message").show();
            $("#new_password").addClass("is-invalid");
            error_new_password = true;
        }else if(new_password_length < 8) {
            $("#new_password_error_message").html("At least 8 characters.");
            $("#new_password_error_message").show();
            $("#new_password").addClass("is-invalid");
            error_new_password = true;
        }else if(new_password == current_password) {
            $("#new_password_error_message").html("New password cannot be same as your current password.");
            $("#new_password_error_message").show();
            $("#new_password").addClass("is-invalid");
            error_confirm_password = true;
        }else{
            $("#new_password_error_message").hide();
            $("#new_password").removeClass("is-invalid");
        }
    }

    function check_confirm_password() {

        var new_password = $("#new_password").val();
        var confirm_password = $("#confirm_password").val();

        if( $.trim( $('#confirm_password').val() ) == '' ){
            $("#confirm_password_error_message").html("Confirm password is a required field.");
            $("#confirm_password_error_message").show();
            $("#confirm_password").addClass("is-invalid");
            error_confirm_password = true;
        }else if(new_password !=  confirm_password) {
            $("#confirm_password_error_message").html("Passwords do not match.");
            $("#confirm_password_error_message").show();
            $("#confirm_password").addClass("is-invalid");
            error_confirm_password = true;
        } else {
            $("#confirm_password_error_message").hide();
            $("#confirm_password").removeClass("is-invalid");
        }
    }

    function updateUser() {

        error_fullname = false;
        error_username = false;
        error_email = false;
        error_gender = false;

        check_fullname();
        check_username();
        check_email();
        check_gender();

        if (error_fullname == false && error_username == false && error_email == false && error_gender == false) {

            data = $('#user_form').serialize();
            $.ajax({
                type: "POST",
                data: data,
                url: "profile_action.php",
                dataType: "json",
                success: function (data) {
                    if (data.status == 'success') {
                        $("#alert_sucess_message").show();
                        $("#alert_error_message").hide();
                    } else if (data.status=='error') {
                        alert("Oops! Something went wrong.");
                    }
                },
                error: function () {
                    alert("Oops! Something went wrong.");
                }
            });
            return false;
        } else {
            $("#alert_sucess_message").hide();
            $("#alert_error_message").show();
            return false;
        }
    }

    function updatePassword(){

        error_current_password = false;
        error_new_password = false;
        error_confirm_password = false;

        check_current_password();
        check_new_password();
        check_confirm_password();

        if(error_current_password == false && error_new_password == false && error_confirm_password == false) {

            var dataAction = {
                "action": "update_password"
            };

            data=$('#update_password_form').serialize();
            data=data + "&" + $.param(dataAction);

            $.ajax({
                type:"POST",
                data: data, 
                url:"profile_action.php",
                dataType:"json",
                success:function(data){
                    if(data.status) {
                        $("#update_password_alert_sucess_message").show();
                        $("#update_password_alert_error_message").hide();
                        $('#update_password_form')[0].reset();
                    }else if(data.error) {
                        $("#current_password_error_message").html("Passwords do not match.");
                        $("#current_password_error_message").show();
                    }else{
                        alert("Oops! Something went wrong.", "", "error");
                    }
                },error:function(){
                alert("Oops! Something went wrong.");
                }
            });
            return false;
        }else{
            $("#update_password_alert_sucess_message").hide();
            $("#update_password_alert_error_message").show();
            return false;
        }
    }

    function getUser() {
        $.ajax({
            url: "profile_action.php",
            type: "POST",
            data: { action: 'single_fetch' }, 
            success: function (data) {
                var data = JSON.parse(data);
                $('#id').val(data['id']);
                $('#fullname').val(data.fullname);
                $('#username').val(data.username);
                $('#email').val(data.email);
                $('#gender').val(data.gender);
                
               
            }
        });
       
    
  }
        


  
  );
  
</script>