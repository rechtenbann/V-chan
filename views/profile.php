<link rel="stylesheet" href="css/profile.css">
<?php if (!isset($_GET['profile']) || $_GET['profile'] == $_SESSION['usuario']['id']) { ?>
    <section class="perfil-horizontal contenido" id="perfil">
        <div class="foto-container">
            <a href="#ei" rel="modal:open" id="image"><img src="img/users/<?php echo $_SESSION['usuario']['foto_perfil']; ?>" alt="Foto de perfil" class="fotoPerfilHorizontal"></a>
        </div>
        <div class="linea-separadora"></div>
        <div class="infoPerfil">
            <h2><?php echo ($_SESSION['usuario']['usu_nombre']);
                if ($_SESSION['usuario']['fecha_baja'] != null) {
                    echo " | BANNED";
                }
                if ($_SESSION['usuario']['rango'] == "administrador") {
                    //echo "<a class='ico'> 亗﴾ ﴿‏⚚⚜f✮⚝  「 ✦ 𝐍𝐚𝐦𝐞 ✦ 」ᶠᶸᶜᵏᵧₒᵤ!  ⚡︎</a>";
                    echo "<a> 🜲</a>";
                }
                if ($_SESSION['usuario']['rango'] == "premium") {
                    echo "<a> ✮</a>";
                }
                ?></h2>
            <p class="rango"> <?php echo $_SESSION['usuario']['rango']; ?></p>
            <p class="email"> <?php echo ($_SESSION['usuario']['usu_email']); ?>
            </p>
            <div class="botones">
                <button class="btn-editar"><a href="#ep" rel="modal:open" style="color:white;text-decoration:solid;">Editar perfil</a></button>
            </div>
            <section class="influencia-horizontal">
    <div class="seguidores">
        <p class="numero"><?php echo $_SESSION['usuario']['followers']; ?></p>
        <p class="label">Seguidores</p>
    </div>
    <div class="seguidos">
        <p class="numero"><?php echo $seguidos_count; ?></p>
        <p class="label">Seguidos</p>
    </div>
</section>
        </div>
    </section>
    <div id="seccion-contenido">
        <!-- Aquí se cargarán dinámicamente las secciones como 'posts', 'preguntas', etc. -->
    </div>
<?php } else { ?>
    <section id="perfil" class="contenido perfil-horizontal">
        <div class="foto-container">
            <img src="img/users/<?php echo htmlspecialchars($user['foto_perfil']); ?>" alt="Foto de perfil" class="fotoPerfilHorizontal">
        </div>
        <div class="linea-separadora"></div>
        <div class="infoPerfil">
            <h2><?php echo htmlspecialchars($user['usu_nombre']);
                if ($user['fecha_baja'] != null) {
                    echo " | BANNED";
                }
                if ($userrank['rango'] == "administrador") {
                    //echo "<a class='ico'> f🕸𑁍⚠︎⚯ ͛< ଳ/a>";
                    echo "<a> 🜲</a>";
                }
                if ($userrank['rango'] == "premium") {
                    echo "<a> ✮</a>";
                } ?></h2>
            <p class="rango"> <?php echo htmlspecialchars($userrank['rango']); ?></p>
            <p class="email"><?php echo htmlspecialchars($user['usu_email']); ?></p>

            <div class="botones">
                <button class="follow-button" data-user-id="<?php echo $user['id']; ?>"
                    data-following="<?php echo ($is_following ? 'true' : 'false'); ?>">
                    <?php echo ($is_following ? 'Siguiendo' : 'Seguir'); ?>
                </button>
                <?php if (!$request): ?>
                    <!-- Caso: Ninguno ha enviado solicitud -->
                    <form method="post" action="send_request.php">
                        <input type="hidden" name="receiver_id" value="<?php echo $receiver_id; ?>">
                        <input class="btn-mensaje" type="submit" value="Enviar Mensaje">
                    </form>

                <?php elseif ($status === 'rejected'): ?>
                    <!-- Caso: Solicitud fue rechazada previamente -->
                    <form method="post" action="send_request.php">
                        <input type="hidden" name="receiver_id" value="<?php echo $receiver_id; ?>">
                        <input class="btn-mensaje" type="submit" value="Enviar Mensaje">
                    </form>
                    <p class="msg-info">
                        <?php echo $is_sender ? "Este usuario ya te rechazó una vez" : "Rechazaste a este usuario previamente"; ?>
                    </p>

                <?php elseif ($status === 'pending'): ?>
                    <!-- Caso: Solicitud en pendiente -->
                    <button class="btn-mensaje-disable" disabled>Solicitud ya enviada</button>

                <?php elseif ($status === 'accepted'): ?>
                    <!-- Caso: Solicitud aceptada, mostrar botón para ir al chat -->
                    <a href="chat-private.php?chat_with=<?php echo $receiver_id; ?>" class="btn-mensaje" style="color:white;text-decoration:none;">
                        Ir al Chat
                    </a>
                <?php endif; ?>
            </div>
            <section class="influencia-horizontal">
                <div class="seguidores">
                    <p class="numero"><?php echo $user['followers']; ?></p>
                    <p class="label">Seguidores</p>
                </div>
                <div class="seguidos">
                    <p class="numero"><?php echo $seguidos_count2; ?></p>
                    <p class="label">Seguidos</p>
                </div>
            </section>
        </div>
    </section>

<?php }
require_once "views/edit_profile.php"; ?>
<script src="js/profile.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>