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
<Section class="tags">
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
    <div class="post-site" align="center">
        <?php

        $sql = "SELECT COUNT(*) AS c FROM posts";

        $query = mysqli_query($link, $sql);

        if (!$query) {
            die("Error de consulta: " . mysqli_errno($link));
        }

        $cant = mysqli_fetch_assoc($query);
        if (isset($_GET['pag'])) {
            $pag = intval($_GET['pag']);
            if ($pag <= ceil(intval($cant["c"]) / 4)) {
                $in = ($pag * 4) - 4;
                $sql = "SELECT * FROM posts LIMIT $in,4";

                $query = mysqli_query($link, $sql);

                if (!$query) {
                    die("Error de consulta: " . mysqli_errno($link));
                }

                $posts = mysqli_fetch_all($query, MYSQLI_ASSOC);
            }
        } else {
            $sql = "SELECT * FROM posts LIMIT 0,4";

            $query = mysqli_query($link, $sql);

            if (!$query) {
                die("Error de consulta: " . mysqli_errno($link));
            }

            $posts = mysqli_fetch_all($query, MYSQLI_ASSOC);
        }
        ?>

        <div class="gallery">
            <?php foreach ($posts as $post) { ?>
                <?php
                $sql = "SELECT * FROM posts WHERE fecha_baja IS NULL";
                $query = mysqli_query($link, $sql);
                if (!$query) {
                    echo "";
                } else { ?>
                    <a href="post.php?id=<?php echo $post['post_id'] ?>"><img src="img/posts/<?php echo $posts[$cont]['image']; ?>" height=200 width=150 style="object-fit: contain;"></a>
                <?php } ?>
            <?php
                $cont = $cont + 1;
            } ?>
        </div>
    </div>
    <div align="center">
        <p>
            <?php for ($i = 1; $i <= ceil(intval($cant["c"]) / 4); $i++) { ?>
                <a href="posts.php?pag=<?php echo $i; ?>"><button><?php echo $i; ?></button></a>
            <?php } ?>
        </p>
    </div>
</main>