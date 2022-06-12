<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>All tags | Kyle Metscher</title>
    <link href="styles/viewalltags.css?" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@500&display=swap" rel="stylesheet">
  </head>
  <body>
    <?php require_once('includes/headernav.php');
          require_once('includes/connect.php');
          $viewAllTagsQuery = "SELECT * FROM tags ORDER BY name ASC";
          $viewAllTagsAnswer = $conn->query($viewAllTagsQuery);
    ?>
    <div class="container">
      <div class="main">
        <h2>All tags</h2>
        <div id="taglist">
          <ol>
            <?php while($viewAllTagsRow = mysqli_fetch_assoc($viewAllTagsAnswer)) {
                  echo '<li><a href="viewtag.php?'.$viewAllTagsRow['id'].'">'.$viewAllTagsRow['name'].'</a></li>';
            } ?>
          </ol>
        </div>
      </div>
    <?php require_once('includes/sidebar.php')?>
  </body>
