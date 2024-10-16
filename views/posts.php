<Section class="actions">
    <a href="upload.php" style="font-family: verdana, sans-serif, helvetica;">Upload</a><br>
</Section>
<Section class="tags" style="float: left;">
    <table>
    <?php foreach ($res['tags'] as $tag) { ?>
        <tr>
            <td>
            <a href="posts.php?pag=1&tag=<?php echo $tag[0]; ?>"><?php echo $tag[1] ?></a>
            </td>
        </tr>
    <?php } ?>
</table>
</Section>
<?php 
$sql = "SELECT MAX(fecha_alta) AS fecha_alta FROM posts";
        
$p = mysqli_query($link, $sql);
        
$pfa=mysqli_fetch_assoc($p);
        
echo $pfa['fecha_alta'];
?>

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
            <?php
             foreach ($posts as $post) { ?>
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

    <div class="paginador" style="text-align: center;">
        <p>
            <?php for ($i = 1; $i <= ceil(intval($cant["c"]) / 4); $i++) { ?>
                <a href="posts.php?pag=<?php echo $i; ?>&tag=<?php echo $_GET['tag'] ?>"><button><?php echo $i; ?></button></a>
            <?php } ?>
        </p>
</div>