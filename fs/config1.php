<?php
$servername = "localhost";

$username = "root";

$password = "";

$dbname = "db"; 
$port=3306;

$conn = new mysqli($servername, $username, $password, $dbname,$port);

if($conn->connect_error) {

    echo "Connection Failed";
    die("Connection Failed" . $conn->connect_error);

}
?>