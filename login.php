<?php
require_once "includes/config.php";
session_start();
if (isset($_POST['nombre']) && isset($_POST['contra'])) {
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
        header('Location: index.php');
    }
}
$section = "login";
require_once "views/layout.php";