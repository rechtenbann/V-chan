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

$sql = "SELECT COUNT(*) AS c FROM categorias";

$query = mysqli_query($link, $sql);

if (!$query) {
    die("Error de consulta: " . mysqli_errno($link));
}

$cant = mysqli_fetch_assoc($query);
if (isset($_GET['pag'])) {
    $pag = intval($_GET['pag']);
    if($pag <= ceil(intval($cant["c"]) / 2)){
    $in = ($pag * 2) - 2;
    $sql = "SELECT * FROM categorias LIMIT $in,2";

    $query = mysqli_query($link, $sql);

    if (!$query) {
        die("Error de consulta: " . mysqli_errno($link));
    }

    $cats = mysqli_fetch_all($query, MYSQLI_ASSOC);
}
} else {
    $sql = "SELECT * FROM categorias LIMIT 0,2";

    $query = mysqli_query($link, $sql);

    if (!$query) {
        die("Error de consulta: " . mysqli_errno($link));
    }

    $cats = mysqli_fetch_all($query, MYSQLI_ASSOC);
}
?>

<table>
    <?php foreach ($cats as $cat) { ?>
        <tr>
            <td><?php echo $cat['cat_nombre']; ?></td>
        </tr>
    <?php } ?>
</table>
</div>
<div align="center">
<p>
    <?php for($i = 1; $i <= ceil(intval($cant["c"])/2); $i++){ ?>
        <a href="posts.php?pag=<?php echo $i; ?>"><button><?php echo $i; ?></button></a>
    <?php } ?>
</p>
</div>
</main>