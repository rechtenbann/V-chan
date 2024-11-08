<?php
session_start();
require_once 'includes/config.php'; 

if (!isset($_SESSION['usuario'])) {
    echo "Acceso denegado. Por favor inicie sesión.";
    exit();
}

$section = $_POST['section'] ?? '';

switch ($section) {
    // case 'posts':
    //     include 'posts.php'; 
    //     break;
    // case 'preguntas':
    //     include 'preguntas.php'; 
    //     break;
    case 'notificaciones':
        include 'notifications.php';
        break;
    case 'chats':
        include 'chats.php';
        break;
    default:
        echo "Sección no disponible."; 
}

?>
