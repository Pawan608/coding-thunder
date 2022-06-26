<?php
    $servername = "localhost";
    $username = "root";
    $passwd = "";
    $database = "quiz";
    $conn = mysqli_connect($servername, $username, $passwd, $database);
    if(!$conn) {
        echo "Unable to connect with database ".mysqli_connect_error();
    }
?>