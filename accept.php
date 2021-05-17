<?php
include "connection.php"; 
error_reporting(0);

$id = $_GET['id']; // get id through query string

$query = "UPDATE tbl_client_requests
SET approval = 'Approved'
WHERE id='$id'";

//$query = "INSERT INTO tbl_accepted_requests
//SELECT * FROM tbl_client_requests
//WHERE id='$id'";

$data=mysqli_query($conn,$query); 




header("Location: profile.php");
    exit;



?>