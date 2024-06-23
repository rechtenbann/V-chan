<picture>
    <img src="img/posts/<?php echo $post[1] ?>" class="image"><br>
</picture>

<a>Tags:</a>
<br>
        <?php
        if (isset($tags["tags"])) {
            foreach ($tags['tags'] as $tag) { ?>

                    <a href="posts.php?tag=<?php echo $tag[0] ?>"><?php echo $tag[1]; ?></a>
                <br>
            <?php }
        } ?>
<br>
<?php echo "uploaded on $date[0] by $post[0]" ?>
<br>
<a>Edit:</a>
<form method="POST">
    <label for="tags">Tags:</label>
<textarea type="text" name="tags" style="height:100px;width:25%;outline: none; resize: none;"></textarea>
<input type="submit" value="submit">
</form>