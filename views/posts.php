<div class="ace">
    <Section class="actions">
        <a href="upload.php"
           style="font-family: AnimeAce, sans-serif, helvetica; color:#212121;margin-left:10px"><button
                class="inputSubmitHome">Upload</button></a><br>
    </Section>
    <ul class="tags" style="float: left;">
        <?php $cc = 0;
        foreach ($tags as $tag) {
            if ($cc < 20) {
                $sql = "SELECT COUNT(*) AS c FROM posts AS p INNER JOIN tag_post AS tp ON tp.post_id = p.id AND tp.tag_id = '" . $tag['id'] . "'";
                $query = mysqli_query($link, $sql);
                $countPosts = mysqli_fetch_assoc($query);
                ?>
                <li style="list-style-type: none;">▸ <a class="tag" href="posts.php?pag=1&tag=<?php echo $tag['id']; ?>"
                                                      style="display:inline-block; color: #212121; font-size: 10px;"><?php echo $tag['tag'] ?></a><span
                        style=""><?php echo " (" . $countPosts['c'] . ")" ?></span>
                </li>
                <?php $cc++;
            }
        } ?>
    </ul>
    <main>
        <div class="tbody" style="text-align: center; margin-top: 10px;">
            <?php
            if (isset($posts)) {
                foreach ($posts as $post) {
                       // Obtener la extensión del archivo original
                    $extension = pathinfo($post['original'], PATHINFO_EXTENSION);
                    // Verificar si el archivo es un gif
                    $isGif = strtolower($extension) == 'gif';
                    $isVid = strtolower($extension) == 'mp4';
                    $isAud = strtolower($extension) == 'mp3';
                    ?>
                    <a href="post.php?id=<?php echo $post['id'] ?>" style="text-decoration: none;">
                    <img class="post <?php if($isGif){echo "gif-toggle gif";}else if($isVid){echo "vid vload";}else if($isAud){echo "aud aud-toggle aud-container";}?>" 
                         src="img/posts/preview/<?php echo $post['image']; ?>" 
                         height=200 width=150 
                         style="<?php if(in_array(strtolower($extension), ['mp3', 'm4a', 'wav', 'flac'])){echo "object-fit: contain;";}else{echo "object-fit: cover;";}?> padding:2px;"
                         <?php if(isset($post['original'])){?>data-gif="img/posts/original/<?php echo $post['original'];}?>">
                    </a>
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

            <?php for ($i = 1; $i <= ceil(intval($cant["c"]) / $cpp); $i++) { ?>
                <a href="posts.php?pag=<?php echo $i; ?>&tag=<?php echo $_GET['tag'] ?>"><button
                        class="ace"><?php echo $i; ?></button></a>
            <?php } ?>

            <?php if ($_GET['pag'] < ceil(intval($cant["c"]) / $cpp)) {
                $pag = $_GET['pag'] + 1 ?>
                <a href="posts.php?pag=<?php echo $pag; ?>&tag=<?php echo $_GET['tag'] ?>"><button class="ace">
                        <?php echo ">"; ?>
                    </button></a>
            <?php } ?>
        </p>
    </div>
</div>
