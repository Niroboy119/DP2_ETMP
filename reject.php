<?php
include "connection.php"; 
error_reporting(0);

$id = $_GET['id']; // get id through query string

$query = "DELETE FROM tbl_client_requests WHERE id='$id'";

$data=mysqli_query($conn,$query); 

if($data){
    
    echo '<script>alert("Record Deleted from Database")</script>';
}else{
    echo '<script>alert("Failed to delete record from Database")</script>';

}


?>