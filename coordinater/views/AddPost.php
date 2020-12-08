
		<div class="text-center mb-4">
			<h2>Upload Post</h2>
		</div>

				<form action="./Post.php" method="post" enctype="multipart/form-data">

					<div class="form-group">
						<label for="">Post Title</label>
						<input type="text" size="78" maxlength="50" class="form-control" placeholder="Your Post Title Goes Here" required name="pTitle" />
					</div>

					<div class="form-group">
						<label for="">Post Description</label>
						<textarea placeholder="Your Post Goes Here" class="form-control" name="post" rows="8" maxlength="500" required cols="80"></textarea>
					</div>

					<div class="form-group">
						<label for="">Upload File</label>
						<input type="file" class="form-control" name="f" />
					</div>

					<input type="submit" class="btn btn-success" name="time" value="Upload">

				</form>
