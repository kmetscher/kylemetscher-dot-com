<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta property="og:image" content="https://kylemetscher.com/images/bonneville.jpg"/>
    <meta property="og:description" content="Kyle Metscher is on the internet."/>
    <title>Kyle Metscher</title>
    <link href="styles/dotcom.css?" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@500&display=swap" rel="stylesheet">
  </head>

  <body>

    <?php require_once('includes/headernav.php')?>
    <?php require_once('includes/connect.php')?>

    <div class="container">
      <div class="main">

          <?php // Fetch the last ten posts based on id
          $postsQuery = "SELECT id, title, slug, image, date FROM blog_posts ORDER BY id DESC";
          $postsAnswer = $conn->query($postsQuery); ?>

          <?php while($postRow = mysqli_fetch_assoc($postsAnswer)) { // for each row fetched, echo out a post div with the values in that row
            $crutchID = $postRow['id']; // i don't feel like preparing statements right now, see tag query
            $postDate = $postRow['date']; // even lazier, see pubdate
            $unixDate = strtotime($postDate);
            $formattedDate = date('j F Y', $unixDate); // i am doing this for a reason i promise

            echo '<div class="post">';
              echo '<a class="headline" href="viewpost.php?'.$postRow['id'].'">'.$postRow['title'].'</a>';
              echo '<div class="postpreview">';
                echo '<a href="viewpost.php?'.$postRow['id'].'"><img class="featured" src="'.$postRow['image'].'"></a>';
                echo '<p class="postslug">'.$postRow['slug'].'</p>';
              echo '</div>';

              echo '<div class="filedunder">';
                echo '<p>Filed under:</p>';
                echo '<ol class="tagbox">';

                // fetch tags via left join on post_tags and tags tables with passed post ID
                $tagQuery = "SELECT tags.* FROM post_tags LEFT JOIN (tags) ON (post_tags.tag_id = tags.id) WHERE post_tags.post_id=$crutchID ORDER BY name ASC";
                $tagAnswer = $conn->query($tagQuery);

                while($tagRow = mysqli_fetch_assoc($tagAnswer)) {
                  echo '<a href="viewtag.php?'.$tagRow['id'].'"><li>'.$tagRow['name'].'</li></a>';
                }
                echo '</ol>';
              echo '</div>';
              echo '<div class="pubdatebox">';
                echo '<p class="pubdate">Published '.$formattedDate.'</p>';
              echo '</div>';
            echo '</div>';

         }
        ?>

      </div>

    <?php require_once('includes/sidebar.php')?>

  </body>
