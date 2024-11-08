<?php
session_start();
require_once "includes/config.php";
if (isset($_GET['query'])) {
    $query = trim($_GET['query']);
    $input = $query;
    $resultados_tags = [];
    $resultados_users = [];
    $resultados_postsForum = [];
    $global_results = [];
    // Detectar tipo de búsqueda
    if (strpos($input, '#') === 0) { // Búsqueda por tag
        $term = substr($input, 1);
        $sql = $term ? "SELECT * FROM tags WHERE tag LIKE '%$term%'" : "SELECT * FROM tags";
        $query = mysqli_query($link, $sql);
        $resultados_tags = mysqli_fetch_all($query, MYSQLI_ASSOC);
    } elseif (strpos($input, '@') === 0) { // Búsqueda de usuario
        $username = substr($input, 1);
        $sql = $username ? "SELECT usuarios.*,rangos.rango FROM usuarios INNER JOIN rango_usuario ON usuarios.id = rango_usuario.usu_id INNER JOIN rangos on rango_usuario.rango_id= rangos.id WHERE usu_nombre LIKE '%$username%'" : "SELECT usuarios.*,rangos.rango FROM usuarios INNER JOIN rango_usuario ON usuarios.id = rango_usuario.usu_id INNER JOIN rangos on rango_usuario.rango_id= rangos.id";
        $query = mysqli_query($link, $sql);
        $resultados_users = mysqli_fetch_all($query, MYSQLI_ASSOC);
    } elseif (strpos($input, '/') === 0) { // Búsqueda de foro
        $forum = substr($input, 1);
        $sql = $forum ? "SELECT * FROM forum WHERE title LIKE '%$forum%'" : "SELECT * FROM forum";
        $query = mysqli_query($link, $sql);
        $resultados_postsForum = mysqli_fetch_all($query, MYSQLI_ASSOC);
    } elseif (strpos($input, 'RLLVTeam') === 0) { // Búsqueda de foro
        if($_SESSION['usuario']['rango']=="administrador"||$_SESSION['usuario']['rango']=="premium"){
            header("location: ee.php");
           }else{
            // Búsqueda global sin acortador
            // Consulta de tags
            $sql_tags = "SELECT * FROM tags WHERE tag LIKE '%$input%'";
            $query_tags = mysqli_query($link, $sql_tags);
            $global_results['tags'] = mysqli_fetch_all($query_tags, MYSQLI_ASSOC);
    
            // Consulta de usuarios
            $sql_users = "SELECT usuarios.*,rangos.rango FROM usuarios INNER JOIN rango_usuario ON usuarios.id = rango_usuario.usu_id INNER JOIN rangos on rango_usuario.rango_id= rangos.id WHERE usu_nombre LIKE '%$input%'";
            $query_users = mysqli_query($link, $sql_users);
            $global_results['users'] = mysqli_fetch_all($query_users, MYSQLI_ASSOC);
    
            // Consulta de foros
            $sql_forums = "SELECT * FROM forum WHERE title LIKE '%$input%'";
            $query_forums = mysqli_query($link, $sql_forums);
            $global_results['post_forum'] = mysqli_fetch_all($query_forums, MYSQLI_ASSOC);
           }
    }elseif (strpos($input, 'secc') === 0) { // Búsqueda de foro
       if($_SESSION['usuario']['rango']=="administrador"){
        header("location: profile.php?profile=".$_SESSION['usuario']['id']."&RLLVTeam=t");
       }else{
        // Búsqueda global sin acortador
        // Consulta de tags
        $sql_tags = "SELECT * FROM tags WHERE tag LIKE '%$input%'";
        $query_tags = mysqli_query($link, $sql_tags);
        $global_results['tags'] = mysqli_fetch_all($query_tags, MYSQLI_ASSOC);

        // Consulta de usuarios
        $sql_users = "SELECT usuarios.*,rangos.rango FROM usuarios INNER JOIN rango_usuario ON usuarios.id = rango_usuario.usu_id INNER JOIN rangos on rango_usuario.rango_id= rangos.id WHERE usu_nombre LIKE '%$input%'";
        $query_users = mysqli_query($link, $sql_users);
        $global_results['users'] = mysqli_fetch_all($query_users, MYSQLI_ASSOC);

        // Consulta de foros
        $sql_forums = "SELECT * FROM forum WHERE title LIKE '%$input%'";
        $query_forums = mysqli_query($link, $sql_forums);
        $global_results['post_forum'] = mysqli_fetch_all($query_forums, MYSQLI_ASSOC);
       }
    }     else {
        // Búsqueda global sin acortador
        // Consulta de tags
        $sql_tags = "SELECT * FROM tags WHERE tag LIKE '%$input%'";
        $query_tags = mysqli_query($link, $sql_tags);
        $global_results['tags'] = mysqli_fetch_all($query_tags, MYSQLI_ASSOC);

        // Consulta de usuarios
        $sql_users = "SELECT usuarios.*,rangos.rango FROM usuarios INNER JOIN rango_usuario ON usuarios.id = rango_usuario.usu_id INNER JOIN rangos on rango_usuario.rango_id= rangos.id WHERE usu_nombre LIKE '%$input%'";
        $query_users = mysqli_query($link, $sql_users);
        $global_results['users'] = mysqli_fetch_all($query_users, MYSQLI_ASSOC);

        // Consulta de foros
        $sql_forums = "SELECT * FROM forum WHERE title LIKE '%$input%'";
        $query_forums = mysqli_query($link, $sql_forums);
        $global_results['post_forum'] = mysqli_fetch_all($query_forums, MYSQLI_ASSOC);
    }
}


$section = "result_search";
$title = "Result Search";
require_once "views/layout.php";
