<?php
function headerSection($title) {

  session_start();
  require_once("../../functions/function.php");

  # check for session variables
  if(!isStudentSession())
  	header("location: ../../student-login.php");

  ?>

  <!DOCTYPE html>
  <html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  	<title><?php echo $title; ?></title>
  	<link rel="stylesheet" type="text/css" href="../../bootstrap/css/bootstrap.min.css" />
  </head>
  <body>

  <div class="container-fluid">

    <header class="row border bg-dark mb-4 shadow">

      <div class="col-md-2 pt-3 text-white">
        <span class="font-weight-bold">Student Panel :~</span>
      </div>

      <nav class="col-md-8 navbar navbar-expand-sm">
        <ul class="navbar-nav">

          <li class="nav-item">
            <a class="nav-link" href="dashboard.php?home">Home</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="dashboard.php?regCourse">Register Course</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="dashboard.php?viewRegCourse">View Registered Courses</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="./logout.php">Logout</a>
          </li>

        </ul>
      </nav>


      <div class="col-md-2 pt-3 text-white">
        <span>Online :~ <?php echo $_SESSION['name']; ?></span>
      </div>


    </header>


  <?php
}
 ?>
