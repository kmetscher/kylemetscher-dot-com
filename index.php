<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Kyle Metscher</title>
    <link href="styles/dotcom.css?" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@500&display=swap" rel="stylesheet">
  </head>

  <body>

    <?php require_once('includes/headernav.php')?>
    <?php require_once('includes/connect.php')?>

    <?php // Get test post
    $query = "SELECT title, slug, image, date FROM blog_posts WHERE id=4";
    $answer = $conn->query($query);
    $row = mysqli_fetch_assoc($answer);
    ?>

    <div class="container">
      <div class="main">
          <?php
        echo '<div class="post">';
          echo '<a class="headline" href="#">'.$row['title'].'</a>';
          echo '<div class="postpreview">';
            echo '<a href="#"><img class="featured" src="'.$row['image'].'"></a>';
            echo '<p class="postslug">'.$row['slug'].'</p>';
          echo '</div>';
          ?>

          <?php // Use a left join on tags and post_tags table to create an array
                // of IDs to be linked to and tag names to get displayed in tagbox
          $tagNames = array(); // for people
          $tagIDs = array(); // for machines
          $tagQuery = "SELECT tags.* FROM post_tags LEFT JOIN (tags) ON (post_tags.tag_id = tags.id) WHERE post_tags.post_id=4 ORDER BY name ASC";
          $tagAnswer = $conn->query($tagQuery);
          while($tagRow = mysqli_fetch_assoc($tagAnswer)) {
            array_push($tagNames, $tagRow['name']);
            array_push($tagIDs,   $tagRow['id']);
          }
          $numTags = count($tagIDs); // there has really got to be a better way to do this shit
          ?>

          <?php
          echo '<div class="filedunder">';
            echo '<p>Filed under:</p>';
            echo '<ol class="tagbox">'; ?>

              <?php // use the number of tags in a post to index a for loop, matching tag IDs to their names
              for ($i=0; $i < $numTags; $i++) { // there has to be a better way to do this. i and j loop?
                echo '<a href="viewtag.php?'.$tagIDs[$i].'"><li>'.$tagNames[$i].'</li></a>';
              }
              ?>

              <?php
            echo '</ol>';
          echo '</div>';
          echo '<div class="pubdatebox">';
            echo '<p class="pubdate">Published April 20, 1969</p>';
          echo '</div>';
        echo '</div>';
        ?>

      </div>

    <?php require_once('includes/sidebar.php')?>

  </body>
