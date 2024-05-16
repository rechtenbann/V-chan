<?php
require_once "includes/config.php";
if (session_status() !== PHP_SESSION_ACTIVE) session_start();

$sql = "SELECT * FROM usuarios";
$query = mysqli_query($link, $sql);
$usuarios = mysqli_fetch_all($query, MYSQLI_ASSOC);

if (isset($_POST['Upgrade'])) {
    $usuid = $_POST['id'];
    $usurnk = $_POST['rnk'];
    // if($usurnk=="administrador"){$usurnk=1;}else if($usurnk=="premium"){$usurnk=2;}else{$usurnk=3;}
    $query = "UPDATE rango_usuario SET rango_id=2 WHERE id='" . $usuid . "'";
    $sql = mysqli_query($link, $query);
    header("Location: admin.php");
}
if (isset($_POST['Downgrade'])) {
    $usuid = $_POST['id'];
    $usurnk = $_POST['rnk'];
    $query = "UPDATE rango_usuario SET rango_id=3 WHERE id='" . $usuid . "'";
    $sql = mysqli_query($link, $query);
    header("Location: admin.php");
}
if (isset($_POST['Admin'])) {
    $usuid = $_POST['id'];
    $usurnk = $_POST['rnk'];
    $query = "UPDATE rango_usuario SET rango_id=1 WHERE id='" . $usuid . "'";
    $sql = mysqli_query($link, $query);
    header("Location: admin.php");
}
if (isset($_POST['NoAdmin'])) {
    $usuid = $_POST['id'];
    $usurnk = $_POST['rnk'];
    $query = "UPDATE rango_usuario SET rango_id=3 WHERE id='" . $usuid . "'";
    $sql = mysqli_query($link, $query);

    header("Location: admin.php");
}
if (isset($_POST['Unban'])) {
    $usuid = $_POST['id'];
    $query = "UPDATE usuarios SET fecha_baja=NULL WHERE id='" . $usuid . "'";
    $sql = mysqli_query($link, $query);
    header("Location: admin.php");
}
if (isset($_POST['Ban'])) {
    $usuid = $_POST['id'];
    $query = "UPDATE usuarios SET fecha_baja=NOW() WHERE id='" . $usuid . "'";
    $sql = mysqli_query($link, $query);
    header("Location: admin.php");
}

$section = "admin";
$title = "Administration";
require_once "views/layout.php";
