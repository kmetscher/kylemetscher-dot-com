<?php
class blogPost {
  public $postID
  public $postTitle
  public $postBody
  public $postSlug
  public $postImage
  public $postDate
  public $postTags[] = array();
  public $postTagIDs[] = array();
  public $postLanguage

  function __construct($id, $title, $body, $slug, $image, $date, $language) {
    // Sets blog post up with simple passed arguments
    this->$postID       = $id;
    this->$postTitle    = $title;
    this->$postBody     = $body;
    this->$postSlug     = $slug;
    this->$postImage    = $image;
    this->$postDate     = $date;
    this->$postLanguage = $language;
    // Creates arrays of tag names and IDs by querying tags and post_tags tables 
    $sql = "SELECT tags.* FROM post_tags LEFT JOIN (tags) ON (post_tags.tag_id = tags.id) WHERE post_tags.post_id = " . $id);
    $answer = mysqli_query($sql);

    if (mysqli_num_rows($answer) > 0) {
      while($row = mysqli_fetch_assoc($answer)) {
        array_push(this->$postTags,  $row["name"]);
        array_push(this->postTagIDs, $row["id"]);
      }
    }
  }
}
 ?>
