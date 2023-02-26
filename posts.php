<?php
require_once "includes/config.php";
$query = "SELECT post_id,post_nombre,image FROM posts";
$posts = mysqli_query($link, $query);
$query = "SELECT vid_id,vid_nombre,video FROM Videos";
$videos = mysqli_query($link, $query);
/*$ppp = $_POST['ppp'];
if($ppp){
 $a=1;
}else{
$a=0;
}
$ppp=0;
if(isset($_POST['ppp'])){
    $ppp=$_POST['ppp'];
}*/

$cont = 0;
$section = "posts";
$title = "Posts";
require_once "views/layout.php";
/*WHERE fecha_baja IS NULL AND (titulo LIKE '%" . $_POST['busqueda'] . "%' OR
    contenido LIKE '%" . $_POST['busqueda'] . "%' OR
    encabezado LIKE '%" . $_POST['busqueda'] . "%')
    ORDER BY fecha_alta DESC LIMIT 0,3"*/
?>