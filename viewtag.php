<!DOCTYPE html>
<html>
  <head>
    <?php require_once('includes/connect.php');
          require_once('includes/headernav.php');
          $viewTagID = htmlspecialchars($_SERVER['QUERY_STRING']);
          // select posts by ID from the post_tags table where their tag ID matches
          $viewTagQuery = "SELECT post_id FROM post_tags WHERE tag_id=$viewTagID ORDER BY post_id DESC";
          $viewTagAnswer = $conn->query($viewTagQuery);
          // get the name of the tag for the title
          $tagNameQuery = "SELECT name FROM tags WHERE id=$viewTagID";
          $tagNameAnswer = $conn->query($tagNameQuery);
          $tagName = mysqli_fetch_assoc($tagNameAnswer);
          echo '<title>Filed under '.$tagName['name'].' | Kyle Metscher</title>';
    ?>
    <meta charset="utf-8">
    <link href="styles/dotcom.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@500&display=swap" rel="stylesheet">
  </head>

  <body>
    <div class="container">
      <div class="main">
        <?php echo '<h2 id="tagline">Filed under "'.$tagName['name'].'"</h2>'; ?>
          <?php
          // row by row, post IDs
          while($viewTagRow = mysqli_fetch_assoc($viewTagAnswer)) {
            $currentID = $viewTagRow['post_id']; // lazy
            // get the post's preview info via its ID
            $postsQuery = "SELECT title, slug, image, date FROM blog_posts WHERE id=$currentID";
            $postsAnswer = $conn->query($postsQuery);
            while($postRow = mysqli_fetch_assoc($postsAnswer)) { // for each row fetched, echo out a post div with the values in that row

              echo '<div class="post">';
                echo '<a class="headline" href="viewpost.php?'.$currentID.'">'.$postRow['title'].'</a>';
                echo '<div class="postpreview">';
                  echo '<a href="viewpost.php?'.$currentID.'"><img class="featured" src="'.$postRow['image'].'"></a>';
                  echo '<p class="postslug">'.$postRow['slug'].'</p>';
                echo '</div>';

                echo '<div class="filedunder">';
                  echo '<p>Filed under:</p>';
                  echo '<ol class="tagbox">';

                  // fetch tags via left join on post_tags and tags tables with passed post ID
                  $tagQuery = "SELECT tags.* FROM post_tags LEFT JOIN (tags) ON (post_tags.tag_id = tags.id) WHERE post_tags.post_id=$currentID ORDER BY name ASC";
                  $tagAnswer = $conn->query($tagQuery);

                  while($tagRow = mysqli_fetch_assoc($tagAnswer)) {
                    echo '<a href="viewtag.php?'.$tagRow['id'].'"><li>'.$tagRow['name'].'</li></a>';
                  }
                  echo '</ol>';
                echo '</div>';
                echo '<div class="pubdatebox">';
                  echo '<p class="pubdate">Published '.$postRow['date'].'</p>';
                echo '</div>';
              echo '</div>';
            }
           }
        ?>

      </div>

    <?php require_once('includes/sidebar.php')?>

  </body>