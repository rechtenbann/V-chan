<Section class="actions">
    <a href="upload.php">Upload</a><br>
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
    <a href="#">? + - Tag</a><br>
    <a href="#">? + - Tag</a><br>
    <a href="#">? + - Tag</a><br>
    <a href="#">? + - Tag</a><br>
    <a href="#">? + - Tag</a><br>
    <a href="#">? + - Tag</a><br>
    <a href="#">? + - Tag</a><br>
    <a href="#">? + - Tag</a><br>
    <a href="#">? + - Tag</a><br>
    <a href="#">? + - Tag</a><br>
    <a href="#">? + - Tag</a><br>
</Section>

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