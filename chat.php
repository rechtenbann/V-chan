<?php
require_once "includes/config.php";
if (session_status() !== PHP_SESSION_ACTIVE) session_start();

    $query = "SELECT * FROM online_chat";
    $notes = mysqli_query($link, $query);

    $sql = "SELECT COUNT(*) AS n FROM online_chat";

    $query = mysqli_query($link, $sql);

    if (!$query) {
        die("Error de consulta: " . mysqli_errno($link));
    }

    $cant = mysqli_fetch_assoc($query);
    if (isset($_GET['pag'])) {
        $pag = intval($_GET['pag']);
        if ($pag <= ceil(intval($cant["n"]) / 20)) {
            $in = ($pag * 20) - 20;
            $sql = "SELECT * FROM online_chat LIMIT $in,20";

            $query = mysqli_query($link, $sql);

            if (!$query) {
                die("Error de consulta: " . mysqli_errno($link));
            }

            $posts = mysqli_fetch_all($query, MYSQLI_ASSOC);
        }
    } else {
        $sql = "SELECT * FROM online_chat LIMIT 0,20";

        $query = mysqli_query($link, $sql);

        if (!$query) {
            die("Error de consulta: " . mysqli_errno($link));
        }

        $notes = mysqli_fetch_all($query, MYSQLI_ASSOC);
    }
if(isset($_POST['note'])){
$sql="INSERT INTO online_chat (id,content,usuario_id,fecha_alta,fecha_baja) VALUES (NULL,'".$_POST['note']."','".$_SESSION['usuario']['id']."',NOW(),NULL)";
$query=mysqli_query($link,$sql);
if (!$query) {
    die("Error de consulta: " . mysqli_errno($link));
}
}
$sql = "SELECT id,tag FROM tags";
$query = mysqli_query($link, $sql);
$res['tags'] = mysqli_fetch_all($query);
$cont = 0;
$section = "chat";
$title = "Online Chat";
require_once "views/layout.php";
