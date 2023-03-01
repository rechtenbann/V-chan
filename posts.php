<?php
require_once "includes/config.php";
$query = "SELECT id,image FROM posts";
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


$cont = 0;
$section = "posts";
$title = "Posts";
require_once "views/layout.php";
/*WHERE fecha_baja IS NULL AND (titulo LIKE '%" . $_POST['busqueda'] . "%' OR
    contenido LIKE '%" . $_POST['busqueda'] . "%' OR
    encabezado LIKE '%" . $_POST['busqueda'] . "%')
    ORDER BY fecha_alta DESC LIMIT 0,3"*/
?>