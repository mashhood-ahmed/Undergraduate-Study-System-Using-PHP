<?php

# function to establish db connection
function connect() {

  $host = "localhost";
  $user = "root";
  $pass = "";
  $db = "accounts";

  try {
    return new mysqli($host, $user, $pass, $db);
  } catch(Exception $e) {
    echo $e->getMessage();
  }

}

# function to process student login form
function processStudentLoginForm() {

  $conn = connect();

  $reg = $_POST['sreg'];
  $pass = $_POST['spass'];

  $query = "SELECT * FROM student WHERE regNo='$reg' AND password='$pass' ";
  $run = $conn->query($query);

  $conn->close();

  if(mysqli_num_rows($run) > 0) {

    $row = mysqli_fetch_array($run);
    $_SESSION['id'] = $row['id'];
    $_SESSION['name'] = $row['firstName'] . " " . $row['lastName'];

    header("location: ./student/views/dashboard.php?home");

  } else {

    echo "<script>alert('Authentication Failed! Please Try Again');</script>";
  }

}

# function to process Coordinator login form
function processCoordinaterLoginForm() {

  $user = $_POST['username'];
  $pass = $_POST['cpass'];


  if($user==="admin12" && $pass==="admin") {

    $_SESSION['AdminName'] = "Coordinator";

    header("location: ./coordinater/views/index.php?home");

  } else {

    echo "<script>alert('Authentication Failed! Please Try Again');</script>";
  }

}

# function to test student session variables
function isSession() {
  if(isset($_SESSION['id']) && isset($_SESSION['name'])) {
    return true;
  }
  return false;
}

# function to test coordinater session variables
function isCoordinaterSession() {
  if(isset($_SESSION['AdminName'])) {
    return true;
  }
  return false;
}

# function to test student session variables
function isStudentSession() {
  if(isset($_SESSION['id']) && isset($_SESSION['name'])) {
    return true;
  }
  return false;
}



 ?>
