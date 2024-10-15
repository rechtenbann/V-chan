<h3><?php echo $question['title'];?></h3>

    <?php foreach($images as $image){?>
        <img src="<?php echo $image['img'];?>" style="max-width:20rem;">
         
    <?php } ?>

<p><?php echo $question['description'];?></p>