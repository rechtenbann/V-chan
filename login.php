<?php
if (!isset($pb)) {
	$log_er = true;
	require_once 'includes/config.php';
}
require_once "includes/config.php";
if (isset($_POST['nombre']) && isset($_POST['contra']) || (isset($_COOKIE["username"]) && isset($_COOKIE["pass"]))) {
    $pass = isset($_POST['contra']) ? $_POST["contra"] : $_COOKIE["pass"];
    $usu = isset($_POST['nombre']) ? $_POST["nombre"] : $_COOKIE["username"];;
    $sql = "SELECT * FROM usuarios WHERE BINARY usu_clave = MD5('" . $pass . "') AND usu_nombre = '" . $usu . "' AND fecha_baja IS NULL";
    $query = mysqli_query($link, $sql);
    $rec=mysqli_fetch_assoc($query);
    if (is_array($rec)) {
        $_SESSION['usuario'] = $rec;
        if (isset($_COOKIE["pass"]) && isset($_COOKIE["username"]) && !isset($pb)) {
			setcookie("username", "", time() - 60);
			setcookie("pass", "", time() - 60);
		}
		if (isset($_POST['cierto']) && $_POST['cierto'] == true) {
			setcookie("username", $username, time() + 60 * 60 * 24 * 30);
			setcookie("pass", $pass, time() + 60 * 60 * 24 * 30);
		}
		if(!isset($pb)){
			echo json_encode(array("exito" => true));
			die();
		}
    }else {
		$sql = "SELECT * FROM usuarios WHERE BINARY email = '" . $usu . "' AND password = MD5('" . $pass . "') AND fecha_baja IS NULL";
		$query = mysqli_query($link,$sql);
        $rec=mysqli_fetch_assoc($query);
		if (is_array($rec)) {
			$_SESSION['usuario'] = $rec;
			if (isset($_COOKIE["pass"]) && isset($_COOKIE["username"]) && !isset($pb)) {
				setcookie("username", "", time() - 60);
				setcookie("pass", "", time() - 60);
			}
			if (isset($_POST['cierto']) && $_POST['cierto'] == true) {
				setcookie("username", $username, time() + 60 * 60 * 24 * 30);
				setcookie("pass", $pass, time() + 60 * 60 * 24 * 30);
			}
			if(!isset($pb)){
				echo json_encode(array("exito" => true));
				die();
			}
		} else {
			echo json_encode(array("error" => true));
			die();
		}
	}
}
    $section = "login";
    $title = "Log In";
    require_once "views/layout.php";


/* if (!$query) {
die("Error de consulta: " . mysqli_errno($link));
}
if (mysqli_num_rows($query) == 1) {
$_SESSION['usuario']['usu_nombre'] = $_POST['nombre'];
header("Location: settings.php");
} else {
header("Location: login.php?li=f");
}*/
?>