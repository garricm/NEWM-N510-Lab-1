<?php
$server = "localhost";
$username = "sdevula";
$password = "reanimates coloreds occasional";
$database = "sdevula_db";


// Create connection
$conn = new mysqli($server, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else
{ 
	
}

?>