<?php
require_once "includes/config.php";
session_start();
// Obtener imagen y usuario
$sql = "SELECT SUM(val) AS v FROM like_post";
$query = mysqli_query($link, $sql);
$ll = mysqli_fetch_assoc($query);

if (isset($_POST['like'])) {
    $sql = "SELECT * FROM like_post WHERE usuario_id='" . $_SESSION['usuario']['id'] . "' AND post_id = '" . $_GET['id'] . "'";
    $que = mysqli_query($link, $sql);
    $rr = mysqli_num_rows($que);
    if ($rr === 1) {
        $like = mysqli_fetch_assoc($que);
        if ($like['val'] == 1) {
            $sql = "UPDATE like_post SET val=0 WHERE usuario_id='" . $_SESSION['usuario']['id'] . "' AND post_id = '" . $_GET['id'] . "'";
            $query = mysqli_query($link, $sql);
        } else if ($like['val'] == 0) {
            $sql = "UPDATE like_post SET val=1 WHERE usuario_id='" . $_SESSION['usuario']['id'] . "' AND post_id = '" . $_GET['id'] . "'";
            $query = mysqli_query($link, $sql);
        }
    } else {
        $sql = "INSERT INTO like_post (val,usuario_id,post_id,fecha_alta) VALUES (1,'" . $_SESSION['usuario']['id'] . "','" . $_GET['id'] . "',NOW())";
        $query = mysqli_query($link, $sql);
    }
}
$sql = "SELECT usuarios.usu_nombre as uid, posts.image FROM usuarios 
INNER JOIN posts 
ON posts.id='" . $_GET['id'] . "' AND posts.usuario_id=usuarios.id";
$query = mysqli_query($link, $sql);
$post = mysqli_fetch_row($query);

// Obtener fecha de alta del post
$sql = "SELECT fecha_alta FROM posts WHERE posts.id='" . $_GET['id'] . "'";
$query = mysqli_query($link, $sql);
$date = mysqli_fetch_row($query);

// Obtener tags del post
$sql = "SELECT t.id, t.tag FROM tag_post AS tp
INNER JOIN tags AS t ON tp.tag_id = t.id
WHERE tp.post_id = " . $_GET['id'] . " AND tp.fecha_baja IS NULL";
$query = mysqli_query($link, $sql);
$tags = mysqli_fetch_all($query, MYSQLI_ASSOC);

// Insertar nuevas tags
if (isset($_POST['tags'])) {
    $tags_array = preg_split("/[\s,]+/", $_POST['tags']);
    foreach ($tags_array as $new_tag) {
        // Verificar si la tag ya existe
        $sql = "SELECT id FROM tags WHERE tag = '" . mysqli_real_escape_string($link, trim($new_tag)) . "'";
        $query = mysqli_query($link, $sql);
        $existing_tag = mysqli_fetch_row($query);

        if ($existing_tag) {
            // Si la tag existe, vincularla con el post si no está ya asociada
            $tag_id = $existing_tag[0];
            $sql = "INSERT IGNORE INTO tag_post (post_id, tag_id) VALUES (" . $_GET['id'] . ", $tag_id)";
            mysqli_query($link, $sql);
        } else {
            // Si no existe, insertarla y luego vincularla con el post
            $sql = "INSERT INTO tags (tag) VALUES ('" . mysqli_real_escape_string($link, trim($new_tag)) . "')";
            mysqli_query($link, $sql);
            $tag_id = mysqli_insert_id($link);
            $sql = "INSERT INTO tag_post (post_id, tag_id) VALUES (" . $_GET['id'] . ", $tag_id)";
            mysqli_query($link, $sql);
        }
    }
    // Redirigir para evitar el reenvío de formularios
    header("Location: post.php?id=" . $_GET['id']);
    exit();
}


// foreach ($tags_array as $ta) {
//     $sql = "SELECT id FROM tags WHERE tag = '" . $ta . "'";
//     $query = mysqli_query($link, $sql);
//     $tags_data = mysqli_fetch_all($query, MYSQLI_ASSOC);
//     foreach ($tags_data as $td) {
//         if (mysqli_num_rows($query) == 1) {
//             $sql = "INSERT INTO tag_post(id, tag_id,post_id,fecha_alta,fecha_baja) VALUES (NULL,'" . $td['id'] . "','" . $_GET['id'] . "',NOW(),NULL)";
//             $query = mysqli_query($link, $sql);
//         }else{
//             $sql = "INSERT INTO tags(id,tag) VALUES (NULL,'" . $ta . "'";
//             $query = mysqli_query($link, $sql);
//         }
//         echo $ta;
//     }
// }


/*
if(mysqli_num_rows($query) == 1){
            $sql = "INSERT INTO tag_post(id, tag_id,post_id,fecha_alta,fecha_baja) VALUES (NULL,'".$ta['id']."','".$_GET['id']."',NOW(),NULL)";
            $query=mysqli_query($link,$sql);
        }else{
            $sql = "INSERT INTO tags(id, tag) VALUES (NULL, '" . $ta . "',)";
            $query=mysqli_query($link,$sql);
            $sql = "SELECT id FROM tags WHERE tag = '".$ta."'";
            $query=mysqli_query($link,$sql);
            $tags_data=mysqli_fetch_all($query,MYSQLI_ASSOC);
            $sql = "INSERT INTO tag_post(id, tag_id,post_id,fecha_alta,fecha_baja) VALUES (NULL, '".$ta['id']."','".$_GET['id']."',NOW(),NULL)";
            $query=mysqli_query($link,$sql);
        }

        if (mysqli_num_rows($query) == 0) {
                $sql = "INSERT INTO tags(id, tag) VALUES (NULL, '" . $ta . "',)";
                $query = mysqli_query($link, $sql);
                $sql = "SELECT id FROM tags WHERE tag = '" . $ta . "'";
                $query = mysqli_query($link, $sql);
                $tags_data = mysqli_fetch_all($query, MYSQLI_ASSOC);
                $sql = "INSERT INTO tag_post(id, tag_id,post_id,fecha_alta,fecha_baja) VALUES (NULL, '" . $td['id'] . "','" . $_GET['id'] . "',NOW(),NULL)";
                $query = mysqli_query($link, $sql);
            }
*/

$section = "post";
$title = "Post";
require_once "views/layout.php";
