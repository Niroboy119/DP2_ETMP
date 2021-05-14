<?php

  //header.php
  
  session_start();

  if(!isset($_SESSION["username"]))
  {
    header('location: login.html');
  }

?>

<?php
session_start();
    $text = $_POST['text'];
     
    $text_message = "<div class='msgln'><b class='user-name'>".$_SESSION['username']."</b> ".stripslashes(htmlspecialchars($text))."<br></div>";
    file_put_contents("log.html", $text_message, FILE_APPEND | LOCK_EX);

?>
