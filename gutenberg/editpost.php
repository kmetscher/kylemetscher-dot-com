<!DOCTYPE html>
<head>
  <title>Edit | Kyle Metscher</title>
  <?php require_once('../includes/connect.php'); ?>
</head>
<body>
  <p>are we alive?</p>
  <?php
    $allPostsQuery = "SELECT id, title FROM blog_posts ORDER BY id DESC"; // need to know what posts I got if I wanna edit em
    $stmtGetPosts = $conn->prepare($allPostsQuery);
    $stmtGetPosts->execute();
    $allPostsAnswer = $stmtGetPosts->get_result();
  ?>
  <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="get">
  <div style="max-height: 25vw; overflow: scroll;">
    <?php while($allPostsRow = $allPostsAnswer->fetch_assoc()) {
      $postID = $allPostsRow['id'];
      $postTitle = $allPostsRow['title'];
      echo '<input type="radio" id="'.$postID.'" value="'.$postID.'" name="selectpost">';
      echo '<label for="'.$postID.'">'.$postTitle.'</label><br>';
    } ?>
  </div>
  <input type="submit" value="Get">
</form>
<?php if($_SERVER['REQUEST_METHOD'] == "GET") { // grab the chosen post's extant data
  $editID = $_GET['selectpost'];
  $editQuery = "SELECT title, body, slug, image, language FROM blog_posts WHERE id=?";
  $stmtEdit = $conn->prepare($editQuery);
  $stmtEdit->bind_param("i", $editID);
  $stmtEdit->execute();
  $editAnswer = $stmtEdit->get_result();
  $editRow = $editAnswer->fetch_assoc();
  // because i am lazy and don't feel like scouring my code for proper concatenation
  $editTitle = $editRow['title']; $editBody = $editRow['body']; $editSlug = $editRow['slug']; $editImage = $editRow['image']; $editLanguage = $editRow['language'];
  // i could not possibly be bothered to put all of that shit on their own lines
  echo "<h2>Editing $editID -- $editTitle</h2>";
  // the extant values are echoed into a form much like the write post page
  echo '
    <form method="post" action="'.$_SERVER['PHP_SELF'].'">
      <label for="title">Title</label><br>
      <input type="text" id="title" name="title" maxlength="100" value="'.$editTitle.'" required><br>
      <label for="body">Body</label><br>
      <textarea id="body" name="body" rows="30" cols="100" required>'.$editBody.'</textarea><br>
      <label for="slug">Slug</label><br>
      <textarea id="slug" name="slug" rows="5" cols="100" maxlength="200" required>'.$editSlug.'</textarea><br>
      <label for="featimg">Featured image</label><br>
      <input type="text" id="featimg" name="featimg" value="'.$editImage.'" required><br>
      <label for="language">Language</label><br>
      <input type="text" id="language" name="language" maxlength="2" value="'.$editLanguage.'" required><br>
      <label for="tags">Tags (separate with commas)</label><br>
      <textarea id="tags" name="tags" rows="2" cols="100"></textarea><br>
      <input type="submit" value="Submit">';
} // tags can go without the same treatment since 1) coding that would be a pain in the dick
  // and 2) adding a new tag doesn't risk duplication since it has a primary key
  if($_SERVER['REQUEST_METHOD'] == "POST") { // are we having fun yet?
    $updateQuery = "UPDATE blog_posts SET title=?, body=?, slug=?, image=?, language=? WHERE id=?";
    $stmtUpdate = $conn->prepare($updateQuery);
    $updateTitle = $_POST['title']; $updateBody = $_POST['body']; $updateSlug = $_POST['slug']; $updateImage = $_POST['featimg']; $updateLanguage = $_POST['language'];
    $stmtUpdate->bind_param("sssssi", $updateTitle, $updateBody, $updateSlug, $updateImage, $updateLanguage, $editID);
    $stmtUpdate->execute();
    echo "$updateTitle";
    printf("Affected rows: %d\n", $conn->affected_rows);
    }
?>
</body>
