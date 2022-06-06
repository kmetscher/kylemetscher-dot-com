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
    <?php $query = "SELECT title, slug, image, date FROM blog_posts WHERE id=1";
    $answer = $conn->query($query);
    $row = mysqli_fetch_assoc($answer); ?>

    <div class="container">
      <div class="main">
          <?php
        echo '<div class="post">';
          echo '<a class="headline" href="#">'.$row['title'].'</a>';
          echo '<div class="postpreview">';
            echo '<a href="#"><img class="featured" src="'.$row['image'].'"></a>';
            echo '<p class="postslug">'.$row['slug'].'</p>';
          echo '</div>';
          echo '<div class="filedunder">';
            echo '<p>Filed under:</p>';
            echo '<ol class="tagbox">';
              echo '<li><a href="#">Damu Roland</a></li>
                    <li><a href="#">cigányok</a></li>
                    <li><a href="#">marhapörkölt</a></li>
                    <li><a href="#">főzni</a></li>
                    <li><a href="#">callout</a></li>
                    <li><a href="#">reddit</a></li>';
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
