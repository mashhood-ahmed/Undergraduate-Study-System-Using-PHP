<?php
class Database {

  public static function connect() {

    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "accounts";
    $dsn = "mysql:host=$host;dbname=$db";

    try {
      $conn = new PDO($dsn, $user, $pass);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $conn;
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }

  public static function getCourses() {

    $conn = self::connect();
    $query = "
          SELECT o.title, o.id
          FROM offered o
          LEFT JOIN stdcourse s
          ON o.id = s.c_id
          WHERE s.c_id IS NULL
    ";
    $stmt = $conn->prepare($query);
    $run = $stmt->execute();
    //$conn->close();

    if($run) {
      if($stmt->rowCount() > 0)
        return $stmt;
      else
          return false;
    } else {
      throw new Exception("Something Went Wrong..");
    }

  }

  public static function uploadCourseId($cid, $sid) {

    $conn = self::connect();
    $query = "INSERT INTO `stdcourse`(`std_id`, `c_id`)
              VALUES
              (?, ?)";

    $stmt = $conn->prepare($query);

    $stmt->bindValue(1, $sid);
    $stmt->bindValue(2, $cid);

    $run = $stmt->execute();

    if($run)
      return true;
    else
      throw new Exception("Something Went Wrong..");

  }

  public static function getRegisterCourses($sid) {

    $conn = self::connect();
    $query = "SELECT * FROM stdcourse s, offered o
              WHERE
              s.std_id=? AND s.c_id=o.id
              GROUP BY s.c_id ";

    $stmt = $conn->prepare($query);

    $stmt->bindValue(1, $sid);

    $run = $stmt->execute();
  //  $conn->close();

    if($run) {
      if($stmt->rowCount() > 0)
        return $stmt;
      else
          return false;
    } else {
      throw new Exception("Something Went Wrong..");
    }

  }

  public static function deleteCourse($id, $sid) {

    $conn = self::connect();
    $query = "DELETE FROM stdcourse WHERE c_id=? AND std_id=?";
    $stmt = $conn->prepare($query);

    $stmt->bindValue(1, $id);
    $stmt->bindValue(2, $sid);

    $run = $stmt->execute();
    //$conn->close();

    if($run)
      return true;
    else
        throw new Exception("Something Went Wrong");

  }

  public static function getPosts() {

    $conn = self::connect();
    $query = "SELECT * FROM timetable";
    $stmt = $conn->prepare($query);

    $run = $stmt->execute();
    //$conn->close();

    if($run)
      return $stmt;
    else
      throw new Exception("Something Went Wrong");



  }

}
 ?>
