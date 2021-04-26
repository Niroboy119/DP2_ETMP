<?php 

include "connection.php"

    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $tRequestDate = $_POST['dateTraining'];
    $trainingType = $_POST['training-type'];
    $oth_training_type = $_POST['othTrainings'];
    $numOfAttendees = $_POST['numOfParticipants'];

    if ($oth_training_type == "") {
        $oth_training_type = "empty";
    }

    $sql = "INSERT INTO tbl_users (fullname, email, date_for_training, training_type, other_training_type, num_of_attendees) 
            VALUES('$fullname', 
                '$email',
                '$tRequestDate',
                '$trainingType',
                '$oth_training_type',
                '$numOfAttendees')";

    if (!mysql_query($sql)) {
        die("error".mysqli_connect_error());
    }else {
        echo"client requested insert into database";
    }

?> 