<!DOCTYPE html>
<html>
  <head>
    <script src="scripts/darkmode.js"></script>
    <?php require_once('includes/connect.php');
          require_once('includes/headernav.php');
          require_once('scripts/scripts.php');
          $viewDate = htmlspecialchars($_SERVER['QUERY_STRING']); // date to grab posts fetched from query string
          $viewYear = substr($viewDate, 0, 4); // YYYY
          $viewMonth = substr($viewDate, 4, 2); // MM
          // select posts by date from the post_tags table where YYYY-MM-** matches
          // Prepared to sanitize since from user input
          $stmtDate = $conn->prepare("SELECT id FROM blog_posts WHERE YEAR(date)=? AND MONTH(date) =? ORDER BY id DESC");
          $stmtDate->bind_param('ii', $viewYear, $viewMonth);
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
          displayPostPreviewByID($currentID, $conn);
         }
      ?>
      </div>
      <?php require_once('includes/sidebar.php');
      $stmtDate->close();?>
    </div>
  </body>
