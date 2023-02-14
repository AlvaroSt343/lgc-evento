<?php
    //   $servername = "localhost";
    //   $database = "sitiotest_eventolgc";
    //   $username = "sitiotest_alvaro";
    //   $password = "alvaro9981*+";
    
    
    $servername = "localhost";
    $database = "lgc_evento";
    $username = "admin";
    $password = "admin";
    
    
    //Create connection
    $conn = mysqli_connect($servername, $username, $password, $database);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    //echo "Connected successfully";
    echo "<br><br><br>";
    //mysqli_close($conn);
