<link rel="stylesheet" href="css/search.css">

<?php
if (!empty($resultados_tags)) { ?>
    <h2>Etiquetas Encontradas:</h2>
    <ul>
        <?php foreach ($resultados_tags as $resultado) { ?>
            <li style="list-style-type: none;">
            ▸ <a class="tag" href="posts.php?pag=1&tag=<?php echo $resultado['id']; ?>"
                    style="display:inline-block; color: #212121;"><?php echo $resultado['tag'] ?></a>
            </li>
        <?php } ?>
    </ul>
<?php } ?>

<!-- Resultados para usuarios -->
<?php if (!empty($resultados_users)) { ?>
    <h2>Usuarios Encontrados:</h2>
    <div class="users-container">
        <?php foreach ($resultados_users as $user) {
            // Verifica si el usuario está logueado
            $isLoggedIn = isset($_SESSION['usuario']);
            $isCurrentUser = $isLoggedIn && ($user['id'] == $_SESSION['usuario']['id']);

            // Variables solo si está logueado
            if ($isLoggedIn) {
                $sender_id = $_SESSION['usuario']['id'];
                $receiver_id = $user['id'];
                $query = "SELECT status FROM chat_requests 
                  WHERE (sender_id = ? AND receiver_id = ?) OR (sender_id = ? AND receiver_id = ?)";
                $stmt = $link->prepare($query);
                $stmt->bind_param("iiii", $sender_id, $receiver_id, $receiver_id, $sender_id);
                $stmt->execute();
                $result = $stmt->get_result();
                $request = $result->fetch_assoc();
                $status = $request['status'] ?? null; // Puede ser 'pending', 'rejected', 'accepted' o null si no hay solicitud
            }
        ?>
            <section class="carta">
                <img src="img/blanco.jpg" alt="Fondo de la carta" class="fondoCarta">
                <a href="profile.php?profile=<?php echo $user['id']; ?>">
                    <img src="img/users/<?php echo $user['foto_perfil']; ?>" alt="Foto de perfil" class="fotoPerfil" style="background-color: white;aspect-ratio: 1 / 1;">
                </a>
                <p style="color:white;font-family:AnimeAce"><?php echo $isCurrentUser ? "Tu Perfil" : $user['usu_nombre']; ?></p>

                <?php if ($isLoggedIn && !$isCurrentUser) { ?>
                    <p style="color:white;"><?php echo $user['rango']; ?></p>
                    <section class="boton_boton">
                        <?php if ($status === 'accepted') { ?>
                            <a href="chat-private.php?chat_with=<?php echo $user['id']; ?>">
                                <button id="botonSeguir">Ir al Chat</button>
                            </a>
                        <?php } elseif ($status === 'pending') { ?>
                            <button class="botonRayas" disabled>Solicitud Enviada</button>
                        <?php } else { ?>
                            <form method="post" action="send_request.php">
                                <input type="hidden" name="receiver_id" value="<?php echo $receiver_id; ?>">
                                <input id="botonSeguir" type="submit" value="Enviar Mensaje">
                            </form>
                        <?php } ?>
                    </section>
                <?php } ?>

                <section class="influencia">
                    <div class="seguidores">
                    <?php $sql="SELECT COUNT(*) AS followers FROM followers_users WHERE user_id='".$user['id']."'";
                $query=mysqli_query($link,$sql);
                $folr=mysqli_fetch_assoc($query)?>
                <p class="numero"><?php echo $folr['followers']?></p>
                        <p class="label">Seguidores</p>
                    </div>
                    <div class="seguidos">
                    <?php $sql="SELECT COUNT(*) AS followers FROM followers_users WHERE follower_id='".$user['id']."'";
                $query=mysqli_query($link,$sql);
                $fold=mysqli_fetch_assoc($query)?>
                <p class="numero"><?php echo $fold['followers']?></p>
                        <p class="label">Seguidos</p>
                    </div>
                </section>

                <?php if ($isLoggedIn && !$isCurrentUser) { ?>
                    <section class="boton_boton">
                        <button id="botonSeguir">Seguir</button>
                    </section>
                <?php } ?>
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
            <li style="list-style-type: none;">
            ▸ <a class="tag" href="posts.php?pag=1&tag=<?php echo $tag['id']; ?>"
                    style="display:inline-block; color: #212121;"><?php echo $tag['tag'] ?></a>
            </li>
        <?php } ?>
    </ul>
<?php } ?>

<!-- Resultados para usuarios -->
<?php if (!empty($global_results['users'])) { ?>
    <h2>Usuarios Encontrados:</h2>
    <div class="users-container">
    <?php foreach ($global_results['users'] as $user) {
    // Verifica si el usuario está logueado
    $isLoggedIn = isset($_SESSION['usuario']);
    $isCurrentUser = $isLoggedIn && ($user['id'] == $_SESSION['usuario']['id']);
?>
    <section class="carta">
        <img src="img/blanco.jpg" alt="Fondo de la carta" class="fondoCarta">
        <a href="profile.php?profile=<?php echo $user['id']; ?>">
            <img src="img/users/<?php echo $user['foto_perfil']; ?>" alt="Foto de perfil" class="fotoPerfil" style="background-color: white;aspect-ratio: 1 / 1;">
        </a>
        <p style="color:white; font-family: AnimeAce;"><?php echo $isCurrentUser ? "You" : $user['usu_nombre']; ?></p>
        
        <?php if ($isLoggedIn && !$isCurrentUser) { ?>
            <p style="color:white"><?php echo $user['rango']; ?></p>
            <section class="boton_boton">
                <button id="botonSeguir">Enviar Mensaje</button>
            </section>
        <?php } ?>
        
        <section class="influencia">
            <div class="seguidores">
                <?php $sql="SELECT COUNT(*) AS followers FROM followers_users WHERE user_id='".$user['id']."'";
                $query=mysqli_query($link,$sql);
                $folr=mysqli_fetch_assoc($query)?>
                <p class="numero"><?php echo $folr['followers']?></p>
                <p class="label">Seguidores</p>
            </div>
            <div class="seguidos">
            <?php $sql="SELECT COUNT(*) AS followed FROM followers_users WHERE follower_id='".$user['id']."'";
                $query=mysqli_query($link,$sql);
                $fold=mysqli_fetch_assoc($query)?>
                <p class="numero"><?php echo $fold['followed']?></p>
                <p class="label">Seguidos</p>
            </div>
        </section>

        <?php if ($isLoggedIn && !$isCurrentUser) { ?>
            <section class="boton_boton">
                <button id="botonSeguir">Seguir</button>
            </section>
        <?php } ?>
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