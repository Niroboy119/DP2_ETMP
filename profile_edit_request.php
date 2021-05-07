<?php 

include "connection.php";

$output='';

    $id = $_SESSION['id'];  
      
    $fullname = $_POST['fname'];
    $email = $_POST['email'];
    $tRequestDate = $_POST['dateTraining'];
    $trainingType = $_POST['training-type'];
    $oth_training_type = $_POST['othTrainings'];
    $numOfAttendees = $_POST['numOfParticipants'];
    
    if ($oth_training_type == "Describe your desired training...") {
        $oth_training_type = "empty";
    }
    
    $sql = "UPDATE tbl_client_requests SET fullname = '$fullname',
                              email = '$email',
                              dateTraining = '$tRequestDate',
                              training-type = '$trainingType',
                              othTrainings = '$oth_training_type',
                              numOfParticipants = '$numOfAttendees'
                              WHERE id = '$id' ";
    
    if(mysqli_query($conn, $sql)){

      $output = array(
        'status'        => 'success'
      );

      $_SESSION['fname']      = $fullname;
      $_SESSION['email']         = $email;
      $_SESSION['dateTraining']        = $tRequestDate;
      $_SESSION['training-type']         = $trainingType;
      $_SESSION['othTrainings']         = $oth_training_type;
      $_SESSION['numOfParticipants']         = $numOfAttendees;

    }else{
      $output = array(
        'status'        => 'error'
      );
    }

    echo json_encode($output);  
    
$conn->close();

?> 