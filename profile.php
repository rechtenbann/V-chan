<?php
require_once "includes/config.php";
if(session_status() !== PHP_SESSION_ACTIVE)session_start();
$sql = "SELECT * FROM usuarios";
 if(isset($_POST['nombre'])&&$_POST['nombre']!=$_SESSION['usuario']['usu_nombre']){
    $nombre = $_POST['nombre'];
    $sql = "UPDATE usuarios SET usu_nombre = '".$nombre."' WHERE ID = '".$_SESSION['usuario']['id']."'";
    $query = mysqli_query($link,$sql);
    if (!$query) {
        echo "Fallo consulta: " . mysqli_error($link);
        exit();
    }
    $_SESSION['usuario']['nombre'] = $nombre;
 }


 if(isset($_POST['actpass'])&&isset($_POST['newpass'])&&md5($_POST['actpass'])==$_SESSION['usuario']['usu_clave']){
    $contra = md5($_POST['newpass']);
    $sql = "UPDATE usuarios SET usu_clave = '".$contra."' WHERE ID = '".$_SESSION['usuario']['id']."'";
    $query = mysqli_query($link,$sql);
    if (!$query) {
        echo "Fallo consulta: " . mysqli_error($link);
        exit();
    }
    $_SESSION['usuario']['usu_clave'] = $contra;
 }

 if(isset($_POST['default1'])){
    $img = $_POST['default1'];
    $sql = "UPDATE usuarios SET foto_perfil = '".$img."' WHERE ID = '".$_SESSION['usuario']['id']."'";
    $query = mysqli_query($link,$sql);
    if (!$query) {
        echo "Fallo consulta: " . mysqli_error($link);
        exit();
    }
    $_SESSION['usuario']['foto_perfil'] = $img;

 }else if(isset($_POST['default2'])){
    $img = $_POST['default2'];
    $sql = "UPDATE usuarios SET foto_perfil = '".$img."' WHERE ID = '".$_SESSION['usuario']['id']."'";
    $query = mysqli_query($link,$sql);
    if (!$query) {
        echo "Fallo consulta: " . mysqli_error($link);
        exit();
    }
    $_SESSION['usuario']['foto_perfil'] = $img;

 }else if(isset($_POST['default3'])){
    $img = $_POST['default3'];
    $sql = "UPDATE usuarios SET foto_perfil = '".$img."' WHERE ID = '".$_SESSION['usuario']['id']."'";
    $query = mysqli_query($link,$sql);
    if (!$query) {
        echo "Fallo consulta: " . mysqli_error($link);
        exit();
    }
    $_SESSION['usuario']['foto_perfil'] = $img;
    
 }else if(isset($_POST['default4'])){
    $img = $_POST['default4'];
    $sql = "UPDATE usuarios SET foto_perfil = '".$img."' WHERE ID = '".$_SESSION['usuario']['id']."'";
    $query = mysqli_query($link,$sql);
    if (!$query) {
        echo "Fallo consulta: " . mysqli_error($link);
        exit();
    }
    $_SESSION['usuario']['foto_perfil'] = $img;
 }else if(isset($_POST['default5'])){
    $img = $_POST['default5'];
    $sql = "UPDATE usuarios SET foto_perfil = '".$img."' WHERE ID = '".$_SESSION['usuario']['id']."'";
    $query = mysqli_query($link,$sql);
    if (!$query) {
        echo "Fallo consulta: " . mysqli_error($link);
        exit();
    }
    $_SESSION['usuario']['foto_perfil'] = $img;
 }else if(isset($_POST['default6'])){
    $img = $_POST['default6'];
    $sql = "UPDATE usuarios SET foto_perfil = '".$img."' WHERE ID = '".$_SESSION['usuario']['id']."'";
    $query = mysqli_query($link,$sql);
    if (!$query) {
        echo "Fallo consulta: " . mysqli_error($link);
        exit();
    }
    $_SESSION['usuario']['foto_perfil'] = $img;
 }else if(isset($_POST['upload'])&&isset($_FILES['upload'])){
   
 }
$section = "profile";
$title = "Profile";
require_once "views/layout.php";