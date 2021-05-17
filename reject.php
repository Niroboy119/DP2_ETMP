<?php
include "connection.php"; 
error_reporting(0);

$id = $_GET['id']; // get id through query string

//$query = "DELETE FROM tbl_client_requests WHERE id='$id'";

$query = "UPDATE tbl_client_requests
SET approval = 'Rejected'
WHERE id='$id'";

$data=mysqli_query($conn,$query); 



header("Location: profile.php");
    exit;


?>