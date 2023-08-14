<div>
<?php foreach ($notes as $note) { ?>
                <?php
                $sql = "SELECT * FROM online_chat WHERE fecha_baja IS NULL";
                $query = mysqli_query($link, $sql);
                
                if (!$query) {
                    echo "";
                } else { 
                    $sql = "SELECT usu_nombre FROM online_chat 
                    INNER JOIN usuarios
                    ON usuarios.id = online_chat.usuario_id";
                    $query = mysqli_query($link, $sql);
                    $publisher=mysqli_fetch_assoc($query);
                    
                    $sql = "SELECT foto_perfil FROM usuarios
                    INNER JOIN online_chat
                    ON online_chat.usuario_id = usuarios.id";
                    $query = mysqli_query($link, $sql);
                    $publisherimg=mysqli_fetch_assoc($query);
                    ?>
                <div>
                <span> <a href="profile.php"><img src="img/users/<?php echo $publisherimg['foto_perfil']; ?>" alt="" class="note-img" width="50rem"height="50rem"></a><?php echo $publisher['usu_nombre']; ?></span>
                    <p><?php echo $note['content'] ?></p>
                    <span><?php echo "Publicado en: ".$note['fecha_alta'] ?></span>
                </div>
                <?php } ?>
            <?php
                $cont = $cont + 1;
            } ?>
</div>
<div>
    <form method="post">
        <input type="text" name="note">
        <input type="submit" value="publish">
    </form>
</div>
