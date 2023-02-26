<?php
require_once "includes/config.php";
session_start();
if (isset($_POST['nombre']) && isset($_POST['contra'])) {
    $sql = "SELECT * FROM usuarios WHERE usu_clave = '" . $_POST['contra'] . "' AND usu_nombre = '" . $_POST['nombre'] . "'";

    $query = mysqli_query($link, $sql);

    if (!$query) {
        die("Error de consulta: " . mysqli_errno($link));
    }
    if (mysqli_num_rows($query) == 1) {
        $_SESSION['usuario']['usu_nombre'] = $_POST['nombre'];
        header("Location: login.php?exito=si");
    } else {
        header("Location: login.php?exito=no");
    }
}
$section = "login";
$title = "Log In";
require_once "views/layout.php";
?>