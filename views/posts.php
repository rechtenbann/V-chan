<Section class="actions">
    <a href="upload.php" style="font-family: verdana, sans-serif, helvetica;">Upload</a><br>
    <!-- <Form method="post">
        <label for="ppp">Posr per page</label>
        <select name="ppp" id="ppp">
            <option value="2">2</option>
            <option value="8">8</option>
            <option value="10">10</option>
            <option value="20">20</option>
        <input type="submit" value="Confirm">
        </select>
    </Form>-->
    <?php
    //echo $ppp;
    ?>
</Section>
<Section class="tags" style="float: left;">
    <table>
    <?php foreach ($res['tags'] as $tag) { ?>
        <tr>
            <td>
            <a href="posts.php?tag=<?php echo $tag[0]; ?>">? + - <?php echo $tag[1] ?></a>
            </td>
        </tr>
    <?php } ?>
</table>
</Section>
<?php if(!isset($_GET['tag'])||(isset($_GET['tag'])&&$_GET['tag']=="1")){ ?>
<main>
        <div class="tbody" style="text-align: center;">
            <?php foreach ($posts as $post) { ?>
                <?php
                $sql = "SELECT * FROM posts WHERE fecha_baja IS NULL";
                $query = mysqli_query($link, $sql);
                if (!$query) {
                    echo "";
                } else { ?>
                    <a href="post.php?id=<?php echo $post['id'] ?>"><img src="img/posts/<?php echo $posts[$cont]['image']; ?>" height=200 width=150 style="object-fit: contain;"></a>
                <?php } ?>
            <?php
                $cont = $cont + 1;
            } ?>
        </div>
</main>
<?php } else if(isset($_GET['tag'])&&$_GET['tag']!="1"){ ?>
    <main>
        <div class="tbody" style="text-align: center;">
            <?php foreach ($posts as $post) { ?>
                <?php
                $sql = "SELECT * FROM posts
                INNER JOIN tag_post
                ON tag_post.post_id = posts.id
                INNER JOIN tags
                ON tag_post.tag_id = tags.id
                WHERE posts.fecha_baja IS NULL AND
                tag_post.tag_id = '" . $_GET['tag'] . "'";
                $query=mysqli_query($link,$sql);
                if (!$query) {
                    echo "";
                } else { ?>
                    <a href="post.php?id=<?php echo $post['id'] ?>"><img src="img/posts/<?php echo $posts[$cont]['image']; ?>" height=200 width=150 style="object-fit: contain;"></a>

                <?php } ?>
            <?php
                $cont = $cont + 1;
            } ?>
        </div>
</main>
<?php } ?>