<?php


require_once("./Database.php");

$data = Database::getPosts();

if($data->rowCount() > 0) {
?>


<?php
  while($rows = $data->fetch(PDO::FETCH_ASSOC)) {

    ?>

    <div class="text-center mt-4 mb-4">

    <div class="">
      <h2><?php echo $rows['title']; ?></h2>
    </div>

    <div class="">
      <p class="w-50 mx-auto"><?php echo $rows['description']; ?></p>
    </div>

    <?php if($rows['tt']) { ?>

    <div class="">
      <img src="../../images/<?php echo $rows['tt']; ?>" width="600" height="300" />
    </div>

    <?php } ?>

    </div>

    <?php


  }

 ?>


<?php
} else {
  ?>

  <div class="text-center">
  <h2>No Recent Posts</h2>
  </div>

  <?php
}

 ?>
