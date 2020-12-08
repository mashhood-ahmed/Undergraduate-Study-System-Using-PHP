<?php

require_once("./course.php");

if(isset($_SESSION['id']))
  $student_id = $_SESSION['id'];

$data = Course::allRegisterCourses($student_id);



 ?>

	<?php if($data) { ?>

	<div class="text-center mt-3 mb-4">
		<h2>Registered Courses</h2>
	</div>


		<table class="table text-center">

			<tr>
				<th>ID</th>
				<th>Title</th>
				<th>Code</th>
				<th>Credit.Hr</th>
				<th>Action</th>
			</tr>

			<?php

			$id = 1;

			while($rows = $data->fetch(PDO::FETCH_ASSOC)) {
			?>

			<tr>
				<td><?php echo $id++; ?></td>
				<td><?php echo $rows['title']; ?></td>
				<td><?php echo $rows['code']; ?></td>
				<td><?php echo $rows['credit']; ?></td>
				<td> <a href="dashboard.php?cid=<?php echo $rows['id']; ?>&sid=<?php echo $student_id; ?>">WithDraw</a> </td>
			</tr>


			<?php } ?>

		</table>

	<?php } else { ?>

		<div class="text-center mt-3 mb-4">
			<h2>No Register Courses</h2>
		</div>

	<?php } ?>
