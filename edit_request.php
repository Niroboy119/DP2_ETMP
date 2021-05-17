<?php include('include/header.php'); ?>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
 

 <!--Edit training request-->
            <div class="tab-pane" id="requests" role="tabpanel" aria-labelledby="profile-tab">
                <div class="card mb-3" style="margin-top:30px">
                  <div class="card-header">
                    <div class="row">
                      <div class="col-md-9 font-weight-bold"><i class="fas fa-users"></i> Edit Training Request</div>
                    </div>
                  </div>
                  <div class="card-body">
                         
                    <div class="col-md-6">
                    <br>
                     <?php
                        $id =$_GET['id'];
                        include "connection.php";
                        $sql = "SELECT * FROM tbl_client_requests WHERE id =$id ";
                        
                        $result = $conn->query($sql);
                        	if ($result->num_rows > 0) {
                        		while($row = $result->fetch_assoc()) {
                        ?>
                    <form method="post" id="training_request_form">
                        
    					<p class="lead">Edit the appropriate fields.</p>
        					<div id="alert_error_message" class="alert alert-danger collapse" role="alert">
                                <i class="fa fa-exclamation-triangle"></i>
                                Please check in on some of the fields below.
                            </div>
                            <div id="alert_sucess_message" class="alert alert-success collapse" role="alert">
                                Request successfully updated.
                            </div>
        					<div class="mb-3">
                                <label for="fullname">Full Name *</label>
                                <input type="text" class="form-control" id="fname" name="fname" maxlength="50"
                                    placeholder="Enter full name" value="<?=$row['fullname']?>" >
                                <div id="fullname_error_message" class="text-danger"></div>
        					 </div>
                            <div class="mb-3">
                                <label for="email">Email *</label>
                                <input type="email" class="form-control" id="email" name="email" maxlength="100"
                                    placeholder="Enter email" value="<?=$row['email']?>" >
                                <div id="email_error_message" class="text-danger"></div>
                            </div>
                             <!-- include calendar for when the training/workshop should be held -->
                             <div class="mb-3">
                                <label for="training-date">Date for training *</label>
                                <input type="date" class="form-control" id="dateTraining" name="dateTraining"
                                    placeholder="Pick a date" value=<?=strftime('%Y-%m-%d',
  strtotime($row['date_for_training']));?> >
                                <div id="date_error_message" class="text-danger"></div>
                            </div>
                            <!-- Include a training type selection -->
                            <div class="mb-3">
                                <label>Training type *</label>
                                <select name="training-type" id="training-type" class="custom-select" onchange="change(this)" value="none">
                                    <option value="<?php echo $row['training_type']; ?>"><?php echo $row['training_type']; ?></option>
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
                                <input type="number" class="form-control" id="numOfParticipants" name="numOfParticipants" min="1" max="50" value="<?=$row['num_of_attendees'];?>">
                                <div id="numOfAttendees_error_message" class="text-danger"></div>
                            </div>
                            <div style="margin-bottom : 20px;">
                            <hr class="mb-4">    
                            <input type="hidden" name="rid" id="rid" value="<?=$row['id'];?>">
                            <input type="hidden" name="action" id="update_request" value="register_trainingRequest">
                            <button class="btn btn-primary btn-lg btn-block" type="submit">Update training request</button>
                            <hr class="mb-4">
                            </div>
                           
                    </form>
                    <?php	
	}
	}
	else {
	//	echo "0 results";
	}
	mysqli_close($conn);
?>
                    </div>
                    </div>
                    
                </div>
            </div>
<script>
    function change(obj) {

    var selectBox = obj;
    var selected = selectBox.value;
    var othTrainingsDiv = document.getElementById("othT-mb3"); 

    if(selected == 'Others...'){
        othTrainingsDiv.style.display = "";
    }
    else{
        othTrainingsDiv.style.display = "none";
    }
    }
</script>

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
                    data: {'fname': $("#fname").val(), 'email': $("#email").val(), 'dateTraining': $("#dateTraining").val(), 'training-type': $("#training-type").val(), 'othTrainings': $("#othTrainings").val()  ,'numOfParticipants': $("#numOfParticipants").val(), 'rid': $("#rid").val() },
                    url: "profile_edit_request.php",
                    dataType: "json",
                    success: function (data) {
                        if (data.status == 'success') {
                            $("#alert_sucess_message").show();
                            $("#alert_error_message").hide();
                            $('#training_request_form')[0].reset();
                            window.history.back();
                        } else if (data.status == 'error') {
                          alert("Oops! Something went wrong!.");
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

<?php include('include/footer.php'); ?>