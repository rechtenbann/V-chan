<?php
session_start();
session_unset();
session_destroy();
if (isset($_COOKIE["pass"]) && isset($_COOKIE["username"])) {
    setcookie("username", "",time()-60*60*24*30);
    setcookie("pass","",time()-60*60*24*30);
}
header('Location: settings.php');