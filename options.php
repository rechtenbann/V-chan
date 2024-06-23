<?php
require_once "includes/config.php";
session_start();
if (isset($_POST['Options'])&& isset($_POST['DM'])) {
    setcookie("dark_mode",'true', time() + (86400 * 30), "/"); // 86400 = 1 day
     header("Location: options.php");
} else if (isset($_POST['Options'])&& !isset ($_POST['DM'])) {
    setcookie("dark_mode",'false', time() + (86400 * 30), "/"); // 86400 = 1 day
     header("Location: options.php");
 }

$section = "options";
$title = "<a href='settings.php'>Settings</a> / Options";
require_once "views/layout.php";