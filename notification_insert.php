<?php
//insert.php
if(isset($_POST["subject"]))
{
 include("connection.php");
 
 $subject = mysqli_real_escape_string($conn, $_POST["subject"]);
 $comment = mysqli_real_escape_string($conn, $_POST["comment"]);
 $status=0;
 $query = "
 INSERT INTO tbl_notifications(notification_subject, notification_text, notification_status)
 VALUES ('$subject', '$comment', '$status')";
 mysqli_query($conn, $query);
}
?>