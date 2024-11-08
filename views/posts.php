<div class="ace">
    <Section class="actions">
        <a href="upload.php"
            style="font-family: AnimeAce, sans-serif, helvetica; color:#212121;margin-left:10px"><button
                class="inputSubmitHome">Upload</button></a><br>
    </Section>
    <ul class="tags" style="float: left;">
        <?php $cc = 0;
        foreach ($tags as $tag) {
            if ($cc < 50) {
                $sql = "SELECT COUNT(*) AS c FROM posts AS p INNER JOIN tag_post AS tp ON tp.post_id = p.id AND tp.tag_id = '" . $tag['id'] . "'";
                $query = mysqli_query($link, $sql);
                $countPosts = mysqli_fetch_assoc($query);
                ?>
                <li style="list-style-type: none;">▸ <a class="tag" href="posts.php?pag=1&tag=<?php echo $tag['id']; ?>"
                        style="display:inline-block; color: #212121;"><?php echo $tag['tag'] ?></a><span
                        style=""><?php echo " (" . $countPosts['c'] . ")" ?></span>
                </li>
                <?php $cc++;
            }
        } ?>
    </ul>
    <main>
        <div class="tbody" style="text-align: center;">
            <?php
            if (isset($posts)) {
                foreach ($posts as $post) { ?>
                    <a href="post.php?id=<?php echo $post['id'] ?>"><img class="post"
                            src="img/posts/<?php echo $post['image']; ?>" height=200 width=150 style="object-fit: contain;"></a>

                <?php }
            } else { ?>
<a>There are no posts yet :'(</a>
            <?php } ?>
        </div>
    </main>
    <div class="paginador" style="text-align: center;">
        <p>
            <?php if ($_GET['pag'] > 1) {
                $pag = $_GET['pag'] - 1; ?>
                <a href="posts.php?pag=<?php echo $pag; ?>&tag=<?php echo $_GET['tag'] ?>"><button class="ace">
                        <?php echo "<"; ?>
                    </button></a>
            <?php } ?>

            <?php for ($i = 1; $i <= ceil(intval($cant["c"]) / 4); $i++) { ?>
                <a href="posts.php?pag=<?php echo $i; ?>&tag=<?php echo $_GET['tag'] ?>"><button
                        class="ace"><?php echo $i; ?></button></a>
            <?php } ?>

            <?php if ($_GET['pag'] < ceil(intval($cant["c"]) / 4)) {
                $pag = $_GET['pag'] + 1 ?>
                <a href="posts.php?pag=<?php echo $pag; ?>&tag=<?php echo $_GET['tag'] ?>"><button class="ace">
                        <?php echo ">"; ?>
                    </button></a>
            <?php } ?>
        </p>
    </div>
</div>