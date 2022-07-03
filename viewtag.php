<!DOCTYPE html>
<html>
  <head>
    <script src="scripts/darkmode.js"></script>
    <script src="scripts/language.js"></script>
    <?php require_once('includes/connect.php');
          require_once('includes/headernav.php');
          require_once('scripts/scripts.php');
          $viewTagID = htmlspecialchars($_SERVER['QUERY_STRING']);
          // grab all post IDs that match the tag ID in query string
          $stmtPosts = $conn->prepare("SELECT post_id FROM post_tags WHERE tag_id=? ORDER BY post_id DESC");
          $stmtPosts->bind_param("i", $viewTagID);
          $stmtPosts->execute();
          $viewTagAnswer = $stmtPosts->get_result();
          $stmtPosts->close();
          // get the tag's name to display in title and header
          $stmtTag = $conn->prepare("SELECT name FROM tags WHERE id=?");
          $stmtTag->bind_param("i", $viewTagID);
          $stmtTag->execute();
          $tagAnswer = $stmtTag->get_result();
          $tagName = $tagAnswer->fetch_assoc();
          // echo tag name into a header
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
        <h2 id="tagline"><?php echo $tagName['name'];?></h2>
          <?php
          // row by row, post IDs
          while($viewTagRow = $viewTagAnswer->fetch_assoc()) {
            $currentID = $viewTagRow['post_id'];
            displayPostPreviewByID($currentID, $conn);
          }
        ?>

      </div>

    <?php require_once('includes/sidebar.php');?>

  </body>
</html>
