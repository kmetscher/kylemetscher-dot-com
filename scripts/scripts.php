<?php
function monthName($month) {
  switch($month) {
    case 1:
      return "Jan"; break;
    case 2:
      return "Feb"; break;
    case 3:
      return "Mar"; break;
    case 4:
      return "Apr"; break;
    case 5:
      return "May"; break;
    case 6:
      return "Jun"; break;
    case 7:
      return "Jul"; break;
    case 8:
      return "Aug"; break;
    case 9:
      return "Sep"; break;
    case 10:
      return "Oct"; break;
    case 11:
      return "Nov"; break;
    case 12:
      return "Dec"; break;
  }
}

function archiveDate($year, $month) {
  $formattedMonth = monthName($month);
  $formattedDate = "$formattedMonth $year";
  $dateLink = 'viewdate.php?'.$year.''.$month.'';
  echo '<li><a href="'.$dateLink.'">'.$formattedDate.'</a></li>';
}

function linkDate($year, $month) {
  echo "$year$month";
}

function displayPostPreviewByID($postID, $mysql) {
  $previewQuery = 'SELECT title, slug, image, date, language FROM blog_posts WHERE id=?';
  $stmtPreview = $mysql->prepare($previewQuery);
  $stmtPreview->bind_param('i', $postID); $stmtPreview->execute();
  $previewAnswer = $stmtPreview->get_result();
  while($row = $previewAnswer->fetch_assoc()) { // for each row fetched, echo out a post div with the values in that row
    echo '<div class="post">';
      echo '<a class="headline" href="viewpost.php?'.$postID.'">'.$row['title'].'</a>';
      echo '<div class="postpreview">';
        echo '<a href="viewpost.php?'.$postID.'"><img class="featured" src="'.$row['image'].'"></a>';
        echo '<p class="postslug">'.$row['slug'].'</p>';
      echo '</div>';
      echo '<div class="filedunder">';
        echo '<p id="tagboxunder">Filed under:</p>';
        echo '<ol class="tagbox">';
        // fetch tags via left join on post_tags and tags tables with passed post ID
        $tagQuery = "SELECT tags.* FROM post_tags LEFT JOIN (tags) ON (post_tags.tag_id = tags.id) WHERE post_tags.post_id=? ORDER BY name ASC";
        $stmtTag = $mysql->prepare($tagQuery);
        $stmtTag->bind_param('i', $postID); $stmtTag->execute();
        $tagAnswer = $stmtTag->get_result();
        while($tagRow = $tagAnswer->fetch_assoc()) {
          echo '<a href="viewtag.php?'.$tagRow['id'].'"><li>'.$tagRow['name'].'</li></a>';
        }
        echo '</ol>';
      echo '</div>';
      echo '<div class="pubdatebox">';
      $postDate = $row['date'];
      $unixDate = strtotime($postDate);
      $formattedDate = date('j F Y', $unixDate);
        echo '<p class="pubdate">Published '.$formattedDate.'</p>';
      echo '</div>';
    echo '</div>';
  }
}

function displayIndexPosts($mysql) {
  $allPostsQuery = "SELECT id FROM blog_posts ORDER BY id DESC LIMIT 10";
  $stmtAllPosts = $mysql->prepare($allPostsQuery); $stmtAllPosts->execute();
  $allPostsAnswer = $stmtAllPosts->get_result();
  while ($row = $allPostsAnswer->fetch_assoc()) {
    $currentID = $row['id'];
    displayPostPreviewByID($currentID, $mysql);
  }
}
?>
