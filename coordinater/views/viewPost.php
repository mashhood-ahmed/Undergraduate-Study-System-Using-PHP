<?php

require_once("./Post.php");

$data = Post::viewPosts();

if(isset($_GET['pid']))
  Post::DeleteOnId($_GET['pid']);

 ?>


  <?php
  if($data) {

   ?>


   <?php
    while($rows = $data->fetch(PDO::FETCH_ASSOC)) {
      ?>

				<div class="text-center mb-4">

        <div class="">
					<h2><?php echo $rows['title']; ?></h2>
        </div>

        <div class="text-center">
					<p class="w-50 mx-auto"><?php echo $rows['description']; ?></p>
        </div>

				<?php if($rows['tt']) { ?>

        <div class="">
          <img src="../../images/<?php echo $rows['tt']; ?>"
               width="600" height="300" alt="">
        </div>

				<?php } ?>

        <div class="mt-3">
          <a class="btn btn-danger" href="viewPost.php?pid=<?php echo $rows['id']; ?>">Delete</a>
        </div>

				</div>

      <?php
    }

    ?>


   <?php
    } else {
      ?>
      <div class="">
        <h1>No Posts Found</h1>
      </div>
      <?php
    }
    ?>

  </body>
</html>
