<!DOCTYPE html>
<html>
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
    <meta charset="utf-8">
    <link href="styles/viewpost.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@500&display=swap" rel="stylesheet">
  </head>

  <body>
    <div class="container">
      <div class="main">
        <div class="blogpost">
          <?php echo '<h2>'.$viewPost['title'].'</h2>';
                echo '<img class="blogpost" src="'.$viewPost['image'].'">';
                echo $viewPost['body'];
          ?>
        <div class="filedunder">
          <p>Filed under:</p>
          <ol class="tagbox">
            <?php
            while($postTagsRow = mysqli_fetch_assoc($postTagsAnswer)) {
              echo '<a href="viewtag.php?'.$postTagsRow['id'].'"><li>'.$postTagsRow['name'].'</li></a>';
            }
            ?>
          </ol>
        </div>
          <div class="pubdatebox">
            <?php echo '<p class="pubdate">Published '.$viewPost['date'].'</p>' ?>
          </div>
        </div>
      </div>
    <?php require_once('includes/sidebar.php')?>
  </body>
