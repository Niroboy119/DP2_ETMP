<?php include('include/header.php'); ?>

<body class="bg-light">

    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="text-center mt-5">
                    <a href="index2.php">
                        <img class="mb-2" src="images/logo.jpg" alt="" width="225" height="100" >
                    </a>
                </div>
                <h1 class="text-center">Training Request Form</h1>
                <hr>
                <form id="training_request_form">
					<p class="lead">Fill in the form to see if the required training is provided.</p>
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
						
						 <script>      
  function checkIfYes() {
      if (document.getElementById('defect').value == 'Yes') {
        document.getElementById('extra').style.display = '';
        document.getElementById('auth_by').disabled = false;
        document.getElementById('desc').disabled = false;
      } else {
        document.getElementById('extra').style.display = 'none';
  }
}
</script>

  <div class="form-group">
    <label class="control-label">Payment Type</label>
    <select onchange='checkIfYes()' class="select form-control" id="defect" name="defect">
      <option id="No" value="No">Cash</option>
      <option id="Yes" value="Yes">Online Payment</option>
    </select>
  </div>
                     
  <div id="extra" name="extra" style="display:none">

   <h2>Checkout Form</h2>

<div>
  <div>
    <div>
    
        <div>
          <div>
            <h3>Billing Address</h3>
            <label for="name"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="name" name="name" class="form-control" placeholder="John M. Doe">
			<div id="name_error_message" class="text-danger"></div>

            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email1" class="form-control" name="email" placeholder="john@example.com">
			<div id="email1_error_message" class="text-danger"></div>

            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" class="form-control" name="address" placeholder="Jalan Simpang Tiga">
			<div id="address_error_message" class="text-danger"></div>
			
            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="city" class="form-control" name="city" placeholder="Kuching">
			<div id="city_error_message" class="text-danger"></div>

            <div class="row">
              <div class="col">
                <label for="state">State</label>
                <input type="text" id="state"  maxlength="2" class="form-control" name="state" placeholder="Sarawak">
				<div id="state_error_message"  class="text-danger"></div>
              </div>
              <div class="col">
                <label for="zip">Zip</label>
                <input type="text" id="zip"  maxlength="5" class="form-control" name="zip" placeholder="93350">
				<div id="zip_error_message" class="text-danger"></div>
              </div>
            </div>
          </div>

          <div class="col-50">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" class="form-control" placeholder="John More Doe">
			<div id="cardName_error_message" class="text-danger"></div>
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum"  maxlength="16" class="form-control" name="cardnumber" placeholder="1111-2222-3333-4444">
			<div id="cardNum_error_message"  class="text-danger"></div>
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" class="form-control" name="expmonth" placeholder="September">
			<div id="expM_error_message" class="text-danger"></div>
            <div class="row">
              <div class="col">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear"  maxlength="4" class="form-control" name="expyear" placeholder="2018">
				<div id="expY_error_message" class="text-danger"></div>
              </div>
              <div class="col">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv"  maxlength="3" name="cvv" class="form-control" placeholder="352">
				<div id="cvv_error_message" class="text-danger"></div>
              </div>
            </div>
          </div>
          
        </div>
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
        </label>
        
    </div>
  </div>

  </div>
</div>

						
						
						
						
						 <hr class="mb-4">
                        <input type="hidden" name="action" id="action" value="register_trainingRequest">
                        <button class="btn btn-primary btn-lg btn-block" type="submit">Register training request</button>
					
               
				
            </div>
        </div>
    </div>
