<!DOCTYPE html>
<html>
  <head>
    <script src="scripts/darkmode.js"></script>
    <script src="scripts/language.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link href="styles/dotcom.css?" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@500&display=swap" rel="stylesheet">
    <?php require_once('includes/connect.php')?>
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
    <?php $langQuery = "SELECT id, title, slug, image, date FROM blog_posts WHERE language=? ORDER BY id DESC";
    $stmtLang = $conn->prepare($langQuery);
    $stmtLang->bind_param("s", $viewLang);
    $stmtLang->execute();
    $postsAnswer = $stmtLang->get_result();
    ?>

    <?php require_once('includes/headernav.php')?>

    <div class="container">
      <div class="main">
        <?php echo '<h2 id="tagline">'.$postsLang.'</h2>'; ?>

          <?php while($postRow = $postsAnswer->fetch_assoc()) {
            $crutchID = $postRow['id'];
            $postDate = $postRow['date'];
            $unixDate = strtotime($postDate);
            $formattedDate = date('j F Y', $unixDate);

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
