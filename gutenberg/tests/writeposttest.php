<!DOCTYPE html>
<head>
  <title>Write | Kyle Metscher</title>
  <?php require_once('../../includes/connect.php'); ?>
</head>
<body>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <label for="title">Title</label><br>
    <input type="text" id="title" name="title"><br>
    <label for="body">Body</label><br>
    <textarea id="body" name="body" rows="30" cols="100"></textarea><br>
    <label for="slug">Slug</label><br>
    <textarea id="slug" name="slug" rows="5" cols="100"></textarea><br>
    <label for="featimg">Featured image</label><br>
    <input type="text" id="featimg" name="featimg"><br>
    <label for="language">Language</label><br>
    <input type="text" id="language" name="language"><br>
    <label for="tags">Tags (separate with commas)</label><br>
    <textarea id="tags" name="tags" rows="2" cols="100"></textarea><br>
    <input type="submit" value="Submit">

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $title = $_POST['title'];
  $slug = $_POST['slug'];
  $body = $_POST['body'];
  $unescapedImage = $_POST['featimg'];
  $image = htmlspecialchars($unescapedImage);
  $language = $_POST['language'];
  $tags = $_POST['tags'];
  $date = date("Y-m-d");

  $insertQuery = "INSERT INTO blog_posts (title, body, slug, image, date, language) VALUES (?, ?, ?, ?, ?, ?)";
  $stmtInsert = $conn->prepare($insertQuery);
  $stmtInsert->bind_param("ssssss", $title, $body, $slug, $image, $date, $language);
  $stmtInsert->execute();

  $tagArray = explode(', ', $tags);
  $tagCount = count($tagArray);

  $tagQuery = "INSERT INTO tags (name) VALUES (?)";
  $stmtTag = $conn->prepare($tagQuery);

  for ($i=0; $i < $tagCount; $i++) {
    $currTag = $tagArray[$i];
    $stmtTag->bind_param("s", $currTag);
    $stmtTag->execute();
    echo $currTag;
    echo "<br>";
  }

  $assocQuery = "SELECT id FROM blog_posts ORDER BY id DESC LIMIT 1";
  $stmtAssoc = $conn->prepare($assocQuery);
  $stmtAssoc->execute();
  $lastPostAnswer = $stmtAssoc->get_result();
  $lastPostIDRow = $lastPostAnswer->fetch_assoc();
  $lastPostID = $lastPostIDRow['id'];
  echo $lastPostID;

  $postTagQuery = "INSERT INTO post_tags (post_id, tag_id) VALUES (?, ?)";
  $stmtPostTag = $conn->prepare($postTagQuery);
  for ($i=0; $i < $tagCount; $i++) {
    $currTag = $tagArray[$i];
    $tagIDQuery = "SELECT id FROM tags WHERE name=?";
    $stmtTagID = $conn->prepare($tagIDQuery);
    $stmtTagID->bind_param("s", $currTag);
    $stmtTagID->execute();
    $tagIDAnswer = $stmtTagID->get_result();
    $tagIDRow = $tagIDAnswer->fetch_assoc();
    $tagID = $tagIDRow['id'];
    $stmtPostTag->bind_param("ii", $lastPostID, $tagID);
    $stmtPostTag->execute();
  }

}
?>

  </form>
</body>
