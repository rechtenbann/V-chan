<?php
require_once "includes/config.php";

if (isset($_POST['nombre']) && isset($_POST['email']) && isset($_POST['contra'])) {
    $pass = md5($_POST['contra']);
    $sql = "INSERT INTO usuarios (id,usu_nombre,usu_clave,usu_email,fecha_alta,fecha_baja) VALUES (null,'". $_POST['nombre']."','". $pass ."','". ($_POST['email'])."',NOW(),null)";
    $query = mysqli_query($link, $sql);

    if (!$query) {
        echo "Fallo consulta: " . mysqli_error($link);
        exit();
    }else{
        header("Location: settings.php");
    }
}
$section = "signup";
$title = "Signup";
require_once "views/layout.php";