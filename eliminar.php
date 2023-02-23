<?php
require_once "includes/config.php";
if(isset($_GET['id'])){
    $sql = "DELETE FROM categorias WHERE cat_id = ".$_GET['id'];
    $query = mysqli_query($link,$sql);
    if(!$query){
        die("Error de consulta: ".mysqli_errno($link));
    }
    else{
        header("Location: lista.php");
    }
}