<?php
require_once "includes/config.php";
$sql="SELECT * FROM posts WHERE post_id='".$_GET['id']."'";
//fecha_baja IS NULL AND 
$query=mysqli_query($link,$sql);
$img=mysqli_fetch_row($query);
$section = "post";
$title = "Post";
require_once "views/layout.php";