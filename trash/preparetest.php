<!DOCTYPE html>
<head>
<?php require_once('includes/connect.php');
      require_once('includes/headernav.php');
      $viewPostID = htmlspecialchars($_SERVER['QUERY_STRING']);
      $viewPostQuery = "SELECT title, body, image, date, language FROM blog_posts WHERE id=$viewPostID";
      $viewPostAnswer = $conn->query($viewPostQuery);
      $viewPost = mysqli_fetch_assoc($viewPostAnswer);
      $postTagsQuery = "SELECT tags.* FROM post_tags LEFT JOIN (tags) ON (post_tags.tag_id = tags.id) WHERE post_tags.post_id=$viewPostID ORDER BY name ASC";
      $postTagsAnswer = $conn->query($postTagsQuery);
      echo '<title>'.$viewPost['title'].' | Kyle Metscher</title>';
?>
</head>
