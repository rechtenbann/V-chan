<?php
require_once "includes/config.php";
session_start();
if (isset($_POST['nombre']) && isset($_POST['contra'])) {
    $pass=md5($_POST['contra']);
    $sql = "SELECT * FROM usuarios WHERE usu_clave = '" . $pass . "' AND usu_nombre = '" . $usr=$_POST['nombre'] . "'";

    $query = mysqli_query($link, $sql);

    if (!$query) {
        die("Error de consulta: " . mysqli_errno($link));
    }
    if (mysqli_num_rows($query) == 1) {
        $_SESSION['usuario']['usu_nombre'] = $_POST['nombre'];
        header("Location: settings.php");
    } else {
        header("Location: login.php?li=f");
    }
}
$section = "login";
$title = "Log In";
require_once "views/layout.php";
?>