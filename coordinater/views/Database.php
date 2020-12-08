<?php

define("HOSTNAME", "localhost");
define("USERNAME", "root");
define("PASSWORD", "");
define("DBNAME", "accounts");

class Database {

  public static function connect() {
    try {
      //return new mysqli(HOSTNAME, USERNAME, PASSWORD, DBNAME);
      $conn = new PDO("mysql:host=".HOSTNAME.";dbname=".DBNAME, USERNAME, PASSWORD);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $conn;

    } catch(PDOException $e) {
      echo $e->getMessage();
    }
  }

  public static function uploadStudent(Student $student) {

    $conn = self::connect();

    $fname = $student->getFirstName();
    $lname = $student->getLastName();
    $reg = $student->getRegistration();
    $email = $student->getEmail();
    $pass = $student->getPassword();
    $gender = $student->getGender();
    $dept = $student->getDepartment();

    // $query = "INSERT INTO `student`(`firstName`, `lastName`, `regNo`, `email`, `password`,`dept`, `gender`)
    //                  VALUES
    //                  ('$fname','$lname','$reg','$email','$pass','$dept','$gender')";


    $query = "
          INSERT INTO student
          SET
          firstName = :fname
          lastName = :lname
          regNo = :reg
          email = :email
          password = :pass
          gender = :gender
    ";

    $stmt = $conn->prepare("INSERT INTO `student`(`firstName`, `lastName`, `regNo`, `email`, `password`, `dept`, `gender`)
                     VALUES
                     (?, ?, ?, ?, ?, ?, ?)");

    $stmt->bindValue(1, $fname);
    $stmt->bindValue(2, $lname);
    $stmt->bindValue(3, $reg);
    $stmt->bindValue(4, $email);
    $stmt->bindValue(5, $pass);
    $stmt->bindValue(6, $dept);
    $stmt->bindValue(7, $gender);

    $run = $stmt->execute();
    // $conn->close();

    if($run) {

      return true;
    }
    return false;
  }

  public static function uploadFaculty(Faculty $faculty) {

    $fname = $faculty->getFirstName();
    $lname = $faculty->getLastName();
    $email = $faculty->getEmail();
    $pass = $faculty->getPassword();
    $gender = $faculty->getGender();
    $dept = $faculty->getDepartment();

    $conn = self::connect();

    // $query = "INSERT INTO `faculty`(`firstName`, `lastName`, `email`, `password`, `dept`, `gender`)
    //           VALUES
    //           ('$fname','$lname','$email','$pass','$dept','$gender')" ;

    $stmt = $conn->prepare("INSERT INTO `faculty`(`firstName`, `lastName`, `email`, `password`, `dept`, `gender`)
                     VALUES
                     (?, ?, ?, ?, ?, ?)");


    $stmt->bindValue(1, $fname);
    $stmt->bindValue(2, $lname);
    $stmt->bindValue(3, $email);
    $stmt->bindValue(4, $pass);
    $stmt->bindValue(5, $dept);
    $stmt->bindValue(6,$gender);

    $run = $stmt->execute();
  //  $conn->close();

    if($run===true) {
      return true;
    }
    return false;

  }

  public static function uploadPost(Post $post) {

    $conn = self::connect();

    $title = $post->getTitle();
    $desc = $post->getDesc();
    $imgName = $post->getImgName();
    $tmpName = $post->getTmpName();

    if($imgName)
      move_uploaded_file($tmpName, "../../images/$imgName");

    //$query = "INSERT INTO `timetable`(`title`, `description`, `tt`) VALUES ('$title','$desc','$imgName')";
    $stmt = $conn->prepare("INSERT INTO `timetable`(`title`, `description`, `tt`)
                            VALUES (?, ?, ?)");

    $stmt->bindParam(1, $title);
    $stmt->bindParam(2, $desc);
    $stmt->bindParam(3, $imgName);

    $run = $stmt->execute();
    // $conn->close();

    if($run) {

        return true;
    }
    return false;
  }

  public static function uploadCourse(Course $course) {

    $title = $course->getTitle();
    $code = $course->getCode();
    $credit = $course->getCredit();

    $conn = self::connect();

    // $query = "INSERT INTO `offered`(`title`, `code`, `credit`)
    //           VALUES
    //           ('$title','$code','$credit')" ;
    $stmt = $conn->prepare("INSERT INTO `offered`(`title`, `code`, `credit`)
                            VALUES (?, ?, ?)");

    $stmt->bindValue(1, $title);
    $stmt->bindValue(2, $code);
    $stmt->bindValue(3, $credit);

    $run = $stmt->execute();
    // $conn->close();

    if($run===true) {
      return true;
    }
    return false;

  }

  public static function getStudents() {

    $conn = self::connect();
    // $query = "SELECT * FROM student";
    $stmt = $conn->prepare("SELECT * FROM student");
    $run = $stmt->execute();

  //  $conn->close();

    if($run) {
      if($stmt->rowCount() > 0)
        return $stmt;
      else
        return false;
    } else {
      throw new Exception("Something Went Wrong");
    }

  }

  public static function getFaculty() {

    $conn = self::connect();
    // $query = "SELECT * FROM faculty";
    $stmt = $conn->prepare("SELECT * FROM faculty");
    $run = $stmt->execute();

    // $conn->close();

    if($run) {
      if($stmt->rowCount() > 0)
        return $stmt;
      else
        return false;
    } else {
      throw new Exception("Something Went Wrong");
    }

  }

  public static function deleteStudent($id) {

    $conn = self::connect();
    $stmt = $conn->prepare("DELETE FROM student WHERE id=?");

    $stmt->bindValue(1, $id);

    $run = $stmt->execute();

  //  $conn->close();

    if($run)
      return true;
    else
        throw new Exception("Something Went Wrong!");

  }

  public static function deleteFaculty($id) {

    $conn = self::connect();
  //  $query = "DELETE FROM faculty WHERE id=$id";
    $stmt = $conn->prepare("DELETE FROM faculty WHERE id=?");
    $stmt->bindValue(1, $id);
    $run = $stmt->execute();

  //  $conn->close();

    if($run)
      return true;
    else
        throw new Exception("Something Went Wrong!");

  }

  public static function getCourses() {

    $conn = self::connect();
    //$query = "SELECT * FROM offered";
    $stmt = $conn->prepare("SELECT * FROM offered");
    $run = $stmt->execute();

  //  $conn->close();

    if($run) {
      if($stmt->rowCount() > 0)
        return $stmt;
      else
        return false;
    } else {
      throw new Exception("Something Went Wrong");
    }

  }

  public static function getCourseOnId($id) {

    $conn = self::connect();
    //$query = "SELECT * FROM offered WHERE id=$id";
    $stmt = $conn->prepare("SELECT * FROM offered WHERE id=?");
    $stmt->bindValue(1, $id);
    $run = $stmt->execute();

    // $conn->close();

    if($run) {
        return $stmt;
    } else {
      throw new Exception("Something Went Wrong");
    }

  }

  public static function deleteCourse($id) {

    $conn = self::connect();
    //$query = "DELETE FROM offered WHERE id=$id";
    $stmt = $conn->prepare("DELETE FROM offered WHERE id=?");
    $stmt->bindValue(1, $id);
    $run = $stmt->execute();

    // $conn->close();

    if($run)
      return true;
    else
        throw new Exception("Something Went Wrong!");

  }

  public static function updateCourse(Course $course, $id) {

    $title = $course->getTitle();
    $code = $course->getCode();
    $credit = $course->getCredit();

    $conn = self::connect();

    // $query = "UPDATE `offered` SET `title`='$title',`code`='$code',
    //                  `credit`=$credit WHERE id=$id" ;

    $stmt = $conn->prepare("UPDATE `offered` SET `title`=?,`code`=?,
                      `credit`=? WHERE id=? ");

    $stmt->bindValue(1, $title);
    $stmt->bindValue(2, $code);
    $stmt->bindValue(3, $credit);
    $stmt->bindValue(4, $id);

    $run = $stmt->execute();

    // $conn->close();

    if($run===true) {
      return true;
    }
    return false;

  }

  public static function getPosts() {

    $conn = self::connect();
    //$query = "SELECT * FROM timetable";
    $stmt = $conn->prepare("SELECT * FROM timetable");
    $run = $stmt->execute();

    // $conn->close();

    if($run) {
      if($stmt->rowCount() > 0)
        return $stmt;
      else
        return false;
    } else {
      throw new Exception("Something Went Wrong");
    }

  }

  public static function deletePost($id) {

    $conn = self::connect();
    // $query = "DELETE FROM timetable WHERE id=$id";
    $stmt = $conn->prepare("DELETE FROM timetable WHERE id=?");
    $stmt->bindValue(1, $id);
    $run = $stmt->execute();

    //$conn->close();

    if($run)
      return true;
    else
        throw new Exception("Something Went Wrong!");

  }

}



 ?>
