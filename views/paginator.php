<div class="paginador" style="text-align: center;">
        <p>
            <?php for ($i = 1; $i <= ceil(intval($cant["c"]) / 4); $i++) { ?>
                <a href="posts.php?pag=<?php echo $i; ?>"><button><?php echo $i; ?></button></a>
            <?php } ?>
        </p>
    </div>