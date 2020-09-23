<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = 'e-learner';
// Create connection
$conn = new mysqli($servername, $username, $password,$db);

// Check connection
if (!$conn) {
  echo "Unsucessful connection".mysqli_connect_error();
  
}
else{
#echo "Connected successfully";
}
?> 
  