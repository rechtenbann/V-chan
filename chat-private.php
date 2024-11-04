<?php
session_start();
require_once "includes/config.php";

// Variables del controlador
$section = "chat-private";
$title = "Chat Privado";

// Obtener el ID del usuario actual y el ID del receptor desde el parámetro GET
$current_user_id = $_SESSION['usuario']['id'];
$profile_id = isset($_GET['chat_with']) ? intval($_GET['chat_with']) : 0;


// Cargar la vista de layout con los parámetros definidos
require_once "views/layout.php";


