<Section class="actions">
    <a href="upload.php" style="font-family: verdana, sans-serif, helvetica; color:#212121;">Upload</a><br>
</Section>
<ul class="tags" style="float: left;">
    <?php foreach ($tags as $tag) {
        $sql = "SELECT COUNT(*) AS c FROM posts AS p INNER JOIN tag_post AS tp ON tp.post_id = p.id AND tp.tag_id = '" . $tag['id'] . "'";
        $query = mysqli_query($link, $sql);
        $countPosts = mysqli_fetch_assoc($query);
        ?>
        <li style="list-style-type: none;"><a href="posts.php?pag=1&tag=<?php echo $tag['id']; ?>"
                style="display:inline-block"><?php echo $tag['tag'] ?></a><span><?php echo " " . $countPosts['c'] ?></span>
        </li>
    <?php } ?>
</ul>
<main>
    <div class="tbody" style="text-align: center;">
        <?php
        foreach ($posts as $post) { ?>
            <a href="post.php?id=<?php echo $post['id'] ?>"><img src="img/posts/<?php echo $post['image']; ?>" height=200
                    width=150 style="object-fit: contain;"></a>

        <?php } ?>
    </div>
</main>
<div class="paginador" style="text-align: center;">
    <p>
        <?php for ($i = 1; $i <= ceil(intval($cant["c"]) / 4); $i++) { ?>
            <a href="posts.php?pag=<?php echo $i; ?>&tag=<?php echo $_GET['tag'] ?>"><button><?php echo $i; ?></button></a>
        <?php } ?>
    </p>
</div>