<!DOCTYPE html>
<html>

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>ETMP - Training Request Form</title>

        <!-- Bootstrap v4.4.1 -->
        <link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.min.css">

        <!-- favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="images/favicon.jpg">

    </head>

    <body class="bg-light">

        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <h1 class="text-center">Training Request Form</h1>
                    <hr>
                    <form id="training_request_form" action="tRequest_action.php" method="POST">
                        <p class="lead">Fill in the form to see if the required training is provided.</p>
                        <div id="alert_error_message" class="alert alert-danger collapse" role="alert">
                            <i class="fa fa-exclamation-triangle"></i>
                            Please check in on some of the fields below.
                        </div>
                        <div id="alert_sucess_message" class="alert alert-success collapse" role="alert">
                            <p>Request created and successfully forwarded.</p>
                        </div>
                        <div class="mb-3">
                            <label for="fullname">Full Name *</label>
                            <input type="text" class="form-control" id="fullname" name="fullname" maxlength="50"
                                placeholder="Enter full name" required>
                            <div id="fullname_error_message" class="text-danger"></div>
                        </div>
                        <div class="mb-3">
                            <label for="email">Email *</label>
                            <input type="email" class="form-control" id="email" name="email" maxlength="100"
                                placeholder="Enter email" required>
                            <div id="email_error_message" class="text-danger"></div>
                        </div>
                         <!-- include calendar for when the training/workshop should be held -->
                         <div class="mb-3">
                            <label for="training-date">Date for training *</label>
                            <input type="date" class="form-control" id="dateTraining" name="dateTraining"
                                placeholder="Pick a date" required>
                            <div id="date_error_message" class="text-danger"></div>
                        </div>
                        <!-- Include a training type selection -->
                        <div class="mb-3">
                            <label>Training type *</label>
                            <select name="training-type" id="training-type" class="custom-select" onchange="change(this)" required>
                                <option hidden>Select training type</option>
                                <option>Leadership & Communication skills training</option>
                                <option>Work productivity training</option>
                                <option>Language Proficiency training</option>
                                <option>Negotiation & Presentation skills training</option>
                                <option>Personal Development training</option>
                                <option>Others...</option>
                            </select>
                            <div id="trainingType_error_message" class="text-danger"></div>
                        </div>
                        <!-- include text box for client to describe training needed -->
                        <!-- if the needed, training is not included in the training drop down list -->
                        <div id="othT-mb3" class="mb-3">
                            <label for="other-trainings">Other training description</label>
                            <textarea class="form-control" id="othTrainings" name="othTrainings" required rows="5" cols="20">Describe your desired training...</textarea>
                            <div id="otherTraining_error_message" class="text-danger"></div>
                        </div>
                        <div class="mb-3">
                            <label for="numOfParticipants">Number of Attendees *</label>
                            <input type="number" class="form-control" id="numOfParticipants" name="numOfParticipants" min="1" max="50" required>
                            <div id="numOfAttendees_error_message" class="text-danger"></div>
                        </div>
                        <hr class="mb-4">
                        <input type="hidden" name="action" id="action" value="register_user">
                        <button class="btn btn-primary btn-lg btn-block" type="submit">Register training request</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- JQuery-3.4.1 -->
        <script src="bootstrap/bootstrap.min.js"></script>

        <script>
            function change(obj) {

            var selectBox = obj;
            var selected = selectBox.value;
            var othTrainingsDiv = document.getElementById("othT-mb3"); 
            //var textarea = document.getElementById("othTrainings");

            if(selected === 'Others...'){
                othTrainingsDiv.style.display = "";
            }
            else{
                othTrainingsDiv.style.display = "none";
            }
            }
        </script>

        <!-- <script>
            $(document).ready(function () {
    
                $(document).keypress(function (e) {
                    if (e.which == 13) {
                        registerTrainingRequest();
                    }
                });
    
                $('#training_request_form').on('submit', function (event) {
                    event.preventDefault();
                    registerTrainingRequest();
                });
    
                var error_fullname = false;
                var error_email = false;
                var error_date = false;
                var error_training_type = false;
                var error_oth_training_type = false;
                var error_numof_attendees = false;
    
                $("#fullname").focusout(function () {
                    check_fullname();
                });
    
                $("#email").focusout(function () {
                    check_email();
                });
    
                $("#dateTraining").focusout(function () {
                    check_dateTraining();
                });
    
                $("#training-type").focusout(function () {
                    check_training_type();
                });
    
                $("#othTrainings").focusout(function () {
                    check_othTrainings();
                });
    
                $("#numOfParticipants").focusout(function () {
                    check_numof_participants();
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

                function check_dateTraining() {
                    if ($.trim($('#dateTraining').val()) == '') {
                        $("#date_error_message").html("Date for training is a requirment");
                        $("#date_error_message").show();
                        $("#dateTraining").addClass("is-invalid");
                        error_username = true;
                    } else {
                        $("#date_error_message").hide();
                        $("##dateTraining").removeClass("is-invalid");
                    }
                }
    
                function check_training_type() {
                    if ($.trim($('#training-type').val()) == '') {
                        $("trainingType_error_message").html("Fullname is a required field.");
                        $("trainingType_error_message").show();
                        $("#training-type").addClass("is-invalid");
                        error_fullname = true;
                    } else {
                        $("trainingType_error_message").hide();
                        $("#training-type").removeClass("is-invalid");
                    }
                }

                function check_othTrainings() {
                    if ($.trim($('#othTrainings').val()) == '') {
                        $("otherTraining_error_message").html("Fullname is a required field.");
                        $("otherTraining_error_message").show();
                        $("#othTrainings").addClass("is-invalid");
                        error_fullname = true;
                    } else {
                        $("otherTraining_error_message").hide();
                        $("#othTrainings").removeClass("is-invalid");
                    }
                }
    
                function check_numof_participants() {
                    if ($.trim($('#numOfParticipants').val()) == '') {
                        $("numOfAttendees_error_message").html("Fullname is a required field.");
                        $("numOfAttendees_error_message").show();
                        $("#numOfParticipants").addClass("is-invalid");
                        error_fullname = true;
                    } else {
                        $("numOfAttendees_error_message").hide();
                        $("#numOfParticipants").removeClass("is-invalid");
                    }
                }
    
                function registerTrainingRequest() {

                    error_fullname = false;
                    error_email = false;
                    error_date = false;
                    error_training_type = false;
                    error_oth_training_type = false;
                    error_numof_attendees = false;
    
                    check_fullname();
                    check_email();
                    check_dateTraining();
                    check_training_type();
                    check_othTrainings();
                    check_numof_participants();
    
                    if (error_fullname == false && error_email == false && error_date == false &&  error_training_type == false && error_oth_training_type == false && error_numof_attendees) {
    
                        data = $('#training_request_form').serialize();
                        $.ajax({
                            type: "POST",
                            data: data,
                            url: "profile_action.php",
                            dataType: "json",
                            success: function (data) {
                                if (data.status == 'success') {
                                    $("#alert_sucess_message").show();
                                    $("#alert_error_message").hide();
                                    $('#training_request_form')[0].reset();
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
            });
        </script> -->


</html>