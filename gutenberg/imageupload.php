<!DOCTYPE html>
<head>
  <title>Image upload | Kyle Metscher</title>
  <?php require_once('../includes/connect.php'); ?>
</head>
<body>
  <h1>Image upload</h1>
  <form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <label for="upload">Select files:</label>
    <input type="file" id="upload" name="upload" required><br>
    <input type="submit">Submit</input>
  </form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

}

?>
</body>
