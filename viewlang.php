<!DOCTYPE html>
<html>
  <head>
    <script src="scripts/darkmode.js"></script>
    <script src="scripts/language.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link href="styles/dotcom.css?" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@500&display=swap" rel="stylesheet">
    <?php require_once('includes/connect.php');
          require_once('scripts/scripts.php');?>
    <?php $viewLang = htmlspecialchars($_SERVER['QUERY_STRING']);
      switch ($viewLang) {
      case "en":
      $postsLang = "Posts in English";
      break;
      case "de":
      $postsLang = "Beiträge auf Deutsch";
      break;
      case "hu":
      $postsLang = "Magyar nyelvű cikkek";
      break;
    }
    echo "<title>$postsLang | Kyle Metscher</title>";
    ?>

  </head>

  <body>
    <?php $langQuery = "SELECT id FROM blog_posts WHERE language=? ORDER BY id DESC";
    $stmtLang = $conn->prepare($langQuery);
    $stmtLang->bind_param("s", $viewLang);
    $stmtLang->execute();
    $postsAnswer = $stmtLang->get_result();
    ?>

    <?php require_once('includes/headernav.php')?>

    <div class="container">
      <div class="main">
        <?php echo '<h2 id="tagline">'.$postsLang.'</h2>';
        while($postRow = $postsAnswer->fetch_assoc()) {
          $currentID = $postRow['id'];
          displayPostPreviewByID($currentID, $conn);
        }
        ?>

      </div>

    <?php require_once('includes/sidebar.php');
    $stmtLang->close();?>

  </body>
