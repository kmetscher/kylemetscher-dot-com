<!DOCTYPE html>
<html>
  <head>
    <script src="scripts/darkmode.js"></script>
    <?php require_once('includes/connect.php');
          require_once('includes/headernav.php');
          $viewDate = htmlspecialchars($_SERVER['QUERY_STRING']);
          $viewDate = substr_replace($viewDate, '-', 4, 0); // stick a - in the date to match sql format
          // select posts by date from the post_tags table where YYYY-MM-** matches
          $stmtDate = $conn->prepare("SELECT id FROM blog_posts WHERE date LIKE '?%' ORDER BY id DESC");
          $stmtDate->bind_param($viewDate);
          $stmtDate->execute();
          $viewDateAnswer = $stmtDate->get_result();

          // $viewDateQuery = "SELECT id FROM blog_posts WHERE date LIKE '$viewDate%' ORDER BY id DESC";
          // $viewDateAnswer = $conn->query($viewDateQuery);
          echo '<title> | Kyle Metscher</title>';
    ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link href="styles/dotcom.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@500&display=swap" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <div class="main">
        <?php
        while($monthRow = $viewDateAnswer->fetch_assoc()) {
          $currentID = $monthRow['id'];
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
        ?>
      </div>
      <?php require_once('includes/sidebar.php')?>
    </div>
  </body>
