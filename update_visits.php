<?php
require_once "includes/config.php";
session_start();

$post_id = $_GET['id'] ?? null;

if ($post_id) {
    // Verificar si el usuario ya ha visitado el post
    if (!isset($_SESSION['visited_posts'][$post_id])) {
        // Incrementar visitas en la base de datos
        $sql = "UPDATE posts SET visitas = visitas + 1 WHERE id = ?";
        $stmt = $link->prepare($sql);
        $stmt->bind_param("i", $post_id);
        $stmt->execute();
        $stmt->close();

        // Marcar el post como visitado en esta sesión
        $_SESSION['visited_posts'][$post_id] = true;
    }

    // Obtener el conteo actualizado de visitas
    $sql = "SELECT visitas FROM posts WHERE id = ?";
    $stmt = $link->prepare($sql);
    $stmt->bind_param("i", $post_id);
    $stmt->execute();
    $stmt->bind_result($visitCount);
    $stmt->fetch();
    $stmt->close();

    // Responder con el conteo actualizado de visitas en JSON
    echo json_encode(['visitas' => $visitCount]);
}
?>
