<?php
$servername = "localhost";
$username = "szhang73";
$password = "n=WHSuGJ";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully";

?>



