<?php
require_once "includes/config.php";
$confirm = 0;
if (isset($_FILES['image'])) {
    $move = move_uploaded_file($_FILES['image']['tmp_name'], "img/posts/" . $_FILES['image']['name']);
    if ($move) {
        $sql = "INSERT INTO posts (usuario_id,image, fecha_alta) VALUES (1,'" . $_FILES['image']['name'] . "', NOW());";
        $query = mysqli_query($link, $sql);
        $lid=mysqli_insert_id($link);
        if (!$query) {
            $confirm = 0;
        } else {
            $confirm = 1;
            $sql="INSERT INTO tag_post (tag_id, post_id, fecha_alta) VALUES (1,'".$lid."',NOW())";
            $query=mysqli_query($link,$sql);
            header("Location:posts.php?pag=1&tag=1");
        }
    }
}

$section = "upload";
$title = "Upload";
require_once "views/layout.php";