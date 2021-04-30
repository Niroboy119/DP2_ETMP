<?php 

include "connection.php";

$output='';

    $fullname = $_POST['fname'];
    $email = $_POST['email'];
    $tRequestDate = $_POST['dateTraining'];
    $trainingType = $_POST['training-type'];
    $oth_training_type = $_POST['othTrainings'];
    $numOfAttendees = $_POST['numOfParticipants'];

    if ($oth_training_type == "Describe your desired training...") {
        $oth_training_type = "empty";
    }

    $sql = "INSERT INTO tbl_client_requests (fullname, email, date_for_training, training_type, other_training_type, num_of_attendees) 
            VALUES('$fullname', 
                '$email',
                '$tRequestDate',
                '$trainingType',
                '$oth_training_type',
                '$numOfAttendees')";

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
