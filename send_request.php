<?php
session_start();
require_once 'includes/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $receiver_id = $_POST['receiver_id'];
    $sender_id = $_SESSION['usuario']['id'];

    // Verificar si ya existe una solicitud entre estos usuarios
    $sql_check = "SELECT status FROM chat_requests WHERE (sender_id = ? AND receiver_id = ?) OR (sender_id = ? AND receiver_id = ?)";
    $stmt_check = $link->prepare($sql_check);
    $stmt_check->bind_param("iiii", $sender_id, $receiver_id, $receiver_id, $sender_id);
    $stmt_check->execute();
    $result_check = $stmt_check->get_result();
    $existing_request = $result_check->fetch_assoc();
    $stmt_check->close();

    if ($existing_request) {
        // Si ya existe una solicitud, actualizar el estado a "pending"
        $sql_update = "UPDATE chat_requests SET status = 'pending', sender_id = ?, receiver_id = ? WHERE (sender_id = ? AND receiver_id = ?) OR (sender_id = ? AND receiver_id = ?)";
        $stmt_update = $link->prepare($sql_update);
        $stmt_update->bind_param("iiiiii", $sender_id, $receiver_id, $sender_id, $receiver_id, $receiver_id, $sender_id);
        if ($stmt_update->execute()) {
            header("Location: profile.php?profile=$receiver_id"); // Redirige de vuelta al perfil
            exit;
        } else {
            echo 'Error al actualizar la solicitud: ' . $stmt_update->error;
        }
        $stmt_update->close();
    } else {
        // Si no existe solicitud, insertar nueva solicitud
        $sql_insert = "INSERT INTO chat_requests (sender_id, receiver_id, status) VALUES (?, ?, 'pending')";
        $stmt_insert = $link->prepare($sql_insert);
        $stmt_insert->bind_param("ii", $sender_id, $receiver_id);
        if ($stmt_insert->execute()) {
            header("Location: profile.php?profile=$receiver_id"); // Redirige de vuelta al perfil
            exit;
        } else {
            echo 'Error al enviar la solicitud: ' . $stmt_insert->error;
        }
        $stmt_insert->close();
    }
}
?>
