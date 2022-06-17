<head>
<?php require_once('../includes/connect.php');?>
</head>
<body>
  <?php if($_SERVER['REQUEST_METHOD'] == "POST") { // grab the chosen post's extant data
  $editID = $_POST['selectpost'];
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
  echo '
    <form method="post" action="editresult.php">
      <label for="postid">Post ID</label><br>
      <input type="text" id="postid" name="postid" value="'.$editID.'" readonly><br>
      <label for="title">Title</label><br>
      <input type="text" id="title" name="title" maxlength="100" value="'.$editTitle.'" required><br>
      <input type="radio" id="editaction" name="actions" value="editaction" checked>
      <label for="editaction">Edit<label>
      <input type="radio" id="deleteaction" name="actions" value="deleteaction">
      <label for="deleteaction">Delete</label><br>
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
  }
  ?>
</body>
