<?php
require_once "includes/config.php";
//image
$sql="SELECT usuarios.usu_nombre as uid, posts.image FROM usuarios 
INNER JOIN posts 
ON posts.id='".$_GET['id']."' AND posts.usuario_id=usuarios.id";
$query=mysqli_query($link,$sql);
$post=mysqli_fetch_row($query);
//upload
$sql="SELECT fecha_alta FROM posts WHERE posts.id='".$_GET['id']."'";
$query=mysqli_query($link,$sql);
$date=mysqli_fetch_row($query);
$sql="SELECT tag FROM tag_post AS tp
INNER JOIN tags AS t
ON tp.tag_id=t.id
WHERE tp.post_id=". $_GET['id'] ." AND
fecha_baja IS NULL";
$query=mysqli_query($link,$sql);
$result['tags']=mysqli_fetch_all($query);
$section = "post";
$title = "Post";
require_once "views/layout.php";