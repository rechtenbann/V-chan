<link rel="stylesheet" href="css/search.css">

<?php if (!empty($resultados_tags)) { ?>
    <h2>Etiquetas Encontradas:</h2>
    <ul>
        <?php foreach ($resultados_tags as $resultado) { ?>
            <li>
                <a href="posts.php?tag=<?php echo $resultado['id']; ?>"><?php echo htmlspecialchars($resultado['tag']); ?></a>
            </li>
        <?php } ?>
    </ul>
<?php } ?>

<!-- Resultados para usuarios -->
<?php if (!empty($resultados_users)) { ?>
    <h2>Usuarios Encontrados:</h2>
    <div class="users-container">
        <?php foreach ($resultados_users as $user) { ?>
            <section class="carta">
                <img src="img/blanco.jpg" alt="Fondo de la carta" class="fondoCarta">
                <img src="img/users/<?php echo $user['foto_perfil']; ?>" alt="Foto de perfil" class="fotoPerfil">
                <p><?php echo $user['usu_nombre']; ?></p>
                <p>Cargo</p>
                <section class="boton_boton">
                    <button id="botonSeguir">Enviar Mensaje</button>
                </section>
                <section class="influencia">
                    <div>8,000</div>
                    <div>Seguidores</div>
                    <div>1,000</div>
                    <div>Seguidos</div>
                </section>
                <section class="boton_boton">
                    <button id="botonSeguir">Seguir</button>
                </section>
            </section>
        <?php } ?>
    </div>
<?php } ?>

<!-- Resultados para foros -->
<?php if (!empty($resultados_postsForum)) { ?>
    <h2>Foros Encontrados:</h2>
    <div class="Cointer_searchForum">
        <?php foreach ($resultados_postsForum as $question) { ?>
            <div onclick="window.location='question.php?id=<?php echo $question['id'] ?>';" class="card_searchUser">
                <div style="padding-top: 1rem;">
                    <a href="question.php?id=<?php echo $question['id'] ?>" class="ace link_searchForum"><?php echo $question['title']; ?></a>
                </div>
                <div style="width:100%; padding-top:1rem;">
                    <?php
                    $sql = "SELECT foto_perfil FROM usuarios WHERE id='" . $question['uid'] . "'";
                    $query = mysqli_query($link, $sql);
                    $img = mysqli_fetch_assoc($query);
                    ?>
                    <img src="img/users/<?php echo $img['foto_perfil']; ?>" class="img_cardSearch">
                </div>
            </div>
        <?php } ?>
    </div>
<?php } ?>

<?php if (!empty($global_results['tags'])) { ?>
    <h2>Etiquetas Encontradas:</h2>
    <ul>
        <?php foreach ($global_results['tags'] as $tag) { ?>
            <li>
                <a href="posts.php?tag=<?php echo $tag['id']; ?>"><?php echo htmlspecialchars($tag['tag']); ?></a>
            </li>
        <?php } ?>
    </ul>
<?php } ?>

<!-- Resultados para usuarios -->
<?php if (!empty($global_results['users'])) { ?>
    <h2>Usuarios Encontrados:</h2>
    <div class="users-container">
        <?php foreach ($global_results['users'] as $user) { ?>
            <section class="carta">
                <img src="img/fondo_example.jpg" alt="Fondo de la carta" class="fondoCarta">
                <img src="img/users/<?php echo $user['foto_perfil']; ?>" alt="Foto de perfil" class="fotoPerfil">
                <p><?php echo $user['usu_nombre']; ?></p>
                <p>Cargo</p>
                <section class="boton_boton">
                    <button id="botonSeguir">Enviar Mensaje</button>
                </section>
                <section class="influencia">
                    <div>8,000</div>
                    <div>Seguidores</div>
                    <div>1,000</div>
                    <div>Seguidos</div>
                </section>
                <section class="boton_boton">
                    <button id="botonSeguir">Seguir</button>
                </section>
            </section>
        <?php } ?>
    </div>
<?php } ?>

<!-- Resultados para foros -->
<?php if (!empty($global_results['post_forum'])) { ?>
    <h2>Foros Encontrados:</h2>
    <div class="Cointer_searchForum">
        <?php foreach ($global_results['post_forum'] as $forum) { ?>
            <div onclick="window.location='question.php?id=<?php echo $forum['id'] ?>';" class="card_searchUser">
                <div style="padding-top: 1rem;">
                    <a href="question.php?id=<?php echo $forum['id'] ?>" class="ace link_searchForum"><?php echo $forum['title']; ?></a>
                </div>
                <div style="width:100%; padding-top:1rem;">
                    <?php
                    $sql = "SELECT foto_perfil FROM usuarios WHERE id='" . $forum['uid'] . "'";
                    $query = mysqli_query($link, $sql);
                    $img = mysqli_fetch_assoc($query);
                    ?>
                    <img src="img/users/<?php echo $img['foto_perfil']; ?>" class="img_cardSearch">
                </div>
            </div>
        <?php } ?>
    </div>
<?php } ?>

<?php
// Si no hay resultados en ninguna de las categorías
if (empty($global_results['tags']) && empty($global_results['users']) && empty($global_results['post_forum']) && empty($resultados_tags) && empty($resultados_postsForum) && empty($resultados_users)) {
    echo "<h2>No se encontraron resultados para \"" . htmlspecialchars($input) . "\".</h2>";
}
?>
<script src="js/search.js"></script>