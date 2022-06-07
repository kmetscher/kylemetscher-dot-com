<?php require_once('includes/connect.php') ?>
<?php // Use a left join on tags and post_tags table to create an array
      // of IDs to be linked to and tag names to get displayed in tagbox
$tagNames = array();
$tagIDs = array();
$tagQuery = "SELECT tags.* FROM post_tags LEFT JOIN (tags) ON (post_tags.tag_id = tags.id) WHERE post_tags.post_id=4 ORDER BY name ASC";
$tagAnswer = $conn->query($tagQuery);
while($tagRow = mysqli_fetch_assoc($tagAnswer)) {
  array_push($tagNames, $tagRow['name']);
  array_push($tagIDs,   $tagRow['id']);
}
$numTags = count($tagIDs);
?>

<?php
echo "<h2>tagNames</h2>";
foreach ($tagNames as $id => $name) {
  echo "$id = $name<br>";
}
echo "<br>";
echo "<h2>tagIDs</h2>";
foreach ($tagIDs as $id => $name) {
  echo "$id = $name<br>";
}
echo "<h2>numTags for loop test</h2>";
for ($i=0; $i < $numTags; $i++) {
  echo "$tagIDs[$i] = $tagNames[$i]<br>";
}
?>
