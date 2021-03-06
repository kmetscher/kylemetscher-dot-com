<!DOCTYPE html>
<html>
  <head>
    <script src="scripts/darkmode.js"></script>
    <script src="scripts/language.js"></script>
    <?php require_once('includes/connect.php');
          require_once('includes/headernav.php');
          $viewPostID = htmlspecialchars($_SERVER['QUERY_STRING']);
          // select post with matching ID
          $stmtView = $conn->prepare("SELECT title, slug, body, image, date, language FROM blog_posts WHERE id=?");
          $stmtView->bind_param("i", $viewPostID);
          $stmtView->execute();
          $viewPostAnswer = $stmtView->get_result();
          $viewPost = $viewPostAnswer->fetch_assoc();
          // and grab its tags
          $stmtTags = $conn->prepare("SELECT tags.* FROM post_tags LEFT JOIN (tags) ON (post_tags.tag_id = tags.id) WHERE post_tags.post_id=? ORDER BY name ASC");
          $stmtTags->bind_param("i", $viewPostID);
          $stmtTags->execute();
          $postTagsAnswer = $stmtTags->get_result();
          $titlePost = $viewPost['title'];?>
          <title><?php echo strip_tags($titlePost);?> | Kyle Metscher</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta property="og:image:secure_url" content="https://kylemetscher.com/<?php echo $viewPost['image'];?>"/>
    <meta property="og:image" content="https://kylemetscher.com/<?php echo $viewPost['image'];?>"/>
    <meta property="og:description" content="<?php echo $viewPost['slug'];?>"/>
    <link href="styles/viewpost.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@500&display=swap" rel="stylesheet">
  </head>

  <body>
    <div class="container">
      <div class="main">
        <div class="blogpost">
          <?php echo '<h2>'.$viewPost['title'].'</h2>';
                echo '<img class="blogpost" src="'.$viewPost['image'].'">';
                echo "{$viewPost['body']}";
          ?>
        <div class="filedunder">
          <p id="tagboxunder">Filed under:</p>
          <ol class="tagbox">
            <?php
            while($postTagsRow = $postTagsAnswer->fetch_assoc()) {
              echo '<a href="viewtag.php?'.$postTagsRow['id'].'"><li>'.$postTagsRow['name'].'</li></a>';
            }
            ?>
          </ol>
        </div>
          <div class="pubdatebox">
            <?php
            $postDate = $viewPost['date'];
            $unixDate = strtotime($postDate);
            $formattedDate = date('j F Y', $unixDate);
            echo '<p class="pubdate">Published '.$formattedDate.'</p>'
            ?>
          </div>
        </div>
      </div>
    <?php require_once('includes/sidebar.php')?>
  </body>
