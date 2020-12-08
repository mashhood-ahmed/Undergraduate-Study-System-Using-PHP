<?php

require_once("./Database.php");

class Course {

  private $c_title;
  private $c_code;
  private $c_credit;

  public function __construct($title, $code, $credit) {

    $this->c_title = $title;
    $this->c_code = $code;
    $this->c_credit = $credit;

  }

  public function getTitle() {
    return $this->c_title;
  }

  public function getCode() {
    return $this->c_code;
  }

  public function getCredit() {
    return $this->c_credit;
  }

  public static function allCourses() {
    return Database::getCourses();
  }

  public static function getCourse($id) {
    return Database::getCourseOnId($id);
  }

  public static function DeleteOnId($id) {
    $result = Database::deleteCourse($id);
    if($result) {
      echo "<script>alert('Record is successfully deleted')</script>";
      echo "<script>open('./index.php?viewCourses', '_self')</script>";
    }
  }

}

if(isset($_POST['sub'])) {

  $courseTitle = $_POST['title'];
  $courseCode = $_POST['code'];
  $courseCredit = $_POST['credit'];

  $course = new Course($courseTitle, $courseCode, $courseCredit);

  if($_POST['update_signal'] == "Set") {
    $courseId = $_POST['update_id'];
    $result = Database::updateCourse($course, $courseId);
  } else {
    $result = Database::uploadCourse($course);
   }

  if($result) {

    echo "<script>alert('Operation performed successfully..')</script>";
    echo "<script>open('./index.php?viewCourses', '_self')</script>";

  } else {

    echo "<script>alert('Error')</script>";
    echo "<script>open('./index.php?addCourse', '_self')</script>";
  }


}

 ?>
