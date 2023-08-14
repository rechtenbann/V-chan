<?php
require_once "includes/config.php";
if (!isset($_GET['tag'])) {
    $query = "SELECT * FROM posts ORDER BY fecha_alta DESC";
    $posts = mysqli_query($link, $query);

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
            $sql = "SELECT * FROM posts ORDER BY fecha_alta DESC LIMIT $in,4";

            $query = mysqli_query($link, $sql);

            if (!$query) {
                die("Error de consulta: " . mysqli_errno($link));
            }

            $posts = mysqli_fetch_all($query, MYSQLI_ASSOC);
        }
    } else {
        $sql = "SELECT * FROM posts ORDER BY fecha_alta DESC LIMIT 0,4";

        $query = mysqli_query($link, $sql);

        if (!$query) {
            die("Error de consulta: " . mysqli_errno($link));
        }

        $posts = mysqli_fetch_all($query, MYSQLI_ASSOC);
    }
} else {
    $sql = "SELECT posts.id,posts.image FROM posts
    INNER JOIN tag_post
    ON posts.id = tag_post.post_id
    INNER JOIN tags
    ON tags.id = tag_post.id
    WHERE posts.fecha_baja IS NULL AND
    tag_post.tag_id = '" . $_GET['tag'] . "' ORDER BY fecha_alta DESC";

    $posts = mysqli_query($link, $sql);

    $sql = "SELECT COUNT(*) AS c FROM posts
    INNER JOIN tag_post
    ON posts.id = tag_post.post_id
    INNER JOIN tags
    ON tags.id = tag_post.id
    WHERE posts.fecha_baja IS NULL AND
    tag_post.tag_id = '" . $_GET['tag'] . "'";

    $query = mysqli_query($link, $sql);

    if (!$query) {
        die("Error de consulta: " . mysqli_errno($link));
    }

    $cant = mysqli_fetch_assoc($query);
    if (isset($_GET['pag'])) {
        $pag = intval($_GET['pag']);
        if ($pag <= ceil(intval($cant["c"]) / 4)) {
            $in = ($pag * 4) - 4;
            $sql = "SELECT * FROM posts ORDER BY fecha_alta DESC LIMIT $in,4";

            $query = mysqli_query($link, $sql);

            if (!$query) {
                die("Error de consulta: " . mysqli_errno($link));
            }

            $posts = mysqli_fetch_all($query, MYSQLI_ASSOC);
        }
    } else {
        $sql = "SELECT * FROM posts ORDER BY fecha_alta DESC LIMIT 0,4";

        $query = mysqli_query($link, $sql);

        if (!$query) {
            die("Error de consulta: " . mysqli_errno($link));
        }

        $posts = mysqli_fetch_all($query, MYSQLI_ASSOC);
    }

}

$sql = "SELECT id,tag FROM tags";
$query = mysqli_query($link, $sql);
$res['tags'] = mysqli_fetch_all($query);
$cont = 0;
$section = "posts";
$title = "Posts";
require_once "views/layout.php";
?>