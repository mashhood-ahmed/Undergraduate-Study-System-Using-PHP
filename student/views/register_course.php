<?php

$student_id = $_SESSION['id'];

# import course file from classes folder
require_once("./course.php");

# invoke static method getAllCourses()
$data = Course::getAllCourses();


?>


	<div class="text-center">
		<h2>Register Course</h2>
	</div>

	<form action="" id="h" method="get">

		<div class="form-group">
			<label>Course Name</label>
			<select class="form-control" name="courses">
				<?php
					while($rows = $data->fetch(PDO::FETCH_ASSOC)) {
				?>
					<option value="<?php echo $rows['id']; ?>">
						<?php echo $rows['title']; ?>
					</option>

				<?php
					}

				?>
			</select>

		</div>

		<input type="hidden" name="sid" value="<?php echo $student_id; ?>">

		<input type="submit" class="btn btn-success" name="reg" value="Register" />

	</form>
