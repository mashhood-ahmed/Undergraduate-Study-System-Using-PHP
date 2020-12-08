
 				<div class="text-center">
 						<h2>Add Faculty</h2>
 				</div>

				<form id="faform" action="./Faculty.php" method="post">

					<div class="form-group">
						<label for="">First Name</label>
						<input type="text" class="form-control" name="first" id="fn" required="required" />
					</div>

					<div class="form-group">
						<label for="">Last Name</label>
						<input type="text" class="form-control" name="last" id="ln" required="required" />
					</div>

					<div class="form-group">
						<label for="">Email</label>
						<input type="text" class="form-control" name="email" id="ma" required="required" />
					</div>

					<div class="form-group">
						<label for="">Password</label>
						<input type="password" class="form-control" name="npass" id="fp" required="required" >
					</div>

					<div class="form-group">
						<label for="">Confirm Password</label>
						<input type="password" class="form-control" name="cpass" id="sp" required="required" >
					</div>

					<div class="form-group">
						<label for="">Department</label>
						<select name="dept" class="form-control">
							<option value="computer science">Computer Science</option>
							<option value="computer system">Computer System</option>
							<option value="software engineering">Software Engineering</option>
						</select>
					</div>

					<div class="form-group">
						<label for="">Gender</label>
						<select class="form-control" name="gender">
							<option value="Male">Male</option>
							<option value="Female">Female</option>
						</select>
					</div>



					<input type="submit" name="addFac" class="btn btn-success" value="Register" />

				</form>
