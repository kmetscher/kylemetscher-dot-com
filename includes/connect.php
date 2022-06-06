<?php
$serverName = "localhost";
$userName = "root";
$password = "brooklynowesthecharmerunderme2000#$";
$dbName = "kylemetscher";

// connect object
$conn = mysqli_connect($serverName, $userName, $password, $dbName);
// check
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
} else {
  echo '<h1>mysql connected</h1>';
}
