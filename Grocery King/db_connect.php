<?php
$servername = "cssql.seattleu.edu";
$username = "ll_ktran18";
$password = "Cpsc3300Ktran18";
$dbname = "ll_ktran18";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
