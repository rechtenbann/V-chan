<?php
require_once "includes/config.php";
session_start();
$log = 0;

if (isset($_POST['nombre']) && isset($_POST['contra'])) {
    $nombre = $_POST['nombre'];
    $pass = md5($_POST['contra']);
    $sql = "SELECT * FROM usuarios 
            WHERE (usu_nombre = '" . $nombre . "' OR usu_email = '" . $nombre . "')
            AND usu_clave = '" . $pass . "'";
    $result = mysqli_query($link, $sql);
if(isset($_POST['cookie'])){
$log=1;
}
    if (!$result) {
        echo "Fallo consulta: " . mysqli_error($link);
        exit();
    }
    if (mysqli_num_rows($result) == 1) {
        $_SESSION['usuario'] = mysqli_fetch_assoc($result);
        $query = "SELECT r.rango FROM rango_usuario AS ru
			INNER JOIN rangos AS r
			ON ru.rango_id = r.id
			WHERE ru.usu_id = " . $_SESSION['usuario']['id'] . " AND
			fecha_baja IS NULL";
        $rec = consulta($query, $link);
        if (count($rec) > 0) {
            $_SESSION['usuario']['rango'] = $rec;
        }
        $admin = false;
        $vip = false;
        $usr = false;
        foreach ($_SESSION['usuario']['rango'] as $ran) {
            $_SESSION['usuario']['rango'] = $ran['rango'];
        }
        if($log==1){
            setcookie("un",$_SESSION['usuario']['usu_nombre'], time() + (86400 * 30), "/"); // 86400 = 1 day
            setcookie("up",$_SESSION['usuario']['usu_clave'], time() + (86400 * 30), "/"); // 86400 = 1 day
            setcookie("uem",$_SESSION['usuario']['usu_email'], time() + (86400 * 30), "/"); // 86400 = 1 day
        }
        header('Location: index.php');
    }
}
$section = "login";
require_once "views/layout.php";
