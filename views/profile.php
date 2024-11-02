<link rel="stylesheet" href="css/profile.css">

<!-- /////////////////////////////////////////////////////////////////////////// -->
<?php if (!isset($_GET['profile']) || $_GET['profile'] == $_SESSION['usuario']['id']) { ?>
    <nav class="navbar">
        <ul>
            <li><a href="#perfil" class="nav-link " data-section="perfil">Perfil</a></li>
            <li><a href="#posts" class="nav-link" data-section="posts">Publicaciones</a></li>
            <li><a href="#preguntas" class="nav-link" data-section="preguntas">Preguntas del Foro</a></li>
        </ul>
    </nav>
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
                if ($_SESSION['usuario']['usu_nombre'] == "reichsacht") {
                    echo "<a class='ico'> f</a>";
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
                    <p class="numero">8,000</p>
                    <p class="label">Seguidores</p>
                </div>
                <div class="seguidos">
                    <p class="numero">1,000</p>
                    <p class="label">Seguidos</p>
                </div>
            </section>
        </div>
    </section>
    <section class="contenido perfil-horizontal hidden" id="posts">
        <h3>Publicaciones</h3>
        <div class="publicaciones">
            <!-- Aquí irían las publicaciones del usuario -->
        </div>
    </section>
    <section class="contenido perfil-horizontal hidden" id="preguntas">
        <h3>Preguntas del Foro</h3>
        <div class="preguntas">
            <!-- Aquí irían las preguntas del foro del usuario -->
        </div>
    </section>
    <?php } else { ?>
    <!-- Mostrar el perfil de otro usuario sin opciones de edición -->
    <nav class="navbar">
        <ul>
            <li><a href="#perfil" class="nav-link " data-section="perfil">Perfil</a></li>
            <li><a href="#posts" class="nav-link" data-section="posts">Publicaciones</a></li>
            <li><a href="#preguntas" class="nav-link" data-section="preguntas">Preguntas del Foro</a></li>
        </ul>
    </nav>
    <section id="perfil" class="contenido perfil-horizontal">
        <div class="foto-container">
            <img src="img/users/<?php echo htmlspecialchars($user['foto_perfil']); ?>" alt="Foto de perfil" class="fotoPerfilHorizontal">
        </div>
        <div class="linea-separadora"></div>
        <div class="infoPerfil">
            <h2><?php echo htmlspecialchars($user['usu_nombre']);
                if ($user['fecha_baja'] != null) {
                    echo " | BANNED";
                } ?></h2>
            <p class="rango"> <?php echo htmlspecialchars($userrank['rango']); ?></p>
            <p class="email"><?php echo htmlspecialchars($user['usu_email']); ?></p>
            <div class="botones">
                <button class="btn-seguir">Seguir</button>
                <button class="btn-mensaje">Enviar Mensaje</button>
            </div>
            <section class="influencia-horizontal">
                <div class="seguidores">
                    <p class="numero">8,000</p>
                    <p class="label">Seguidores</p>
                </div>
                <div class="seguidos">
                    <p class="numero">1,000</p>
                    <p class="label">Seguidos</p>
                </div>
            </section>
        </div>
    </section>
<?php } ?>
<!-- /////////////////////////////////////////////////////////////////////////// -->

<!-- /////////////////////////////////////////////////////////////////////////// -->
<div id="ep" class="modal">
    <!--Edit nombre-->
    <p><a href="#en" rel="modal:open">Cambiar nombre</a></p>
    <div id="en" class="modal" style="width:15rem">
        <div style="margin: top 0;padding: top 0;border-bottom: 1px solid cadetblue;">
            <h4 style="vertical-align: top;">Editar nombre de usuario</h4>
        </div>
        <br>
        <div>
            <form method="post">
                <input type="text" name="nombre" id="nombre" value="<?php echo $_SESSION['usuario']['usu_nombre'] ?>" required>
                <br><br>
                <input type="submit" value="Confirmar ✓" style="float: left;">
                <button style="float: right;"> <a href="#ep" rel="modal:open" style="text-decoration:none; color:black">Cancelar ✗</a></button>
        </div>
        </form>
    </div>

    <!--Fin edit nombre-->
    <!--Edit mail-->
    <p><a href="#em" rel="modal:open">Cambiar email</a></p>
    <div id="em" class="modal" style="width:15rem">
        <div style="margin: top 0;padding: top 0;border-bottom: 1px solid cadetblue;">
            <h4 style="vertical-align: top;">Editar mail</h4>
        </div>
        <br>
        <div>
            <form method="post">
                <input type="password" name="actpass" id="actpass" placeholder="Contraseña actual" required>
                <br><br>
                <input type="password" name="newpass" id="newpass" placeholder="Contraseña nueva" required>
                <br><br>
                <input type="submit" value="Confirmar ✓" style="float: left;">
                <button style="float: right;"> <a href="#ep" rel="modal:open" style="text-decoration:none; color:black">Cancelar ✗</a></button>
            </form>
        </div>
    </div>
    <!--Fin edit mail-->
    <!--Edit contra-->
    <p><a href="#ec" rel="modal:open">Cambiar contraseña</a></p>
    <div id="ec" class="modal" style="width:15rem">
        <div style="margin: top 0;padding: top 0;border-bottom: 1px solid cadetblue;">
            <h4 style="vertical-align: top;">Editar contraseña</h4>
        </div>
        <br>
        <div>
            <form method="post">
                <input type="password" name="actpass" id="actpass" placeholder="Contraseña actual" required>
                <br><br>
                <input type="password" name="newpass" id="newpass" placeholder="Contraseña nueva" required>
                <br><br>
                <input type="submit" value="Confirmar ✓" style="float: left;">
                <button style="float: right;"> <a href="#ep" rel="modal:open" style="text-decoration:none; color:black">Cancelar ✗</a></button>
            </form>
        </div>
    </div>
    <!--Fin edit contra-->
</div>
<div id="ei" class="modal" style="width:29rem;">
    <a style="text-decoration: none; color: black; cursor: default;">
        <h3>Default</h3>
    </a>
    <div style="border-bottom: 1px solid black;border-top: 1px solid black;">
        <div>
            <div class="Height">
                <form method="post" class="option-form" style="user-select:none">
                    <br>
                    <input type="image" src="img/users/default1.png" class="void" disabled>
                    <label class="lbl">Useless</label>
                </form>
            </div>
            <div style="display: inline-block;">
                <form method="post" class="option-form">
                    <input type="hidden" name="default1" value="default1.png" class="Height">
                    <input title="Set V-Chan as profile photo" type="image" id="default1" class="option-photo" name="default1" value="default1.png" alt="Login" src="img/users/default1.png">
                    <label style="display: block; text-align: center;">V-chan</label>
                </form>
            </div>
            <div style="display: inline-block;">
                <form method="post" class="option-form">
                    <input type="hidden" name="default2" value="default2.png" class="Height">
                    <input title="Set D-Kun as profile photo" type="image" id="default2" class="option-photo" name="default2" value="default2.png" alt="Login" src="img/users/default2.png">
                    <label style="display: block; text-align: center;">V-kun</label>
                </form>
            </div>
            <div style="display: inline-block;">
                <form method="post" class="option-form">
                    <input type="hidden" name="default3" value="default3.png" class="Height">
                    <input title="Set D-Chan as profile photo" type="image" id="default3" class="option-photo" name="default3" value="default4.png" alt="Login" src="img/users/default3.png">
                    <label style="display: block; text-align: center;">D-chan</label>
                </form>
            </div>
        </div>
        <div>
            <div class="Height">
                <form method="post" class="option-form" style="user-select:none">
                    <br>
                    <input type="image" src="img/users/default1.png" class="void" disabled>
                    <label class="lbl">Useless</label>
                </form>
            </div>
            <div style="display: inline-block;">
                <form method="post" class="option-form">
                    <input type="hidden" name="default4" value="default4.png" class="Height">
                    <input title="Set P-Chan as profile photo" type="image" id="default4" class="option-photo" name="default4" value="default4.png" alt="Login" src="img/users/default4.png">
                    <label style="display: block; text-align: center;">P-chan</label>
                </form>
            </div>
            <div style="display: inline-block;" class="cont">
                <form method="post" class="option-form">
                    <input type="hidden" name="default5" value="default5.png" class="Height">
                    <input title="Set K-Chan as profile photo" type="image" id="default5" class="option-photo" name="default5" value="default5.png" alt="Login" src="img/users/default5.png">
                    <label style="display: block; text-align: center;">K-chan</label>
                </form>
            </div>
            <div style="display: inline-block;">
                <form method="post" class="option-form">
                    <input type="hidden" name="default6" value="default6.png" class="Height">
                    <input title="Set S-Chan as profile photo" type="image" id="default6" class="option-photo" name="default6" value="default6.png" alt="Login" src="img/users/default6.png">
                    <label style="display: block; text-align: center;">S-chan</label>
                </form>
            </div>
        </div>
    </div>
    <h3>Colors</h3>
    <div>
        <div class="Height">
            <form method="post" class="option-form" style="user-select:none">
                <br>
                <input type="image" src="img/users/default1.png" class="void" disabled>
                <label class="lbl">Useless</label>
            </form>
        </div>
        <div style="display: inline-block;">
            <form method="post" class="option-form">
                <input type="hidden" name="blank" value="blank.png" class="Height">
                <input type="image" id="blank" class="option-photo" name="blank" value="blank.png" alt="Login" src="img/users/noneB.png">
                <label style="display: block; text-align: center;">None</label>
            </form>
        </div>
        <div style="display: inline-block;">
            <form method="post" class="option-form">
                <input type="hidden" name="blank1" value="blank.png" class="Height">
                <input type="image" id="blank1" class="option-photo" name="blank1" value="blank.png" alt="Login" src="img/users/blank.png" style="background-color:white">
                <label style="display: block; text-align: center;">White</label>
            </form>
        </div>
        <div style="display: inline-block;">
            <form method="post" class="option-form">
                <input type="hidden" name="blank2" value="blank.png" class="Height">
                <input type="image" id="blank2" class="option-photo" name="blank2" value="blank.png" alt="Login" src="img/users/blank.png" style="background-color:black">
                <label style="display: block; text-align: center;">Black</label>
            </form>
        </div>
    </div>
</div>
<!--/////////////////////////////////////////////////-->

<link rel="stylesheet" href="css/easter_egg.css">
<button onclick="location.href='Easter_egg/interactive_dragon/interactive dragon.html'" class="buttonn1" title="dragón"></button>
<button onclick="location.href='Easter_egg/interactive_Spider/interactive spider.html'" class="buttonn2" title="araña"></button>
<button onclick="location.href='Easter_egg/chandelier/dist/index.html'" class="buttonn3" title="si"></button>
<script>


document.addEventListener('DOMContentLoaded', function() {
    mostrarSeccion('perfil');
    const enlacesNav = document.querySelectorAll('.nav-link');
    enlacesNav.forEach(enlace => {
        enlace.addEventListener('click', function(event) {
            event.preventDefault(); 
            const seccion = this.getAttribute('data-section');
            mostrarSeccion(seccion);
        });
    });

    function mostrarSeccion(seccion) {
        const secciones = document.querySelectorAll('.contenido');
        secciones.forEach(sect => {
            sect.classList.add('hidden'); 
        });

        const seccionMostrar = document.getElementById(seccion);
        if (seccionMostrar) {
            seccionMostrar.classList.remove('hidden');
        }
    }
});

</script>