<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <?php echo '<title>'.$row['postTitle']. '| Kyle Metscher</title>';?>
    <link href="styles/about.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@500&display=swap" rel="stylesheet">
  </head>

  <body>
    <?php require_once('includes/headernav.php')?>
    <div class="container">
      <div class="main">
        <?php require_once('includes/postbody.php')?>
      </div>
    <?php require_once('includes/sidebar.php')?>
  </body>
