<?php
require_once "includes/config.php";
session_start();
if (isset ($_POST['Options']) && $_POST['NSFW']) {
    $sql = "UPDATE usuarios SET nsfw_allow = 1 WHERE id = '" . $_SESSION['usuario']['id'] . "'";
    $query = mysqli_query($link, $sql);
    $_SESSION['usuario']['nsfw_allow'] = 1;
    header("Location: index.php");
} else if (isset ($_POST['Options']) && !$_POST['NSFW']) {
    $sql = "UPDATE usuarios SET nsfw_allow = 0 WHERE id = '" . $_SESSION['usuario']['id'] . "'";
    $query = mysqli_query($link, $sql);
    $_SESSION['usuario']['nsfw_allow'] = 0;
    header("Location: index.php");
}

if (isset ($_POST['Options']) && $_POST['DM']) {
    $sql = "UPDATE usuarios SET dark_mode = 1 WHERE id = '" . $_SESSION['usuario']['id'] . "'";
    $query = mysqli_query($link, $sql);
    $_SESSION['usuario']['dark_mode'] = 1;
    header("Location: index.php");
} else if (isset ($_POST['Options']) && !$_POST['NSFW']) {
    $sql = "UPDATE usuarios SET dark_mode = 0 WHERE id = '" . $_SESSION['usuario']['id'] . "'";
    $query = mysqli_query($link, $sql);
    $_SESSION['usuario']['dark_mode'] = 0;
    header("Location: index.php");
}
$section = "options";
$title = "Options";
require_once "views/layout.php";