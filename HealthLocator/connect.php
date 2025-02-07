<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "healthlocator";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);

// Check connection: procedural
if (!$conn) {
 die("Connection failed: " . mysqli_connect_error()); // terminate conn & display the error message
}
?>