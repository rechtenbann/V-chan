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
} else if (isset($_POST['v2'])) {
    $img = $_POST['v2'];
    $sql = "UPDATE usuarios SET foto_perfil = '" . $img . "' WHERE ID = '" . $_SESSION['usuario']['id'] . "'";
    $query = mysqli_query($link, $sql);
    if (!$query) {
        echo "Fallo consulta: " . mysqli_error($link);
        exit();
    }
    $_SESSION['usuario']['foto_perfil'] = $img;
}
if (isset($_GET['profile'])) {
    $sql = "SELECT * FROM usuarios WHERE id = '" . $_GET['profile'] . "'";
    $query = mysqli_query($link, $sql);
    $user = mysqli_fetch_assoc($query);

    $sql = "SELECT r.rango FROM rango_usuario AS ru
INNER JOIN rangos AS r
ON ru.rango_id = r.id
WHERE ru.usu_id = " . $_GET['profile'] . " AND
fecha_baja IS NULL";
    $rec = mysqli_query($link, $sql);
    $userrank = mysqli_fetch_assoc($rec);
}
if (isset($_GET['profile']) && $_GET['profile'] != $_SESSION['usuario']['id']) {
    $userId = intval($_GET['profile']); // Sanitiza el ID recibido
    $sql = "SELECT * FROM usuarios WHERE id = '$userId'";
    $query = mysqli_query($link, $sql);
    $user = mysqli_fetch_assoc($query);
    $sqlRank = "SELECT r.rango FROM rango_usuario AS ru
                INNER JOIN rangos AS r ON ru.rango_id = r.id
                WHERE ru.usu_id = '$userId' AND fecha_baja IS NULL";
    $rec = mysqli_query($link, $sqlRank);
    $userrank = mysqli_fetch_assoc($rec);

    $title = "User Profile";
} else {
    $user = $_SESSION['usuario'];
    $title = "My Profile";
}
////CAHTA
$sender_id = $_SESSION['usuario']['id'];
$receiver_id = $user['id']; // Asumiendo que `$user['id']` es el ID del usuario del perfil actual
$query = "SELECT status, sender_id, receiver_id FROM chat_requests 
          WHERE (sender_id = ? AND receiver_id = ?) OR (sender_id = ? AND receiver_id = ?)";
$stmt = $link->prepare($query);
$stmt->bind_param("iiii", $sender_id, $receiver_id, $receiver_id, $sender_id);
$stmt->execute();
$result = $stmt->get_result();
$request = $result->fetch_assoc();
$status = $request['status'] ?? null; 

////seguidores
$is_sender = $request && $request['sender_id'] == $sender_id;
$current_user_id = $_SESSION['usuario']['id'];
$user_id = $_GET['profile'];
$stmt = $link->prepare("SELECT * FROM followers_users WHERE user_id = ? AND follower_id = ?");
$stmt->bind_param("ii", $user_id, $current_user_id);
$stmt->execute();
$result = $stmt->get_result();
$is_following = ($result->num_rows > 0);
/////siguiemdo de my perfil
$stmt1 = $link->prepare("SELECT COUNT(*) as siguiendo FROM followers_users WHERE follower_id = ?");
$stmt1->bind_param("i", $current_user_id);
$stmt1->execute();
$result1 = $stmt1->get_result();
$row1 = $result1->fetch_assoc();
$seguidos_count = $row1['siguiendo'];
//////siegueindpo de ptro usaurios
$stmt2 = $link->prepare("SELECT COUNT(*) as siguiendo FROM followers_users WHERE follower_id = ?");
$stmt2->bind_param("i", $user_id);
$stmt2->execute();
$result2 = $stmt2->get_result();
$row2 = $result2->fetch_assoc();
$seguidos_count2 = $row2['siguiendo'];
$section = "profile";
require_once "views/layout.php";
