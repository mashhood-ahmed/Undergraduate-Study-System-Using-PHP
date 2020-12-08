<?php

require_once("./Course.php");

if(isset($_GET['ucid'])) {
  $data = Course::getCourse($_GET['ucid']);
  $rows = $data->fetch(PDO::FETCH_ASSOC);
}


 ?>



  <?php if(isset($_GET['ucid'])) { ?>

		<h2 class="text-center">Update Course</h2>

  <?php } else { ?>

    <h2 class="text-center">Add Course</h2>

  <?php } ?>

			<form id="g" action="./Course.php" method="post">

          <input type="hidden" name="update_signal"
                 value="<?php if(isset($_GET['ucid'])) echo "Set"; else "Unset"; ?>">

				<div class="form-group">
					<label for="">Course Title</label>
					<input type="text" value="<?php if(isset($_GET['ucid'])) echo $rows['title']; ?>"
                     name="title" id="title" required="required" class="form-control" />
				</div>



        <input type="hidden" name="update_id"
               value="<?php if(isset($_GET['ucid'])) echo $_GET['ucid']; ?>">

				<div class="form-group">
		 				<label for="">Course Code</label>
						<input type="text" value="<?php if(isset($_GET['ucid'])) echo $rows['code']; ?>"
	                     name="code" id="code" required="required" class="form-control" />
		 		</div>

				<div class="form-group">
		 				<label for="">Credit.Hr</label>
						<input type="number" value="<?php if(isset($_GET['ucid'])) echo $rows['credit']; ?>"
	                     name="credit" id="credit" required="required" class="form-control" />
		 		</div>

				<input class="btn btn-success" type="submit" name="sub" value="<?php if(isset($_GET['ucid'])) echo "Update Course"; else echo "Upload Course"; ?>"></td>


			</form>
