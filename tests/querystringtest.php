<?php
$querystring = $_SERVER['QUERY_STRING'][0];
if isdigit($querystring) {
  $greeting = "howdy";
  } else {
  $greeting = "bitch";
}
?>
<!DOCTYPE html>
<head>
  <body>
    <?php echo $greeting; ?>
  </body>
</head>
