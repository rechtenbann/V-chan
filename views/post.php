<div class="contain">
    <div class="image-container">
        <picture>
            <img src="img/posts/<?php echo $post[1]; ?>" class="image" alt="Post Image">
        </picture>
    </div>

    <div class="content-container">
        <a>Tags:</a>
        <br>
        <div class="tags">
            <?php
            if (isset($tags["tags"])) {
                foreach ($tags['tags'] as $tag) { ?>
                    <a href="posts.php?tag=<?php echo $tag[0] ?>"><?php echo $tag[1]; ?></a>
                <?php }
            } ?>
        </div>
        <br>
        <?php echo "uploaded on $date[0] by $post[0]" ?>
        <br>
        <a>Edit:</a>
        <form method="POST" class="form-container">
            <label for="tags">Tags:</label>
            <textarea name="tags"></textarea>
            <input type="submit" value="submit">
        </form>
    </div>
</div>
<br>