<br>

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



    <!-- JQuery-3.4.1 -->
    <script src="vendor/jquery-3.4.1.min.js"></script>

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
			var error_name = false;
            var error_email = false;
			var error_email1 = false;
			var error_date = false;
			var error_training = false;
			var error_attendees = false;
			var error_state = false;
			var error_city = false;
			var error_address = false;
			var error_zip = false;
			var error_cardName = false;
			var error_cardNum = false;
			var error_expM = false;
			var error_expY = false;
			var error_cvv = false;



            $("#fname").focusout(function () {
                check_fullname();
            });

            $("#email").focusout(function () {
                check_email();
            });
			
			$("#email1").focusout(function () {
                check_email1();
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
			
			 $("#name").focusout(function () {
                check_name();
            });
			
			$("#adr").focusout(function () {
                check_address();
            });
			
			$("#city").focusout(function () {
                check_city();
            });
			
			$("#state").focusout(function () {
                check_state();
            });
			
			$("#zip").focusout(function () {
                check_zip();
            });
			
			$("#cname").focusout(function () {
                check_cName();
            });
			
			$("#ccnum").focusout(function () {
                check_cNum();
            });
			
			$("#expmonth").focusout(function () {
                check_expM();
            });
			
			$("#expyear").focusout(function () {
                check_expY();
            });
			
			$("#cvv").focusout(function () {
                check_cvv();
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
			
			
			function check_city() {
                if ($.trim($('#city').val()) == '') {
                    $("#city_error_message").html("City is a required field.");
                    $("#city_error_message").show();
                    $("#city").addClass("is-invalid");
                    error_city = true;
                } else {
                    $("#city_error_message").hide();
                    $("#city").removeClass("is-invalid");
                }
            }
			
			
			function check_state() {
                if ($.trim($('#state').val()) == '') {
                    $("#state_error_message").html("State is a required field.");
                    $("#state_error_message").show();
                    $("#state").addClass("is-invalid");
                    error_state = true;
                } else {
                    $("#state_error_message").hide();
                    $("#state").removeClass("is-invalid");
                }
            }
			
			function check_zip() {
                if ($.trim($('#zip').val()) == '') {
                    $("#zip_error_message").html("Zip is a required field.");
                    $("#zip_error_message").show();
                    $("#zip").addClass("is-invalid");
                    error_zip = true;
                } else {
                    $("#zip_error_message").hide();
                    $("#zip").removeClass("is-invalid");
                }
            }
			
			function check_cName() {
                if ($.trim($('#cname').val()) == '') {
                    $("#cardName_error_message").html("Name on Card is a required field.");
                    $("#cardName_error_message").show();
                    $("#cname").addClass("is-invalid");
                    error_cardName = true;
                } else {
                    $("#cardName_error_message").hide();
                    $("#cname").removeClass("is-invalid");
                }
            }
			
			function check_cNum() {
                if ($.trim($('#ccnum').val()) == '') {
                    $("#cardNum_error_message").html("Card Number is a required field.");
                    $("#cardNum_error_message").show();
                    $("#ccnum").addClass("is-invalid");
                    error_cardNum = true;
                } else {
                    $("#cardNum_error_message").hide();
                    $("#ccnum").removeClass("is-invalid");
                }
            }
			
			function check_expY() {
                if ($.trim($('#expyear').val()) == '') {
                    $("#expY_error_message").html("The Year of Expiry is a required field.");
                    $("#expY_error_message").show();
                    $("#expyear").addClass("is-invalid");
                    error_expY = true;
                } else {
                    $("#expY_error_message").hide();
                    $("#expyear").removeClass("is-invalid");
                }
            }
			
			function check_expM() {
                if ($.trim($('#expmonth').val()) == '') {
                    $("#expM_error_message").html("The Month of Expiry is a required field.");
                    $("#expM_error_message").show();
                    $("#expmonth").addClass("is-invalid");
                    error_expM = true;
                } else {
                    $("#expM_error_message").hide();
                    $("#expmonth").removeClass("is-invalid");
                }
            }
			
			function check_cvv() {
                if ($.trim($('#cvv').val()) == '') {
                    $("#cvv_error_message").html(" is a required field.");
                    $("#cvv_error_message").show();
                    $("#cvv").addClass("is-invalid");
                    error_cvv = true;
                } else {
                    $("#cvv_error_message").hide();
                    $("#cvv").removeClass("is-invalid");
                }
            }
			
			
			 function check_address() {
                if ($.trim($('#adr').val()) == '') {
                    $("#address_error_message").html("Address is a required field.");
                    $("#address_error_message").show();
                    $("#adr").addClass("is-invalid");
                    error_address = true;
                } else {
                    $("#address_error_message").hide();
                    $("#adr").removeClass("is-invalid");
                }
            }
			
			
			
			
			
			function check_name() {
                if ($.trim($('#name').val()) == '') {
                    $("#name_error_message").html("Fullname is a required field.");
                    $("#name_error_message").show();
                    $("#name").addClass("is-invalid");
                    error_fullname = true;
                } else {
                    $("#name_error_message").hide();
                    $("#name").removeClass("is-invalid");
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
			
			
			
			 function check_email1() {
                var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
                var email_length = $("#email1").val().length;

                if ($.trim($('#email1').val()) == '') {
                    $("#email1_error_message").html("Email is a required field.");
                    $("#email1_error_message").show();
                    $("#email1").addClass("is-invalid");
                } else if (!(pattern.test($("#email1").val()))) {
                    $("#email1_error_message").html("Invalid email address");
                    $("#email1_error_message").show();
                    error_email = true;
                    $("#email1").addClass("is-invalid");
                } else {
                    $("#email1_error_message").hide();
                    $("#email1").removeClass("is-invalid");
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
				error_email1 = false;
				error_date=false;
                error_training= false;
				error_attendees= false;
				error_name=false;
				error_address=false;
				error_city=false;
				error_state=false;
				error_zip=false;
				error_cardName=false;
				error_cardNum=false;
				error_expM=false;
				error_expY=false;
				error_cvv=false;

				
				check_fullname();
                check_email();
				check_date();
				check_training();
				check_numOfAttendees();
				
				if (error_fullname == false && error_email == false && error_date == false && error_training == false && error_attendees == false)
				
				{
			        
				if((document.getElementById("defect").value=="No"))
				
				{
				    
					
                    $.ajax({
                        type: "POST",
                        data: { 'fname': $("#fname").val(), 'email': $("#email").val(), 'dateTraining': $("#dateTraining").val(), 'training-type': $("#training-type").val(), 'othTrainings': $("#othTrainings").val()  ,'numOfParticipants': $("#numOfParticipants").val() },
                        url: "tRequest_action.php",
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
                    return false;
				} 
				else {
				
				check_name();
				check_email1();
				check_address();
				check_city();
				check_state();
				check_zip();
				check_cName();
				check_cNum();
				check_expM();
				check_expY();
				check_cvv();
				
				
				if(error_cvv==false && error_expY==false && error_expM==false && error_cardName==false && error_cardNum==false && error_zip==false && error_state==false && error_city==false && error_address==false && error_name == false && error_email1 == false) {
                   $.ajax({
                        type: "POST",
                         data: { 'fname': $("#fname").val(), 'email': $("#email").val(), 'dateTraining': $("#dateTraining").val(), 'training-type': $("#training-type").val(), 'othTrainings': $("#othTrainings").val()  ,'numOfParticipants': $("#numOfParticipants").val(), 'bName': $("#name").val(), 'bEmail': $("#email1").val(), 'address': $("#adr").val(), 'city': $("#city").val(), 'state': $("#state").val(), 'zip': $("#zip").val(), 'cardName': $("#cname").val(), 'cardNum': $("#ccnum").val(), 'expMonth': $("#expmonth").val(), 'expYear': $("#expyear").val(), 'cvv': $("#cvv").val() },
                        url: "tRequest_action1.php",
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
                    return false;
				}									
			}
				
		} 
				
				else {
                    $("#alert_sucess_message").hide();
                    $("#alert_error_message").show();
                    
                }				
				
            }
        });
    </script>

</form>
</body>

</html>
<br>
<br>
<br>
<?php include('include/footer.php'); ?>
