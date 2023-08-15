<?php
require_once "includes/config.php";

if (isset($_POST['nombre']) && isset($_POST['email']) && isset($_POST['contra'])) {
    $pass = md5($_POST['contra']);
    $sql = "INSERT INTO usuarios (id,usu_nombre,usu_clave,usu_email,foto_perfil,fecha_alta,fecha_baja) VALUES (null,'" . $_POST['nombre'] . "','" . $pass . "','" . ($_POST['email']) . "','default1.png',NOW(),null)";
    $query = mysqli_query($link, $sql);

    if (!$query) {
        echo "Fallo consulta: " . mysqli_error($link);
        exit();
    } else {


        session_start();
        $nombre = $_POST['nombre'];
        $pass = md5($_POST['contra']);
        $sql = "SELECT * FROM usuarios 
            WHERE usu_nombre = '" . $nombre . "'
            AND usu_clave = '" . $pass . "'";
        $result = mysqli_query($link, $sql);

        if (!$result) {
            echo "Fallo consulta: " . mysqli_error($link);
            exit();
        }
        if (mysqli_num_rows($result) == 1) {
            $nombre = $_POST['nombre'];
            $pass = md5($_POST['contra']);
            $sql = "SELECT * FROM usuarios 
            WHERE usu_nombre = '" . $nombre . "'
            AND usu_clave = '" . $pass . "'";
            $result = mysqli_query($link, $sql);

            if (!$result) {
                echo "Fallo consulta: " . mysqli_error($link);
                exit();
            }
            $_SESSION['usuario'] = mysqli_fetch_assoc($result);
            $sql = "INSERT INTO rango_usuario (id,rango_id,usu_id,fecha_alta,fecha_baja) VALUES (null,3,'" . $_SESSION['usuario']['id'] . "',NOW(),null)";
            $query = mysqli_query($link, $sql);
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
            header('Location: index.php');
        }
    }
}
$section = "signup";
require_once "views/layout.php";
