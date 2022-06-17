<!DOCTYPE html>
<head>
  <title>Write | Gutenberg</title>
  <?php require_once('../includes/connect.php'); ?>
</head>
<body>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <label for="title">Title</label><br>
    <input type="text" id="title" name="title" maxlength="100" required><br>
    <label for="body">Body</label><br>
    <textarea id="body" name="body" rows="30" cols="100" required></textarea><br>
    <label for="slug">Slug</label><br>
    <textarea id="slug" name="slug" rows="5" cols="100" maxlength="200" required></textarea><br>
    <label for="featimg">Featured image</label><br>
    <input type="text" id="featimg" name="featimg" required><br>
    <label for="language">Language</label><br>
    <input type="text" id="language" name="language" maxlength="2" required><br>
    <label for="tags">Tags (separate with commas)</label><br>
    <textarea id="tags" name="tags" rows="2" cols="100" required></textarea><br>
    <input type="submit" value="Submit">

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') { // make sure that shit ain't empty!!!
  $title = $_POST['title'];
  $slug = $_POST['slug'];
  $body = $_POST['body'];
  $unescapedImage = $_POST['featimg'];
  $image = htmlspecialchars($unescapedImage); // useful since some images may be from outside
  $language = $_POST['language'];
  $tags = $_POST['tags'];
  $date = date("Y-m-d");

  $insertQuery = "INSERT INTO blog_posts (title, body, slug, image, date, language) VALUES (?, ?, ?, ?, ?, ?)"; // prepare the database to accept a new blog post record
  $stmtInsert = $conn->prepare($insertQuery);
  $stmtInsert->bind_param("ssssss", $title, $body, $slug, $image, $date, $language); // post parameters grabbed from POST method in variables
  $stmtInsert->execute();

  $tagArray = explode(', ', $tags); // tags are retrieved as a string; blow them up into constituent parts
  $tagCount = count($tagArray); // how many tags are there? useful for for since PHP fuckery with
  // foreach is annoying + might be useful later if I want to analyze posts
  $tagQuery = "INSERT INTO tags (name) VALUES (?)"; // tag names are a unique column, so any duplicates from previous posts are just dropped
  $stmtTag = $conn->prepare($tagQuery);
  // loop through each tag name, and execute the query
  for ($i=0; $i < $tagCount; $i++) {
    $currTag = $tagArray[$i];
    $stmtTag->bind_param("s", $currTag);
    $stmtTag->execute();
  }
  // grab the most recent -- aka the one that was just created above -- post
  $assocQuery = "SELECT id FROM blog_posts ORDER BY id DESC LIMIT 1";
  $stmtAssoc = $conn->prepare($assocQuery);
  $stmtAssoc->execute();
  $lastPostAnswer = $stmtAssoc->get_result();
  $lastPostIDRow = $lastPostAnswer->fetch_assoc();
  $lastPostID = $lastPostIDRow['id'];
  echo $lastPostID; // for confirmation
  // now we have its ID to run against the post_tags associative table
  // grab each tag's ID by its name, then place them in the post_tags table next to the post ID
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
