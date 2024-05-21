<?php
require_once "includes/config.php";
if (!isset($_GET['tag'])||(isset($_GET['tag'])&&$_GET['tag']==1)) {
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
} else if ((isset($_GET['tag'])&&$_GET['tag']!=1)) {
    $query = "SELECT p.* FROM posts AS p INNER JOIN tag_post AS tp ON tp.post_id = p.id AND tp.tag_id = '".$_GET['tag']."' ORDER BY fecha_alta DESC";
    $posts = mysqli_query($link, $query);

    $sql = "SELECT COUNT(*) AS c FROM posts AS p INNER JOIN tag_post AS tp ON tp.post_id = p.id AND tp.tag_id = '".$_GET['tag']."'";

    $query = mysqli_query($link, $sql);

    if (!$query) {
        die("Error de consulta: " . mysqli_errno($link));
    }

    $cant = mysqli_fetch_assoc($query);
    if (isset($_GET['pag'])) {
        $pag = intval($_GET['pag']);
        if ($pag <= ceil(intval($cant["c"]) / 4)) {
            $in = ($pag * 4) - 4;
            $sql = "SELECT * FROM posts p INNER JOIN tag_post AS tp ON tp.post_id = p.id AND tp.tag_id = '".$_GET['tag']."' ORDER BY p.fecha_alta DESC LIMIT $in,4";

            $query = mysqli_query($link, $sql);

            if (!$query) {
                die("Error de consulta: " . mysqli_errno($link));
            }

            $posts = mysqli_fetch_all($query, MYSQLI_ASSOC);
        }
    } else {
        $sql = "SELECT * FROM posts p INNER JOIN tag_post AS tp ON tp.post_id = p.id AND tp.tag_id = '".$_GET['tag']."' ORDER BY p.fecha_alta DESC LIMIT 0,4";

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