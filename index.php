<?php
require_once "includes/config.php";
if(!isset($_COOKIE['dark_mode'])){
    setcookie("dark_mode",'false', time() + (86400 * 30), "/"); // 86400 = 1 day
}
$section = "home";
$title = "Home";
require_once "views/layout.php";