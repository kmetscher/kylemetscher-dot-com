<!DOCTYPE html>
<html>
  <head>
    <?php require_once('includes/connect.php');
          require_once('includes/headernav.php');
          $viewTagID = htmlspecialchars($_SERVER['QUERY_STRING']);
          // grab all post IDs that match the tag ID in query string
          $stmtPosts = $conn->prepare("SELECT post_id FROM post_tags WHERE tag_id=? ORDER BY post_id DESC");
          $stmtPosts->bind_param("i", $viewTagID);
          $stmtPosts->execute();
          $viewTagAnswer = $stmtPosts->get_result();
          // get the tag's name to display in title and header
          $stmtTag = $conn->prepare("SELECT name FROM tags WHERE id=$viewTagID");
          $stmtTag->bind_param("i", $viewTagID);
          $stmtTag->execute();
          $tagAnswer = $stmtTag->get_result();
          $tagName = $tagAnswer->fetch_assoc();

          echo '<title>Filed under "'.$tagName['name'].'" | Kyle Metscher</title>';
          $stmtTag->close();
    ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link href="styles/dotcom.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@500&display=swap" rel="stylesheet">
  </head>

  <body>
    <div class="container">
      <div class="main">
        <?php echo '<h2 id="tagline">Filed under "'.$tagName['name'].'"</h2>'; ?>
          <?php
          // row by row, post IDs
          while($viewTagRow = $viewTagAnswer->fetch_assoc()) {
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
                $postDate = $postRow['date'];
                $unixDate = strtotime($postDate);
                $formattedDate = date('j F Y', $unixDate);
                  echo '<p class="pubdate">Published '.$formattedDate.'</p>';
                echo '</div>';
              echo '</div>';
            }
           }
        ?>

      </div>

    <?php require_once('includes/sidebar.php');
    $stmtPosts->close();
    ?>

  </body>
