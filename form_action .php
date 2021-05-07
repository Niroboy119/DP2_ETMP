<?php 

include "connection.php";

$output='';

    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $request = $_POST['request'];
    $website = $_POST['website'];
    $priority = $_POST['priority'];
	$type = $_POST['type'];
	$description = $_POST['description'];
	

    if ($description == "Please Leave Your Message Here...") {
        $description = "empty";
    }

    $sql = "INSERT INTO messages (fullname, email, phone, request, website, priority, type, description) 
            VALUES('$fullname', 
                '$email',
                '$phone',
                '$request',
                '$website',
				'$priority',
				'$type',
                '$description')";

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