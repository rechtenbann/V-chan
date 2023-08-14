<?php foreach ($notes as $note) {
    $query = "SELECT usuarios.id,usuarios.usu_nombre,usuarios.foto_perfil FROM usuarios LEFT JOIN online_chat ON online_chat.usuario_id = usuarios.id WHERE online_chat.id = '" . $note['id'] . "'";
    $query = mysqli_query($link, $query);
    $usudata = mysqli_fetch_assoc($query);
    $sql = "SELECT * FROM online_chat WHERE fecha_baja IS NULL";
    $query = mysqli_query($link, $sql);
    if (!$query) {
        echo "";
    } else { ?>
        <div style="margin: auto; width: 80%; border: 3px solid black; padding: 10px; background-color:white;">
            <div style="display: inline-block;"><a href="profile.php?usr=<?php echo $usudata['id'] ?>"><img src="img/users/<?php echo $usudata['foto_perfil']; ?>" alt="" class="note-img" width="50rem" height="50rem" style="vertical-align: middle;"></a></div>
            <div style="display: inline-block;"><a href="profile.php?usr=<?php echo $usudata['id'] ?>"><b><?php echo $usudata['usu_nombre']; ?></b></a> <?php echo "Publicado en: " . $note['fecha_alta'] ?></div>
            <br><br>
            <p><?php echo $note['content'] ?></p>
        </div>
        <br><br>
    <?php } ?>
<?php
    $cont = $cont + 1;
} ?>
<div class="paginador" style="text-align: center;">
    <p>
        <?php for ($i = 1; $i <= ceil(intval($cant["n"]) / 4); $i++) { ?>
            <a href="chat.php?pag=<?php echo $i; ?>"><button><?php echo $i; ?></button></a>
        <?php } ?>
    </p>
</div>
<?php if (isset($_SESSION['usuario'])) { ?>
<div style="position: fixed; bottom: 0; right: 0; width: 300px; border: 3px solid #73AD21;">
    <form method="post">
        <input type="text" name="note" style="width: 75%;">
        <input type="submit" value="publish" style="float: right; width:22%">
    </form>
</div>
<?php } ?>