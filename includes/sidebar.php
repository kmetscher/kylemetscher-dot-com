<?php require_once('connect.php');
      require_once('scripts/scripts.php');
// fetch all tags in the tags table in alphabetical order
$sideTagsQuery = "SELECT * FROM tags ORDER BY name ASC";
$stmtSideTags = $conn->prepare($sideTagsQuery); $stmtSideTags->execute();
$sideTagsAnswer = $stmtSideTags->get_result();
// fetch all pubdates in the blog_posts table by recency
$archiveQuery = "SELECT DISTINCT YEAR(date), MONTH(date) FROM blog_posts ORDER BY YEAR(date) DESC";
$stmtArchive = $conn->prepare($archiveQuery); $stmtArchive->execute();
$archiveAnswer = $stmtArchive->get_result();
?>

<div class="sidebar">
  <h3 id="brightness">Brightness</h3>
  <label id="darkmode">
    <input type="checkbox" id="darkmodecheck">
    <span id="darkmodeswitch"></span>
  </label>
  <a href="viewalltags.php"><h3 id="sidebartags">Tags</h3></a>
  <div class="tags">
    <ol class="tags">
    <?php
    // echo an anchor for each row returned by associative fetch
    while($sideTagsRow = $sideTagsAnswer->fetch_assoc()) {
      echo '<a href="viewtag.php?'.$sideTagsRow['id'].'"><li>'.$sideTagsRow['name'].'</li></a>';
    } // nigh identical to post preview filedunder
      ?>
    </ol>
  </div>
  <h3 id="archives"><a href="#">Archives</a></h3>
  <div class="archives">
    <ol class="archives">
      <?php
      // echo an anchor for reach month-year tuple
      while($sideArchiveRow = $archiveAnswer->fetch_assoc()) {
        $currYear = $sideArchiveRow['YEAR(date)'];
        $currMonth = $sideArchiveRow['MONTH(date)'];
        archiveDate($currYear, $currMonth);
      }
      ?>
    </ol>
  </div>
  <h3 id="sidebarlanguages">Language</h3>
  <div class="languages">
    <ul class="languages">
      <li><a href="#" id="en">English</a></li>
      <li><a href="#" id="hu">Magyar</a></li>
      <li><a href="#" id="de">Deutsch</a></li>
    </ul>
  </div>
</div>
