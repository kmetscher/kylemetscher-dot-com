<?php
// hacker voice: i'm in
require_once('includes/connect.php')

// Much of what's on here is going to broken up into functions that can be called
// the scripts folder. For now, however, enjoy this plate of spaghetti

// Grab ten (or fewer) most recent posts
$query = "SELECT id, title, slug, image, date, language FROM blog_posts ORDER BY id DESC LIMIT 10";
$answer = $conn->query($query);

// make sure that shit ain't empty
if ($answer->mysqli_num_rows() > 0) {
  while($row = $answer->mysqli_fetch_assoc()) {
    // echo each retrieved post back
    echo '<div class="post">';
    // echoes viewpost link into the headline anchor href and title into anchor display field
      echo '<a class="headline" href="viewpost.php?id='.$row['id'].'">'.$row['title'].'</a>';
      echo '<div class="postpreview">';
      // echoes viewpost link into image anchor and featured image link into img src
        echo '<a href="viewpost.php?id='.$row['id'].'"><img class="featured" src="'.$row['image'].'"></a>';
        // echoes slugline into slug paragraph
        echo '<p class="postslug">'.$row['slug'].'</p>';
      echo '</div>';
      // it's about to get a little janky
      echo '<div class="filedunder">';
      // using current post's id as key, grab its tags from post_tags table,
      // then left join tag ids with their actual names, and finally order the
      // returned tags alphabetically
      $tagquery = "SELECT tags.* FROM post_tags LEFT JOIN (tags) ON (post_tags.tag_id = tags.id) WHERE post_tags.post_id = " . $row['id'] . "ORDER BY name ASC";
      $taganswer = $conn->query($tagquery);
        echo '<p>Filed under:</p>';
        // okay now real janky!
        echo '<ol class="tagbox">';
        // make sure that shit ain't empty
        if ($taganswer->mysqli_num_rows() > 0) {
          while ($tagrow = $taganswer->mysqli_fetch_assoc()) {
            // echo each retrieved tag back as a list item with viewtag link in
            // anchor href and name of the tag in text field
            echo '<li><a href="viewtag.php?='.$tagrow['id'].'">'.$tagrow['name'].'</a></li>';
          }
        }
        echo '</ol>';
      echo '</div>';
      echo '<div class="pubdatebox">';
      // echo the publish date; for now just using the SQL format
        echo '<p class="pubdate">Published '.$row['date']'</p>';
      echo '</div>';
    echo '</div>';
  }
}
?>
