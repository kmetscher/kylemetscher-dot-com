<!DOCTYPE html>
<head>
  <title>Select | Gutenberg</title>
  <?php require_once('../includes/connect.php'); ?>
</head>
<body>
  <?php
    $allPostsQuery = "SELECT id, title FROM blog_posts ORDER BY id DESC"; // need to know what posts I got if I wanna edit em
    $stmtGetPosts = $conn->prepare($allPostsQuery);
    $stmtGetPosts->execute();
    $allPostsAnswer = $stmtGetPosts->get_result();
  ?>
  <form action="editpost.php" method="post">
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
