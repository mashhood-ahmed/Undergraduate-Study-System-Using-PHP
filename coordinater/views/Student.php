<?php

require_once("./person.php");
require_once("./Database.php");

class Student implements person {

  private $firstName;
  private $lastName;
  private $registration;
  private $email;
  private $password;
  private $gender;
  private $department;

  public function __construct($fname, $lname, $reg, $email, $pass, $gender, $dept) {

    $this->firstName = $fname;
    $this->lastName = $lname;
    $this->registration = $reg;
    $this->email = $email;
    $this->password = $pass;
    $this->gender = $gender;
    $this->department = $dept;
  }

  #Override
  public function getFirstName() {
    return $this->firstName;
  }

  #Override
  public function getLastName() {
    return $this->lastName;
  }

  public function getRegistration() {
    return $this->registration;
  }

  #Override
  public function getEmail() {
    return $this->email;
  }

  #Override
  public function getPassword() {
    return $this->password;
  }

  #Override
  public function getGender() {
    return $this->gender;
  }

  #Override
  public function getDepartment() {
    return $this->department;
  }

  public static function viewStudents() {
    return Database::getStudents();
  }

  public static function DeleteOnId($id) {
    $result = Database::deleteStudent($id);
    if($result) {
      echo "<script>alert('Record is successfully deleted')</script>";
      echo "<script>open('./index.php?viewStudent', '_self')</script>";
    }
  }

}


if(isset($_POST['signup'])) {

  $firstName = $_POST['first'];
  $lastName = $_POST['last'];
  $registration = $_POST['reg'];
  $email = $_POST['email'];
  $password = $_POST['npass'];
  $gender = $_POST['gender'];
  $department = $_POST['dept'];

  $student = new Student($firstName, $lastName, $registration, $email, $password,
                         $gender, $department);

  $result = Database::uploadStudent($student);


  if($result) {
    echo "<script>alert('New record created successfully')</script>";
    echo "<script>open('./index.php?addStudent', '_self')</script>";
  } else {
    echo "<script>alert('Error')</script>";
    echo "<script>open('./index.php?addStudent', '_self')</script>";
  }

}


 ?>
