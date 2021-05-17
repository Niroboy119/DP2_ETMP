<?php 

session_start();
include "connection.php";

$output='';

    $userId = $_SESSION['user_id'];
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
    $paymentAmount=0;
   
    if ($trainingType == "Work Productivity")
    {
        $paymentAmount=500;
    }else if ($trainingType == "Leadership & Communication Skills")
    {
        $paymentAmount=650;
    }else if ($trainingType == "Language Proficiency")
    {
        $paymentAmount=200;
    }else if ($trainingType == "Negotiation & Presentation Skills")
    {
        $paymentAmount=450;
    }else if ($trainingType == "Personal Development")
    {
        $paymentAmount=350;
    }

    
    if ($oth_training_type == "Describe your desired training...") {
        $oth_training_type = "empty";
    }

    $sql = "INSERT INTO tbl_client_requests (userId,fullname, email, date_for_training, training_type, other_training_type, num_of_attendees, paymentType, billingName, billingEmail, address, city, state, zip, cardName, cardNum, expMonth, expYear, cvv, paymentAmount) 
            VALUES('$userId',
                '$fullname', 
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
                '$cvv',
                '$paymentAmount')";

   if(mysqli_query($conn, $sql)){
          $output = array(
              'status'        => 'success'
          );
      } else
      {
           $output = array(
              'status'        => 'error'
          );
      }
      
          echo json_encode($output);
    
$conn->close();

?> 
