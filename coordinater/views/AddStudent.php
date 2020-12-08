

				<div class="text-center">
					<h2>Add Student</h2>
				</div>

				<form id="signup" action="./Student.php" method="post">

					<div class="form-group">
						<label for="">First Name</label>
						<input type="text" class="form-control" name="first" id="fname" required="required" />
					</div>

					<div class="form-group">
						<label for="">Last Name</label>
						<input type="text" class="form-control" name="last" id="lname" required="required" />
					</div>

					<div class="form-group">
						<label for="">Registration No</label>
						<input type="text" class="form-control" name="reg" id="reg" required="required" />
					</div>

					<div class="form-group">
						<label for="">Email</label>
						<input type="text" class="form-control" name="email" id="mail" required="required" />
					</div>

					<div class="form-group">
						<label for="">Password</label>
						<input type="password" class="form-control" name="npass" id="np" required="required" >
					</div>

					<div class="form-group">
						<label for="">Confirm Password</label>
						<input type="password" class="form-control" name="cpass" id="cp" required="required" >
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
						<select name="gender" class="form-control">
							<option value="Male">Male</option>
							<option value="Female">Female</option>
						</select>
					</div>

					<input class="btn btn-success" type="submit" name="signup" value="Register" />




				</form>
