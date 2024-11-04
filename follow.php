<?php
session_start();
require_once "includes/config.php"; // Asegúrate de incluir la conexión a la base de datos

if (isset($_POST['user_id'])) {
    $user_id = $_POST['user_id'];
    $follower_id = $_SESSION['usuario']['id']; // Asumiendo que el usuario está logueado

    // Comprobar si ya sigue al usuario
    $stmt = $link->prepare("SELECT * FROM followers_users WHERE user_id = ? AND follower_id = ?");
    $stmt->bind_param("ii", $user_id, $follower_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Ya sigue al usuario, devuelve un mensaje
        echo json_encode(['success' => false, 'message' => 'Ya sigues a este usuario.']);
        exit();
    }

    // Insertar en la tabla followers_users
    $stmt = $link->prepare("INSERT INTO followers_users (user_id, follower_id) VALUES (?, ?)");
    $stmt->bind_param("ii", $user_id, $follower_id);
    $stmt->execute();

    // Actualizar el contador de seguidores del usuario
    $stmt = $link->prepare("UPDATE usuarios SET followers = followers + 1 WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();

    // Obtener el nuevo conteo de seguidores
    $stmt = $link->prepare("SELECT followers FROM usuarios WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->bind_result($new_followers_count);
    $stmt->fetch();

    // Actualiza la variable de sesión de seguidores
    $_SESSION['usuario']['followers'] = $new_followers_count;

    echo json_encode(['success' => true, 'followers_count' => $new_followers_count]);
}
