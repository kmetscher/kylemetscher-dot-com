<!DOCTYPE html>

<?php require_once('includes/connect.php') ?>

<?php $tagNames = array();
$tagIDs = array();
$tagQuery = "SELECT tags.* FROM post_tags LEFT JOIN (tags) ON (post_tags.tag_id = tags.id) WHERE post_tags.post_id=4 ORDER BY name ASC";
$tagAnswer = $conn->query($tagQuery);

for ($i=0; $i < 10; $i++) {
  echo "howdy<br>";
  while($tagRow = mysqli_fetch_assoc($tagAnswer)) {
    echo $tagRow['id'];
    echo " ";
    echo $tagRow['name'];
    echo "<br>";
  }
}
