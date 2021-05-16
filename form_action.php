<?php 
require_once("connection.php");
if((isset($_POST['your_name'])&& $_POST['your_name'] !='') && (isset($_POST['your_email'])&& $_POST['your_email'] !=''))
{

$yourName = $conn->real_escape_string($_POST['your_name']);
$yourEmail = $conn->real_escape_string($_POST['your_email']);
$yourPhone = $conn->real_escape_string($_POST['your_phone']);
$comments = $conn->real_escape_string($_POST['comments']);
$yourPhonecall = $conn->real_escape_string($_POST['your_phonecall']);
$yourWebsite = $conn->real_escape_string($_POST['your_website']);
$yourPriority = $conn->real_escape_string($_POST['your_priority']);
$yourType = $conn->real_escape_string($_POST['your_type']);
$sql="INSERT INTO contactus (name, email, phone, comments, phonecall, website, priority, type, created_date) VALUES ('".$yourName."','".$yourEmail."', '".$yourPhone."', '".$comments."', '".$yourPhonecall."', '".$yourWebsite."', '".$yourPriority."', '".$yourType."', now())";
if(!$result = $conn->query($sql)){
die('There was an error running the query [' . $conn->error . ']');
}
else
{
echo "Thank you! We will contact you soon";
}
}
else
{
echo "Please fill Name and Email";
}
?>