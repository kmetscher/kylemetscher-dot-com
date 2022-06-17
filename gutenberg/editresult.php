<head>
  <title>Action | Gutenberg</title>
  <?php require_once('../includes/connect.php');?>
</head>
<?php if($_SERVER['REQUEST_METHOD'] == "POST") {
  $updateAction = $_POST['actions'];
  $updateID = $_POST['postid'];
  $updateTitle = $_POST['title'];
  $updateBody = $_POST['body'];
  $updateSlug = $_POST['slug'];
  $updateImage = $_POST['featimg'];
  $updateLanguage = $_POST['language'];

  /*echo "$updateAction <br>";
  echo "$updateID <br>";
  echo "$updateTitle <br>";
  echo "$updateBody <br>";
  echo "$updateSlug <br>";
  echo "$updateImage <br>";
  echo "$updateLanguage <br>";*/

  if($updateAction == "editaction") {
    $updateQuery = "UPDATE blog_posts SET title=?, body=?, slug=?, image=?, language=? WHERE id=?";
    $stmtUpdate = $conn->prepare($updateQuery);
    $stmtUpdate->bind_param("sssssi", $updateTitle, $updateBody, $updateSlug, $updateImage, $updateLanguage, $updateID);
    if ($stmtUpdate->execute()) {
    echo "Updated $updateID -- $updateTitle <br>";
    printf("Rows affected: %d\n", $conn->affected_rows);
    }
    else {
      printf("Debugging: %d\n", $stmtUpdate->errorno);
    }
  }
  else if($updateAction == "deleteaction") {
    echo "bro are you sure lol";
    // currently in an Alpha testing stage.
  }
}
