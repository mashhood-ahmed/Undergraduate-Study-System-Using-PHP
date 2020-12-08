<?php

require_once("./Student.php");

$data = Student::viewStudents();

if(isset($_GET['sid']))
  Student::DeleteOnId($_GET['sid']);

 ?>


		<?php if($data) { ?>

		<div class="text-center mb-4">
			<h2>All Registered Students</h2>
		</div>

		<table class="table text-center" align="center" width="900" border="2">

			<tr>
				<th>ID</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Registration No</th>
				<th>Email</th>
				<th>Department</th>
				<th>Gender</th>
        <th>Action</th>
			</tr>

			<?php

        $id = 1;

				while($rows = $data->fetch(PDO::FETCH_ASSOC)) {
					?>
						<tr>
							<td><?php echo $id++; ?></td>
							<td><?php echo $rows['firstName']; ?></td>
							<td><?php echo $rows['lastName']; ?></td>
							<td><?php echo $rows['regNo']; ?></td>
							<td><?php echo $rows['email']; ?></td>
							<td><?php echo $rows['dept']; ?></td>
							<td><?php echo $rows['gender']; ?></td>
              <td> <a href="viewStudents.php?sid=<?php echo $rows['id']; ?>">Delete</a> </td>
						</tr>
					<?php
				}

			?>

		</table>

	<?php

		} else {

			?>

			<div class="text-center">
				<h2>No Student Found</h2>
			</div>

			<?php
		}

	 ?>
