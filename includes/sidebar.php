<?php require_once('includes/connect.php') ?>

<?php  // fetch all tags in the tags table in alphabetical order
$sideTagsQuery = "SELECT * FROM tags ORDER BY name ASC";
$sideTagsAnswer = $conn->query($sideTagsQuery);
?>

<?php  // fetch all pubdates in the blog_posts table by recency
$archiveQuery = "SELECT date FROM blog_posts ORDER BY date DESC";
$archiveAnswer = $conn->query($archiveQuery);
?>

<?php
echo '<div class="sidebar">';
    echo '<a href="viewalltags.php"><h3>Tags</h3></a>';
    echo '<div class="tags">';
      echo '<ol class="tags">';

      // echo an anchor for each row returned by associative fetch
      while($sideTagsRow = mysqli_fetch_assoc($sideTagsAnswer)) {
        echo '<a href="viewtag.php?'.$sideTagsRow['id'].'"><li>'.$sideTagsRow['name'].'</li></a>';
      } // nigh identical to post preview filedunder

      echo '</ol>';
    echo '</div>';
    echo '<h3><a href="#">Archives</a></h3>';
    echo '<div class="archives">';
      echo '<ol class="archives">';
      echo '</ol>';
    echo '</div>';
    echo '<h3>Language</h3>';
    echo '<div class="languages">';
      echo '<ul class="languages">';
        echo '<li><a href="#">English</a></li>';
        echo '<li><a href="#">Magyar</a></li>';
        echo '<li><a href="#">Deutsch</a></li>';
      echo '</ul>';
    echo '</div>';
  echo '</div>';
?>
