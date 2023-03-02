<picture>
    <img src="img/posts/<?php echo $post[1] ?>" class="image"><br>
</picture>

<a>Tags:</a>
<br>
        <?php
        if (isset($result["tags"])) {
            foreach ($result['tags'] as $tag) { ?>

                    <a href="posts.php?tag=<?php echo $tag[0] ?>"><?php echo $tag[1]; ?></a>
                <br>
            <?php }
        } ?>




<br>
<?php echo "uploaded on $date[0] by $post[0]" ?>