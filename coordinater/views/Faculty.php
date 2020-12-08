<?php

require_once("./person.php");
require_once("./Database.php");

class Faculty implements person {

  private $firstName;
  private $lastName;
  private $email;
  private $password;
  private $gender;
  private $department;

  public function __construct($fname, $lname, $email, $pass, $gender, $dept) {
    $this->firstName = $fname;
    $this->lastName = $lname;
    $this->email = $email;
    $this->password = $pass;
    $this->gender = $gender;
    $this->department = $dept;
  }

  public function getFirstName() {
    return $this->firstName;
  }

  public function getLastName() {
    return $this->lastName;
  }

  public function getEmail() {
    return $this->email;
  }

  public function getPassword() {
    return $this->password;
  }

  public function getGender() {
    return $this->gender;
  }

  public function getDepartment() {
    return $this->department;
  }

  public static function viewFaculty() {
    return Database::getFaculty();
  }

  public static function DeleteOnId($id) {
    $result = Database::deleteFaculty($id);
    if($result) {
      echo "<script>alert('Record is successfully deleted')</script>";
      echo "<script>open('./index.php?viewFaculty', '_self')</script>";
    }

  }

}

if(isset($_POST['addFac'])) {

  $firstName = $_POST['first'];
  $lastName = $_POST['last'];
  $email = $_POST['email'];
  $password = $_POST['npass'];
  $department = $_POST['dept'];
  $gender = $_POST['gender'];

  $faculty = new Faculty($firstName, $lastName, $email, $password, $gender, $department);
  $result = Database::uploadFaculty($faculty);

  if($result) {

    echo "<script>alert('New record created successfully')</script>";
    echo "<script>open('./index.php?addFaculty', '_self')</script>";

  } else {

    echo "<script>alert('Error')</script>";
    echo "<script>open('./index.php?addFaculty', '_self')</script>";
  }

}




 ?>
