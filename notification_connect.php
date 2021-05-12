<?php

    $servername="localhost";
    $username="id16670827_expertcom";
    $password="1q2w3e4r5t!A";
    $dbname="id16670827_expertcomm";

    // Create connection
    $connect = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if(!$connect){
        die("Connection failed: ".mysqli_connect_error());
    }

 ?>