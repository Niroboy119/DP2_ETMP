<?php 

include "connection.php";

$output='';

    $fullname = $_POST['fname'];
    $email = $_POST['email'];
    $tRequestDate = $_POST['dateTraining'];
    $trainingType = $_POST['training-type'];
    $oth_training_type = $_POST['othTrainings'];
    $numOfAttendees = $_POST['numOfParticipants'];
    $billingEmail = $_POST['bEmail'];
    $billingName = $_POST['bName'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $cardName = $_POST['cardName'];
    $cardNum = $_POST['cardNum'];
    $expMonth = $_POST['expMonth'];
    $expYear = $_POST['expYear'];
    $cvv = $_POST['cvv'];
    $payType="Online Payment";
    
    

    
    if ($oth_training_type == "Describe your desired training...") {
        $oth_training_type = "empty";
    }


 $sql = "INSERT INTO tbl_client_requests (fullname, email, date_for_training, training_type, other_training_type, num_of_attendees, paymentType, billingName, billingEmail, address, city, state, zip, cardName, cardNum, expMonth, expYear, cvv) 
            VALUES('$fullname', 
                '$email',
                '$tRequestDate',
                '$trainingType',
                '$oth_training_type',
                '$numOfAttendees',
                '$payType',
                '$billingName',
                '$billingEmail',
                '$address',
                '$city',
                '$state',
                '$zip',
                '$cardName',
                '$cardNum',
                '$expMonth',
                '$expYear',
                '$cvv')";

    
$conn->close();

?> 
