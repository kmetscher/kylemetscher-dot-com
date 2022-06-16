<?php require_once('includes/connect.php');
// fetch all tags in the tags table in alphabetical order
$sideTagsQuery = "SELECT * FROM tags ORDER BY name ASC";
$sideTagsAnswer = $conn->query($sideTagsQuery);
// fetch all pubdates in the blog_posts table by recency
$archiveQuery = "SELECT date FROM blog_posts ORDER BY date DESC";
$archiveAnswer = $conn->query($archiveQuery);
?>
<div class="sidebar">
  <h3>Brightness</h3>
  <label id="darkmode">
    <input type="checkbox" id="darkmodecheck">
    <span id="darkmodeswitch"></span>
  </label>
  <a href="viewalltags.php"><h3>Tags</h3></a>
  <div class="tags">
    <ol class="tags">
    <?php
    // echo an anchor for each row returned by associative fetch
    while($sideTagsRow = mysqli_fetch_assoc($sideTagsAnswer)) {
      echo '<a href="viewtag.php?'.$sideTagsRow['id'].'"><li>'.$sideTagsRow['name'].'</li></a>';
    } // nigh identical to post preview filedunder
      ?>
    </ol>
  </div>
  <h3><a href="#">Archives</a></h3>
  <div class="archives">
    <ol class="archives">
    </ol>
  </div>
  <h3>Language</h3>
  <div class="languages">
    <ul class="languages">
      <li><a href="viewlang.php?en">English</a></li>
      <li><a href="viewlang.php?hu">Magyar</a></li>
      <li><a href="viewlang.php?de">Deutsch</a></li>
    </ul>
  </div>
</div>
<script src="scripts/darkmode.js"></script>
