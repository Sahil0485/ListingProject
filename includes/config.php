<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "u152996850_lypiind";

//Connect and select the database
$conn = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>