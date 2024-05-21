<?php
require_once "includes/config.php";
//image
$sql = "SELECT usuarios.usu_nombre as uid, posts.image FROM usuarios 
INNER JOIN posts 
ON posts.id='" . $_GET['id'] . "' AND posts.usuario_id=usuarios.id";
$query = mysqli_query($link, $sql);
$post = mysqli_fetch_row($query);
//upload
$sql = "SELECT fecha_alta FROM posts WHERE posts.id='" . $_GET['id'] . "'";
$query = mysqli_query($link, $sql);
$date = mysqli_fetch_row($query);
$sql = "SELECT tag_id,tag FROM tag_post AS tp
INNER JOIN tags AS t
ON tp.tag_id=t.id
WHERE tp.post_id=" . $_GET['id'] . " AND
fecha_baja IS NULL";
$query = mysqli_query($link, $sql);
$tags = mysqli_fetch_all($query);


if (isset($_POST['tags'])) {
    $sql = "SELECT * FROM tags";
    $query = mysqli_query($link, $sql);
    $tags = mysqli_fetch_all($query, MYSQLI_ASSOC);
    $tags_array = preg_split("/[\s,]+/", $_POST['tags']);
    foreach($tags_array as $ta)
    {
        
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
}


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
