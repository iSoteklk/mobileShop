<?php
//php connection 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mobileshop";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
}


?>