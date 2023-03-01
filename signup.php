<?php
if (isset($_SESSION['usuario'])) {
}
require_once "includes/config.php";
if (isset($_POST['nombre']) && isset($_POST['email']) && isset($_POST['contra'])) {
    $pass=md5($_POST['contra']);
    $sql = "INSERT INTO usuarios (usu_nombre,usu_clave,usu_email,fecha_alta) VALUES ('". $_POST['nombre']."','". $pass ."','". ($_POST['email'])."',NOW())";
    $query = mysqli_query($link, $sql);

    if (!$query) {
        header("Location: signup.php?r=f");
        die("Error de consulta: " . mysqli_errno($link));
    }else{
        header("Location: settings.php");
    }
}
$section = "signup";
$title = "Register";
require_once "views/layout.php";
/*if (strlen($_POST["nombre"]) > 0 && strlen($_POST["nombre"]) <= 20 && strlen($_POST["contra"]) >= 8 && strlen($_POST["contra"]) <= 50 && strlen($_POST["email"]) >= 5 && count($comprobar_email) > 1) {
    $user = $_POST["nombre"];
    $mail = $_POST["email"];
    $pass = md5($_POST['contra']);*/