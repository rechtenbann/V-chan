<?php
require_once "includes/config.php";
if (session_status() !== PHP_SESSION_ACTIVE) session_start();

$sql = "SELECT id,usu_nombre FROM usuarios WHERE fecha_baja IS NULL";
$query = mysqli_query($link, $sql);
$names = mysqli_fetch_all($query,MYSQLI_ASSOC);


$sql = "SELECT COUNT(*) AS n FROM online_chat";

$query = mysqli_query($link, $sql);

if (!$query) {
    die("Error de consulta: " . mysqli_errno($link));
}

$cant = mysqli_fetch_assoc($query);
if (isset($_GET['pag'])) {
    $pag = intval($_GET['pag']);
    if ($pag <= ceil(intval($cant["n"]) / 10)) {
        $in = ($pag * 10) - 10;
        $sql = "SELECT * FROM online_chat ORDER BY fecha_alta DESC LIMIT $in,10";

        $query = mysqli_query($link, $sql);

        if (!$query) {
            die("Error de consulta: " . mysqli_errno($link));
        }

        $notes = mysqli_fetch_all($query, MYSQLI_ASSOC);
    }
} else {
    $sql = "SELECT * FROM online_chat ORDER BY fecha_alta DESC LIMIT 0,10";

    $query = mysqli_query($link, $sql);

    if (!$query) {
        die("Error de consulta: " . mysqli_errno($link));
    }

    $notes = mysqli_fetch_all($query, MYSQLI_ASSOC);
}

$cont = 0;

$query = "SELECT * FROM usuarios LEFT JOIN online_chat ON online_chat.usuario_id = usuarios.id;";
$query = mysqli_query($link, $query);
$usudata = mysqli_fetch_assoc($query);
// (preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)/',$_POST['note'])==true)
if(isset($_POST['note'])&&$_POST['note']!=null){
    // if(strpos($_POST['note'], '@') !== false){
    // }
$sql="INSERT INTO online_chat (id, content, usuario_id, fecha_alta, fecha_baja) VALUES (NULL,'".$_POST['note']."','".$_SESSION['usuario']['id']."',NOW(),NULL)";
$query=mysqli_query($link,$sql);
if(!$query){
    die("Error de consulta: " . mysqli_errno($link));
}

header("Location: chat.php?pag=1");
}

$section = "chat";
$title = "Online Chat";
require_once "views/layout.php";