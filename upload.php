<?php
require_once "includes/config.php";
$confirm = 0;
if (isset($_FILES['image']) && isset($_POST['checkbox'])) {
    $move = move_uploaded_file($_FILES['image']['tmp_name'], "img/posts/" . $_FILES['image']['name']);
    if ($move) {
        $sql = "INSERT INTO posts (usuario_id,image, fecha_alta) VALUES (1,'" . $_FILES['image']['name'] . "', NOW())";
        $query = mysqli_query($link, $sql);
        if (!$query) {
            $confirm = 0;
        } else {
            $confirm = 1;
        }

        //$sql="INSERT INTO tag_post VALUES (null,'".$_POST['checkbox']."','".$_FILES['image']['id']."',NOW(),null)";
        //$query=mysqli_query($link,$sql);
        //$sql = "INSERT IF NOT EXISTS INTO tags (id,tag) VALUES (NULL,'" . $_POST['tags'] . "', NOW())";
        //$query = mysqli_query($link, $sql);
/*
        if (isset($_POST['tags'])) {
            if (strpos($_POST['tags'], "\n")) {
                $entries = explode("\n", $_POST['tags']);
            } else {
                $entries = array($_POST['tags']);
            }
            foreach ($entries as $e) {
                $sql = "INSERT INTO tags VALUES (NULL,tag) WHERE NOT EXISTS (SELECT * FROM tags WHERE tag='" . $_POST['tags'] . "')";
                $query = mysqli_query($link, $sql);
            }
        }
        $sql = "INSERT INTO tag_post (id,tag_id, post_id) VALUES (NULL,'".$_POST['tags']['id']."','".$_POST['image']['id']."')";
        $query = mysqli_query($link, $sql);*/
    }
}

$section = "upload";
$title = "Upload";
require_once "views/layout.php";
/* $sql="INSERT INTO posts (usuario_id, image, fecha_alta)
SELECT usuarios.id, image, fecha_alta
FROM posts
INNER JOIN usuarios ON usuarios.id=posts.usuario_id";*/
?>