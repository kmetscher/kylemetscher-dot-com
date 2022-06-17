<!DOCTYPE html>
<head>
  <title>Image upload | Gutenberg</title>
  <?php require_once('../includes/connect.php'); ?>
</head>
<body>
  <h1>Image upload</h1>
  <form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <label for="upload">Select image:</label><br>
    <input type="file" id="upload" name="upload" required><br>
    <input type="submit" value="Submit">
  </form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $imageDir = $_SERVER['DOCUMENT_ROOT'] . '/images/';
  $imageName = $imageDir . basename($_FILES['upload']['name']);
  $tempName = $_FILES['upload']['tmp_name'];
  echo "<br><p>Stored temp $tempName</p>";
  if (move_uploaded_file($_FILES['upload']['tmp_name'], $imageName)) {
    echo "<br><p>Success: $imageName</p>";
  }
  else {
    echo "<br>";
    print_r($_FILES);
  }
  $fopenDir = $_SERVER['DOCUMENT_ROOT'] . '/trash/about.html';
  if (fopen($fopenDir, 'x')) {
    echo "<br><p>Fopen works</p>";
  }
}

?>
</body>
