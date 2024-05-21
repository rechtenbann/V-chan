<?php
require_once "includes/config.php";
if (session_status() !== PHP_SESSION_ACTIVE) session_start();
$sql = "SELECT id,usu_nombre FROM usuarios";
$query = mysqli_query($link, $sql);
$names = mysqli_fetch_all($query,MYSQLI_ASSOC);

$msgid=$_GET['comment'];
$sql="SELECT * FROM online_chat WHERE id = '".$msgid."'";
$query = mysqli_query($link, $sql);
$main = mysqli_fetch_assoc($query);

$sql = "SELECT id,usu_nombre,foto_perfil FROM usuarios WHERE id = '".$main['usuario_id']."'";
$query = mysqli_query($link, $sql);
$op = mysqli_fetch_assoc($query);

if(isset($_POST['ans'])){
    $sql="INSERT INTO online_chat_ans (id, content, comment_id, usuario_id, fecha_alta, fecha_baja) VALUES (NULL,'".$_POST['ans']."', '".$_GET['comment']."','".$_SESSION['usuario']['id']."',NOW(),NULL)";
    $query=mysqli_query($link,$sql);
    if(!$query){
        die("Error de consulta: " . mysqli_errno($link));
    }
    header("Location: chat_ans.php?comment=".$msgid);
}

//paginador
$sql = "SELECT COUNT(*) AS n FROM online_chat_ans WHERE comment_id = '".$msgid."'";
$query = mysqli_query($link, $sql);
if (!$query) {
    die("Error de consulta: " . mysqli_errno($link));
}
$cant = mysqli_fetch_assoc($query);
if (isset($_GET['pag'])) {
    $pag = intval($_GET['pag']);
    if ($pag <= ceil(intval($cant["n"]) / 5)) {
        $in = ($pag * 5) - 5;
        $sql = "SELECT * FROM online_chat_ans WHERE comment_id='".$msgid."' ORDER BY fecha_alta DESC LIMIT $in,5";
        $query = mysqli_query($link, $sql);
        if (!$query) {
            die("Error de consulta: " . mysqli_errno($link));
        }
        $anss = mysqli_fetch_all($query, MYSQLI_ASSOC);
    }
} else {
    $sql = "SELECT * FROM online_chat_ans WHERE comment_id='".$msgid."' ORDER BY fecha_alta DESC LIMIT 0,5";
    $query = mysqli_query($link, $sql);
    if (!$query) {
        die("Error de consulta: " . mysqli_errno($link));
    }
    $anss = mysqli_fetch_all($query, MYSQLI_ASSOC);
}
$cont = 0;

$section = "chat_ans";
$title = "Online Chat";
require_once "views/layout.php";