	<?php



	require_once("../includes/header.php");


				if(isset($_GET['home']))
					headerSection("Home");

				elseif(isset($_GET['addCourse']))
					headerSection("Add Course");

				elseif(isset($_GET['addFaculty']))
						headerSection("Add Faculty");

				elseif(isset($_GET['addStudent']))
						headerSection("Add Student");

				elseif(isset($_GET['viewStudent']))
						headerSection("View Students");

				elseif(isset($_GET['viewFaculty']))
						headerSection("View Faculty");

				elseif(isset($_GET['viewCourses']))
						headerSection("View Courses");

				elseif(isset($_GET['uploadPost']))
						headerSection("Upload Post");

				elseif(isset($_GET['ucid']))
							headerSection("Update Course");
	?>

		<section style="min-height: 600px;" class="row">

		<div class="col-md-12">

			<?php

				if(isset($_GET['home'])) {
					include("./viewPost.php");

				}	elseif(isset($_GET['addCourse'])) {
					include("./AddCourse.php");
				}
				elseif(isset($_GET['addFaculty'])) {
						include("./AddFaculty.php");
				}
				elseif(isset($_GET['addStudent'])) {
						include("./AddStudent.php");
				}
				elseif(isset($_GET['viewStudent'])) {
						include("./viewStudents.php");
				}
				elseif(isset($_GET['viewFaculty'])) {
						include("./viewFaculty.php");
				}
				elseif(isset($_GET['viewCourses'])) {
						include("./viewCourses.php");
				}
				elseif(isset($_GET['uploadPost'])) {
						include("./AddPost.php");
				}
				elseif(isset($_GET['ucid'])) {
						include("./AddCourse.php");
				}
				else {
						header("location: ./404.php");
				}


			?>

		</div>

		</section>


		<?php
		require_once("../includes/footer.php");
		footerSection();
		 ?>
