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
$(document).on('click', '.follow-button', function() {
    const userId = $(this).data('user-id');
    const button = $(this);

    $.ajax({
        url: 'follow.php',
        type: 'POST',
        data: { user_id: userId },
        success: function(response) {
            const data = JSON.parse(response);
            if (data.success) {
                // Actualiza el contador de seguidores
                const countElement = button.closest('.infoPerfil').find('.seguidores .numero');
                countElement.text(data.followers_count );

                // Cambia el texto del botón a 'Siguiendo' y desactívalo
                button.text('Siguiendo'); // Cambia el color de fondo para mostrar que está deshabilitado
            } else {
                alert(data.message); // Muestra mensaje si ya sigue al usuario
            }
        },
        error: function() {
            alert('Error al seguir al usuario.');
        }
    });
});


