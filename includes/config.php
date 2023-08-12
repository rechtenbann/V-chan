<?php
$link = mysqli_connect("localhost","root","","v-chan");

if(!$link){
    die("No se pudo conectar a la base de datos: ".mysqli_connect_errno());
}
$select="SELECT id FROM posts";
$mysqliquery=mysqli_query($link,$select);

function consulta($query, $link, $option = false)
{
    $execute = mysqli_query($link, $query);
    if (!$execute) {
        die("Error: " . mysqli_error($link));
    }
    if ($option == 1) {
        return mysqli_fetch_assoc($execute);
    } else if ($option == 2) {
        return mysqli_fetch_all($execute, MYSQLI_NUM);
    } else if ($option == 3) {
        return mysqli_num_rows($execute);
    } else if ($option == 4) {
        return;
    } else {
        return mysqli_fetch_all($execute, MYSQLI_ASSOC);
    }
}