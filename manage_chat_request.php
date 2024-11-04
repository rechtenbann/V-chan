<?php
session_start();
require_once 'includes/config.php'; // Asegúrate de incluir tu archivo de configuración

// Verifica si el usuario está autenticado
if (!isset($_SESSION['usuario'])) {
    echo "Acceso denegado.";
    exit();
}

$action = $_POST['action'] ?? '';
$senderId = $_POST['sender_id'] ?? '';

// Lógica para manejar la solicitud
if ($action === 'accept') {
    $sql = "UPDATE chat_requests SET status='accepted' WHERE sender_id='$senderId' AND receiver_id='" . $_SESSION['usuario']['id'] . "'";
    mysqli_query($link, $sql);
    header('Location: profile.php?profile='. $_SESSION['usuario']['id']);
    exit();
    echo "aceptaste el chat";
} elseif ($action === 'reject') {
    $sql = "UPDATE chat_requests SET status='rejected' WHERE sender_id='$senderId' AND receiver_id='" . $_SESSION['usuario']['id'] . "'";
    mysqli_query($link, $sql);
    header('Location: profile.php?profile='. $_SESSION['usuario']['id']);
    exit();
    echo "rechazaste el chat";
} else {
    echo "Acción no válida.";
}
?>
