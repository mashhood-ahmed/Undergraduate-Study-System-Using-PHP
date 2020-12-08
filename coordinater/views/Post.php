<?php

require_once("./Database.php");

class Post {

  private $title;
  private $desc;
  private $imgName;
  private $imgTmpName;

  public function __construct($title, $desc, $imgName, $imgTmpName) {

    $this->title = $title;
    $this->desc = $desc;
    $this->imgName = $imgName;
    $this->imgTmpName = $imgTmpName;

  }

  public function getTitle() {

    return $this->title;

  }

  public function getDesc() {

    return $this->desc;

  }

  public function getImgName() {

    return $this->imgName;

  }

  public function getTmpName() {

    return $this->imgTmpName;

  }

  public static function viewPosts() {
    return Database::getPosts();
  }

  public static function DeleteOnId($id) {
    $result = Database::deletePost($id);
    if($result) {
      echo "<script>alert('Record is successfully deleted')</script>";
      echo "<script>open('index.php?home', '_self')</script>";
    }
  }

}

if(isset($_POST['time'])) {

    $title = trim( htmlspecialchars( $_POST['pTitle'] ) );
    $desc = trim( htmlspecialchars( $_POST['post'] ) );

  if(!isset($_FILES['f']['name']) ) {

    $imageName = null;
    $imageTmpName = null;

  } else {

    $imageName = $_FILES['f']['name'];
    $imageTmpName = $_FILES['f']['tmp_name'];

  }

  $post = new Post($title, $desc, $imageName, $imageTmpName);

  $result = Database::uploadPost($post);

  if($result) {

    echo "<script>alert('New record created successfully')</script>";
    echo "<script>open('./index.php?uploadPost', '_self')</script>";

  } else {

    echo "<script>alert('Error')</script>";
    echo "<script>open('./index.php?uploadPost', '_self')</script>";
  }

}



 ?>
