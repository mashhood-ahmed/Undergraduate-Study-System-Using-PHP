<?php

require_once("./Faculty.php");

$data = Faculty::viewFaculty();

if(isset($_GET['fid']))
  Faculty::DeleteOnId($_GET['fid']);

 ?>


		<?php if($data) { ?>

		<div class="text-center mb-4">
			<h2>All Registered Faculty</h2>
		</div>

		<table align="center" class="table text-center" width="900" border="2">

			<tr>
				<th>ID</th>
				<th>First Name</th>
				<th>Last Name</th>
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
								<td><?php echo $rows['email']; ?></td>
								<td><?php echo $rows['dept']; ?></td>
								<td><?php echo $rows['gender']; ?></td>
                <td> <a href="viewFaculty.php?fid=<?php echo $rows['id']; ?>">Delete</a> </td>
							</tr>

						<?php
					}
			 ?>

		</table>

		<?php
	} else {

		?>
		<div class="text-center">
			<h2>No Faculty Found</h2>
		</div>

		<?php
	} ?>
