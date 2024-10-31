document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.menu-button').forEach(button => {
        button.addEventListener('click', function(event) {
            const menu = event.target.nextElementSibling; // Selecciona el menú desplegable
            menu.style.display = menu.style.display === 'block' ? 'none' : 'block'; // Alterna la visibilidad
        });
    });

    // Cierra el menú si se hace clic fuera de él
    document.addEventListener('click', function(event) {
        if (!event.target.matches('.menu-button')) {
            document.querySelectorAll('.dropdown-menu').forEach(menu => {
                menu.style.display = 'none'; // Oculta todos los menús
            });
        }
    });
});
