<?php
require_once "includes/config.php";
if (session_status() !== PHP_SESSION_ACTIVE) session_start();
$sql = "SELECT * FROM usuarios";
if (isset($_POST['nombre']) && $_POST['nombre'] != $_SESSION['usuario']['usu_nombre']) {
    $nombre = $_POST['nombre'];
    $sql = "UPDATE usuarios SET usu_nombre = '" . $nombre . "' WHERE ID = '" . $_SESSION['usuario']['id'] . "'";
    $query = mysqli_query($link, $sql);
    if (!$query) {
        echo "Fallo consulta: " . mysqli_error($link);
        exit();
    }
    $_SESSION['usuario']['nombre'] = $nombre;
}

if (isset($_POST['nombre']) && $_POST['nombre'] != $_SESSION['usuario']['usu_nombre']) {
    $nombre = $_POST['nombre'];
    $sql = "UPDATE usuarios SET usu_nombre = '" . $nombre . "' WHERE ID = '" . $_SESSION['usuario']['id'] . "'";
    $query = mysqli_query($link, $sql);
    if (!$query) {
        echo "Fallo consulta: " . mysqli_error($link);
        exit();
    }
    $_SESSION['usuario']['nombre'] = $nombre;
}


if (isset($_POST['actpass']) && isset($_POST['newpass']) && md5($_POST['actpass']) == $_SESSION['usuario']['usu_clave']) {
    $contra = md5($_POST['newpass']);
    $sql = "UPDATE usuarios SET usu_clave = '" . $contra . "' WHERE ID = '" . $_SESSION['usuario']['id'] . "'";
    $query = mysqli_query($link, $sql);
    if (!$query) {
        echo "Fallo consulta: " . mysqli_error($link);
        exit();
    }
    $_SESSION['usuario']['usu_clave'] = $contra;
}

if (isset($_POST['default1'])) {
    $img = $_POST['default1'];
    $sql = "UPDATE usuarios SET foto_perfil = '" . $img . "' WHERE ID = '" . $_SESSION['usuario']['id'] . "'";
    $query = mysqli_query($link, $sql);
    if (!$query) {
        echo "Fallo consulta: " . mysqli_error($link);
        exit();
    }
    $_SESSION['usuario']['foto_perfil'] = $img;
} else if (isset($_POST['default2'])) {
    $img = $_POST['default2'];
    $sql = "UPDATE usuarios SET foto_perfil = '" . $img . "' WHERE ID = '" . $_SESSION['usuario']['id'] . "'";
    $query = mysqli_query($link, $sql);
    if (!$query) {
        echo "Fallo consulta: " . mysqli_error($link);
        exit();
    }
    $_SESSION['usuario']['foto_perfil'] = $img;
} else if (isset($_POST['default3'])) {
    $img = $_POST['default3'];
    $sql = "UPDATE usuarios SET foto_perfil = '" . $img . "' WHERE ID = '" . $_SESSION['usuario']['id'] . "'";
    $query = mysqli_query($link, $sql);
    if (!$query) {
        echo "Fallo consulta: " . mysqli_error($link);
        exit();
    }
    $_SESSION['usuario']['foto_perfil'] = $img;
} else if (isset($_POST['default4'])) {
    $img = $_POST['default4'];
    $sql = "UPDATE usuarios SET foto_perfil = '" . $img . "' WHERE ID = '" . $_SESSION['usuario']['id'] . "'";
    $query = mysqli_query($link, $sql);
    if (!$query) {
        echo "Fallo consulta: " . mysqli_error($link);
        exit();
    }
    $_SESSION['usuario']['foto_perfil'] = $img;
} else if (isset($_POST['default5'])) {
    $img = $_POST['default5'];
    $sql = "UPDATE usuarios SET foto_perfil = '" . $img . "' WHERE ID = '" . $_SESSION['usuario']['id'] . "'";
    $query = mysqli_query($link, $sql);
    if (!$query) {
        echo "Fallo consulta: " . mysqli_error($link);
        exit();
    }
    $_SESSION['usuario']['foto_perfil'] = $img;
} else if (isset($_POST['default6'])) {
    $img = $_POST['default6'];
    $sql = "UPDATE usuarios SET foto_perfil = '" . $img . "' WHERE ID = '" . $_SESSION['usuario']['id'] . "'";
    $query = mysqli_query($link, $sql);
    if (!$query) {
        echo "Fallo consulta: " . mysqli_error($link);
        exit();
    }
    $_SESSION['usuario']['foto_perfil'] = $img;
} else if (isset($_POST['default-secret'])) {
    $img = $_POST['default-secret'];
    $sql = "UPDATE usuarios SET foto_perfil = '" . $img . "' WHERE ID = '" . $_SESSION['usuario']['id'] . "'";
    $query = mysqli_query($link, $sql);
    if (!$query) {
        echo "Fallo consulta: " . mysqli_error($link);
        exit();
    }
    $_SESSION['usuario']['foto_perfil'] = $img;
}
if (isset($_POST['upload']) && isset($_FILES['upload'])) {
    $nombre = $_SESSION['usuario']['id'];
    mkdir("img/users/" . $nombre . "");
    if ($_SESSION['usuario']['foto_perfil'] != "../../default1.png" && $_SESSION['usuario']['foto_perfil'] != "../../default2.png" && $_SESSION['usuario']['foto_perfil'] != "../../default3.png" && $_SESSION['usuario']['foto_perfil'] != "../../default4.png" && $_SESSION['usuario']['foto_perfil'] != "../../default5.png" && $_SESSION['usuario']['foto_perfil'] != "../../default6.png") {
        unlink("img/users/" . $_SESSION['usuario']['id'] . "/" . $_SESSION['usuario']['foto_perfil']);
    }
    $ruta = "img/users/" . $nombre . "/" . $_FILES['upload']['name'];
    $nombre_imagen = $_FILES['upload']['name'];
    $ruta2 = $nombre_imagen;
    if (move_uploaded_file($_FILES['upload']['tmp_name'], $ruta)) {
        $query = "UPDATE usuarios SET foto_perfil = '" . $ruta2 . "' WHERE id = '" . $nombre . "';";
        mysqli_query($$link, $query, 4);
        $_SESSION['usuario']['foto_perfil'] = $ruta2;
        header("Location: profile.php");
    } else {
        echo "No se pudo subir la imagen";
    }
}
if (isset($_GET['usr'])) {
    $sql = "SELECT * FROM usuarios WHERE id = '" . $_GET['usr'] . "'";
    $query = mysqli_query($link, $sql);
    $user = mysqli_fetch_assoc($query);

    $sql = "SELECT r.rango FROM rango_usuario AS ru
INNER JOIN rangos AS r
ON ru.rango_id = r.id
WHERE ru.usu_id = " . $_GET['usr'] . " AND
fecha_baja IS NULL";
    $rec = mysqli_query($link, $sql);
    $userrank = mysqli_fetch_assoc($rec);
}
$section = "profile";
$title = "Profile";
require_once "views/layout.php";
