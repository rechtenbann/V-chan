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

