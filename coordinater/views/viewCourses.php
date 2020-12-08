<?php

include_once("./Course.php");
$data = Course::allCourses();

if(isset($_GET['dcid']))
	Course::DeleteOnId($_GET['dcid']);

 ?>


		<?php if($data) { ?>

		<div class="text-center mb-4">
			<h2>All Registered Courses</h2>
		</div>

		 <table class="table text-center" align="center" width="900" border="2">

			<tr>
				<th>ID</th>
				<th>Course Title</th>
				<th>Course Code</th>
				<th>Credit Hours</th>
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
                <td>
                  <a href="./index.php?ucid=<?php echo $rows['id']; ?>">Update</a>
                  |
                  <a href="./viewCourses.php?dcid=<?php echo $rows['id']; ?>">Delete</a>
                </td>
							</tr>

						<?php
					}
			 ?>



		</table>

	<?php } else {
		?>

		<div class="text-center">
			<h2>No Course Found</h2>
		</div>

		<?php
	} ?>
