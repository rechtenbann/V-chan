<nav class="navbar">
    <ul>
        <li><a href="profile.php?profile=<?php echo $_GET['profile'] ?? $_SESSION['usuario']['id']; ?>" class="nav-link" data-section="perfil">Perfil</a></li>
        <li><a href="#" class="nav-link" onclick="loadSection('posts')">Publicaciones</a></li>
        <li><a href="#" class="nav-link" onclick="loadSection('preguntas')">Preguntas del Foro</a></li>
        <?php if($_GET['profile'] ==$_SESSION['usuario']['id']){?>
        <li><a href="#" class="nav-link" onclick="loadSection('notificaciones')">Notificaciones</a></li>
        <li><a href="#" class="nav-link" onclick="loadSection('chats')">Chats</a></li>
    <?php }?>
    </ul>
</nav>
<script>
    function loadSection(seccion) {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'loadsection.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onload = function() {
            if (xhr.status >= 200 && xhr.status < 300) {
                document.getElementById('seccion-contenido').innerHTML = xhr.responseText;
            } else {
                console.error('Error al cargar la sección:', xhr.statusText);
            }
        };

        xhr.onerror = function() {
            console.error('Error de red');
        };
        console.log(seccion);
        xhr.send('section=' + encodeURIComponent(seccion));
    }
</script>

