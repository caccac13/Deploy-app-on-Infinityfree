<?php
$servername = "sql307.infinityfree.com";
$username = "if0_37048394";
$password = "Caccac13";
$dbname = "if0_37048394_final";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
