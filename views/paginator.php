<?php if(!isset($_GET['tag'])||(isset($_GET['tag'])&&$_GET['tag']==1)){ ?>
<div class="paginador" style="text-align: center;">
        <p>
            <?php for ($i = 1; $i <= ceil(intval($cant["c"]) / 4); $i++) { ?>
                <a href="posts.php?pag=<?php echo $i; ?>&tag=1"><button><?php echo $i; ?></button></a>
            <?php } ?>
        </p>
</div>
<?php }else{ ?>
    <div class="paginador" style="text-align: center;">
        <p>
            <?php for ($i = 1; $i <= ceil(intval($cant["c"]) / 4); $i++) { ?>
                <a href="posts.php?pag=<?php echo $i; ?>&tag=<?php echo $tag[0] ?>"><button><?php //if($i=$_GET['pag']){echo "<b>";} ?><?php echo $i; ?><?php // if($i=$_GET['pag']){echo "</b>";} ?></button></a>
            <?php } ?>
        </p>
</div>
    <?php } ?>