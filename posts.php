<?php
require_once "includes/config.php";
if (!isset($_GET['tag'])) {
    $query = "SELECT id,image FROM posts";
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
} else {
    $sql = "SELECT COUNT(*) FROM posts AS p
    INNER JOIN tag_post AS tp
    ON p.id = tp.post_id
    INNER JOIN tags AS t
    ON tp.tag_id = t.id
    WHERE p.fecha_baja IS NULL AND
    t.tag = '" . $_GET['tag'] . "'";

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

}

$sql = "SELECT id,tag FROM tags";
$query = mysqli_query($link, $sql);
$res['tags'] = mysqli_fetch_all($query);
$cont = 0;
$section = "posts";
$title = "Posts";
require_once "views/layout.php";
?>