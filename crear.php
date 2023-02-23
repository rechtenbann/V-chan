<?php
require_once "includes/config.php";
if(isset($_POST['nombre'])){
    $sql = "INSERT INTO categorias(cat_nombre) VALUES('".$_POST['nombre']."')";
    $query = mysqli_query($link,$sql);
    if(!$query){
        die("Error de consulta: ".mysqli_errno($link));
    }
    header("Location: lista.php");
}
?>
<form method="POST">
    <label>Nombre de la categoria</label>
    <input type="text" name="nombre" required>
    <input type="submit">
</form>