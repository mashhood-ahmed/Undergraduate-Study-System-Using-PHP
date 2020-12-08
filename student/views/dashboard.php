<?php

require_once("../includes/header.php");
require_once("./course.php");


		if(isset($_GET['home']))
			headerSection("Home");
		elseif(isset($_GET['regCourse']))
			headerSection("Register Course");
		else if(isset($_GET['viewRegCourse']))
			headerSection("View Registered Courses");



 ?>


	<section style="min-height: 600px;">

		<?php

		if(isset($_GET['home']))
			include("./view_posts.php");
		elseif(isset($_GET['regCourse']))
			include("./register_course.php");
		else if(isset($_GET['viewRegCourse']))
			include("./view_courses.php");
		elseif(isset($_GET['courses']) && isset($_GET['sid']))
			Course::getCourseId($_GET['courses'], $_GET['sid']);
		elseif(isset($_GET['cid']))
			Course::course_id_for_withdraw($_GET['cid'], $_GET['sid']);
		else
			header("location: ./404.php")


		 ?>

	</section>

<?php require_once("../includes/footer.php");
	  footerSection();
 ?>
