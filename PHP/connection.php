<?php
    $servername = "localhost";
    $username = "root";
    $password = "password";
    $db_name = "osces_login";
    $conn = new mysqli($servername, $username, $password, $db_name, 3306)
    if(&conn->connect_error){
        die("Connection failed".$conn->connect_error);
    }
    echo "Connection Successful";      
?>