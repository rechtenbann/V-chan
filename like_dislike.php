<?php
session_start(); // Asegurarse de iniciar la sesión aquí

require 'includes/config.php';

if (!isset($_SESSION['usuario'])) {
    echo json_encode(['error' => 'User not logged in']);
    exit();
}

$post_id = $_POST['post_id'];
$user_id = $_SESSION['usuario']['id'];
$reaction = $_POST['reaction']; // 'like' o 'dislike'
// Verificar si el usuario ya reaccionó al post
$stmt = $link->prepare("SELECT reaction_type FROM post_reactions WHERE post_id = ? AND user_id = ?");
$stmt->bind_param("ii", $post_id, $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Si ya reaccionó, actualizar su reacción
    $stmt = $link->prepare("UPDATE post_reactions SET reaction_type = ? WHERE post_id = ? AND user_id = ?");
    $stmt->bind_param("sii", $reaction, $post_id, $user_id);
} else {
    // Si no ha reaccionado, insertar la reacción
    $stmt = $link->prepare("INSERT INTO post_reactions (post_id, user_id, reaction_type) VALUES (?, ?, ?)");
    $stmt->bind_param("iis", $post_id, $user_id, $reaction);
}
$stmt->execute();

// Obtener el nuevo conteo de likes y dislikes
$stmt = $link->prepare("SELECT 
                            SUM(reaction_type = 'like') AS likes, 
                            SUM(reaction_type = 'dislike') AS dislikes 
                        FROM post_reactions WHERE post_id = ?");
$stmt->bind_param("i", $post_id);
$stmt->execute();
$result = $stmt->get_result()->fetch_assoc();

echo json_encode(['likes' => $result['likes'], 'dislikes' => $result['dislikes']]);
