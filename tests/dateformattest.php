<!DOCTYPE html>
<?php
require_once('../includes/connect.php');
$dateTestQuery = "SELECT date FROM blog_posts WHERE id=7";
$dateTestAnswer = $conn->query($dateTestQuery);
while ($returnedDate = mysqli_fetch_row($dateTestAnswer)) {
echo "returned date<br>";
  echo $returnedDate[0];
}
echo "<br>formatted date<br>";
$unixDate = strtotime($returnedDate[0]);
$formattedDate = date('j F Y', $unixDate);
echo $formattedDate;
?>
