<?php
function headerSection($title) {

  session_start();
  require_once("../../functions/function.php");

  # check for session variables
  if(!isCoordinaterSession())
  	header("location: ../../coordinater-login.php");

  ?>

  <!DOCTYPE html>
  <html>
  <head>
  	<title><?php echo $title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  	<link rel="stylesheet" type="text/css" href="../../bootstrap/css/bootstrap.min.css" />
  </head>
  <body>

  <div class="container-fluid">

    <header class="row border bg-dark mb-4 shadow">

      <div class="col-md-2 pt-3 text-white">
        <span class="font-weight-bold">Admin Panel :~</span>
      </div>

      <nav class="col-md-10 navbar navbar-expand-sm">
        <ul class="navbar-nav">

          <li class="nav-item">
            <a class="nav-link" href="index.php?home">Home</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="index.php?addStudent">Add Student</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="index.php?addFaculty">Add Faculty</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="index.php?addCourse">Add Course</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="index.php?viewStudent">View Students</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="index.php?viewFaculty">View Faculty</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="index.php?viewCourses">View Courses</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="index.php?uploadPost">Upload Post</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="./logout.php">Logout</a>
          </li>

        </ul>
      </nav>
    </header>


  <?php
}
 ?>
