<?php
$server = "localhost";
$username = "username";
$password = "password";
$database = "fmh_db";


// Create connection
$conn = new mysqli($server, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>