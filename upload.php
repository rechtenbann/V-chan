<?php
require_once "includes/config.php";
$confirm = 0;
if (isset($_FILES['image'])) {
    $move = move_uploaded_file($_FILES['image']['tmp_name'], "img/posts/" . $_FILES['image']['name']);
    if ($move) {
        $sql = "INSERT INTO posts (usuario_id,image, fecha_alta) VALUES (1,'" . $_FILES['image']['name'] . "', NOW())";
        $query = mysqli_query($link, $sql);
        if (!$query) {
            $confirm = 0;
        } else {
            $confirm = 1;
        }
    }
}

$section = "upload";
$title = "Upload";
require_once "views/layout.php";