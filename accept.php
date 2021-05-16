<?php
include "connection.php"; 
error_reporting(0);

$id = $_GET['id']; // get id through query string

//$query = "DELETE FROM tbl_client_requests WHERE id='$id'";

$query = "INSERT INTO tbl_accepted_requests
SELECT * FROM tbl_client_requests
WHERE id='$id'";

$data=mysqli_query($conn,$query); 

if($data){
    
    echo '<script>alert("Request Accepted")</script>';
}else{
    echo '<script>alert("Request not placed.")</script>';

}


?>