<link rel="stylesheet" href="css/profile.css">
<nav class="navbar">
    <ul>
        <li><a href="#perfil" class="nav-link " data-section="perfil">Perfil</a></li>
        <li><a href="#posts" class="nav-link" data-section="posts">Publicaciones</a></li>
        <li><a href="#preguntas" class="nav-link" data-section="preguntas">Preguntas del Foro</a></li>
    </ul>
</nav>

<section class="perfil-horizontal contenido" id="perfil">
    <div class="foto-container">
        <img src="img/users/default1.png" alt="Foto de perfil" class="fotoPerfilHorizontal">
    </div>
    <div class="linea-separadora"></div>
    <div class="infoPerfil">
        <h2>Sebastian</h2>
        <p class="rango">Rango</p>
        <p class="email">sebastian@gmail.com</p>
        
        <div class="botones">
            <button class="btn-seguir">Seguir</button>
            <button class="btn-editar">Editar Perfil</button>
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