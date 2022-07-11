<!DOCTYPE html>
<html>
  <head>
    <script src="scripts/darkmode.js"></script>
    <script src="scripts/language.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta property="og:image" content="https://kylemetscher.com/images/bonneville.jpg"/>
    <meta property="og:description" content="Kyle Metscher is on the internet."/>
    <title>Kyle Metscher</title>
    <link href="styles/dotcom.css?" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@500&display=swap" rel="stylesheet">
  </head>

  <body>

    <?php require_once('includes/headernav.php');
    require_once('includes/connect.php');
    require_once('scripts/scripts.php'); ?>

    <div class="container">
      <div class="main">

          <?php displayIndexPosts($conn); ?>

      </div>

    <?php require_once('includes/sidebar.php')?>
  </body>
</html>
