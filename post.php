<?php
require_once "includes/config.php";
session_start();
// Obtener imagen y usuario
if (isset($_POST['like'])) {
    $sql = "SELECT * FROM like_post WHERE usuario_id='" . $_SESSION['usuario']['id'] . "' AND post_id = '" . $_GET['id'] . "'";
    $que = mysqli_query($link, $sql);
    $rr = mysqli_num_rows($que);
    if ($rr === 1) {
        $like = mysqli_fetch_assoc($que);
        if ($like['val'] == 1) {
            $sql = "UPDATE like_post SET val=0 WHERE usuario_id='" . $_SESSION['usuario']['id'] . "' AND post_id = '" . $_GET['id'] . "'";
            $query = mysqli_query($link, $sql);
        } else if ($like['val'] == 0) {
            $sql = "UPDATE like_post SET val=1 WHERE usuario_id='" . $_SESSION['usuario']['id'] . "' AND post_id = '" . $_GET['id'] . "'";
            $query = mysqli_query($link, $sql);
        }
    } else {
        $sql = "INSERT INTO like_post (val,usuario_id,post_id,fecha_alta) VALUES (1,'" . $_SESSION['usuario']['id'] . "','" . $_GET['id'] . "',NOW())";
        $query = mysqli_query($link, $sql);
    }
}
$sql = "SELECT u.usu_nombre,u.id ,p.image,p.id as id_post FROM usuarios AS u
INNER JOIN posts AS p 
ON p.id='" . $_GET['id'] . "' AND p.usuario_id=u.id";
$query = mysqli_query($link, $sql);
$postData = mysqli_fetch_assoc($query);

// Obtener fecha de alta del post
$sql = "SELECT fecha_alta FROM posts WHERE posts.id='" . $_GET['id'] . "'";
$query = mysqli_query($link, $sql);
$date = mysqli_fetch_row($query);

// Obtener tags del post
$sql = "SELECT t.id, t.tag FROM tag_post AS tp
INNER JOIN tags AS t ON tp.tag_id = t.id
WHERE tp.post_id = " . $_GET['id'] . " AND tp.fecha_baja IS NULL";
$query = mysqli_query($link, $sql);
$tags = mysqli_fetch_all($query, MYSQLI_ASSOC);

// Insertar nuevas tags
if (isset($_POST['tags'])) {
    $tags_array = preg_split("/[\s,]+/", $_POST['tags']);
    foreach ($tags_array as $new_tag) {
        $sql = "SELECT id FROM tags WHERE tag = '" . mysqli_real_escape_string($link, trim($new_tag)) . "'";
        $query = mysqli_query($link, $sql);
        $existing_tag = mysqli_fetch_row($query);

        if ($existing_tag) {
            $tag_id = $existing_tag[0];
            $sql = "INSERT IGNORE INTO tag_post (post_id, tag_id) VALUES (" . $_GET['id'] . ", $tag_id)";
            mysqli_query($link, $sql);
        } else {
            $sql = "INSERT INTO tags (tag) VALUES ('" . mysqli_real_escape_string($link, trim($new_tag)) . "')";
            mysqli_query($link, $sql);
            $tag_id = mysqli_insert_id($link);
            $sql = "INSERT INTO tag_post (post_id, tag_id) VALUES (" . $_GET['id'] . ", $tag_id)";
            mysqli_query($link, $sql);
        }
    }
    header("Location: post.php?id=" . $_GET['id']);
    exit();
}
///visitas
if (isset($_SESSION['usuario'])) {
    $post_id = $_GET['id'];
    if (!isset($_SESSION['visited_posts'][$post_id])) {
        $sql = "UPDATE posts SET visitas = visitas + 1 WHERE id = ?";
        $stmt = $link->prepare($sql);
        $stmt->bind_param("i", $post_id);
        $stmt->execute();
        
        $_SESSION['visited_posts'][$post_id] = true;
    }
    
    $sql = "SELECT visitas FROM posts WHERE id = ?";
    $stmt = $link->prepare($sql);
    $stmt->bind_param("i", $post_id);
    $stmt->execute();
    $stmt->bind_result($initialVisitCount);
    $stmt->fetch();
    $stmt->close();
}
// Obtener likes y dislikes iniciales
// Obtener el conteo inicial de likes y dislikes
$sql = "SELECT 
            SUM(reaction_type = 'like') AS likes, 
            SUM(reaction_type = 'dislike') AS dislikes 
        FROM post_reactions 
        WHERE post_id = ?";
$stmt = $link->prepare($sql);
$stmt->bind_param("i", $_GET['id']);
$stmt->execute();
$result = $stmt->get_result()->fetch_assoc();

$initialLikes = $result['likes'] ;
$initialDislikes = $result['dislikes'] ;
$totalReactions = $initialLikes + $initialDislikes;
$porcentageGusto = $totalReactions > 0 ? ($initialLikes / $totalReactions) * 100 : 0;


$section = "post";
$title = "Post";
require_once "views/layout.php";
