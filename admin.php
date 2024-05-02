<?php
require_once "includes/config.php";
if (session_status() !== PHP_SESSION_ACTIVE) session_start();
if (isset ($_SESSION['usuario']) && $_SESSION['usuario']['nsfw_allow'] == 1) {
    $r18 = 1;
} else {
    $r18 = 0;
}
$sql = "SELECT * FROM usuarios";
$query = mysqli_query($link, $sql);
$usuarios = mysqli_fetch_all($query, MYSQLI_ASSOC);



$section = "admin";
$title = "Administration";
require_once "views/layout.php";