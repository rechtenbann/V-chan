<?php
session_start();
require_once 'includes/config.php'; // Asegúrate de incluir tu archivo de configuración para la conexión a la base de datos

// Verifica si la sesión está activa y si el usuario está autenticado
if (!isset($_SESSION['usuario'])) {
    echo "Acceso denegado. Por favor inicie sesión.";
    exit();
}

// Obtiene la sección desde la solicitud POST
$section = $_POST['section'] ?? '';

switch ($section) {
    case 'posts':
        include 'posts.php'; // Asegúrate de que este archivo contenga el código para mostrar las publicaciones
        break;
    case 'preguntas':
        include 'preguntas.php'; // Asegúrate de que este archivo contenga el código para mostrar las preguntas del foro
        break;
    case 'notificaciones':
        include 'notifications.php'; // Incluye el archivo que maneja las notificaciones
        break;
    case 'chats':
        include 'chats.php'; // Asegúrate de que este archivo contenga el código para mostrar los chats
        break;
    default:
        echo "Sección no disponible."; // Mensaje en caso de que la sección no sea válida
}

// Cierre de la conexión a la base de datos, si es necesario
// mysqli_close($link); // Descomenta esto si has abierto una conexión en config.php
?>
