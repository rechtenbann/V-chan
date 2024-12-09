document.addEventListener('DOMContentLoaded', () => {
    // Obtén todas las imágenes con la clase "gif-toggle"
    const gifImages = document.querySelectorAll('.gif-toggle');

    // Para cada imagen, agregamos los eventos para cambiar el GIF al pasar el mouse
    gifImages.forEach(img => {
        const staticImageUrl = img.src; // URL de la imagen estática
        const gifUrl = img.getAttribute('data-gif'); // Obtiene la URL del GIF desde el atributo data-gif

        // Si la imagen tiene un atributo data-gif, se aplican los eventos
        if (gifUrl) {
            // Cuando el mouse pase por encima, cambia la fuente al GIF
            img.addEventListener('mouseover', () => {
                img.src = gifUrl;
            });

            // Cuando el mouse salga de la imagen, vuelve a la imagen estática
            img.addEventListener('mouseout', () => {
                img.src = staticImageUrl;
            });
        }
    });
});

document.addEventListener('DOMContentLoaded', () => {
    // Obtén todas las imágenes con la clase "gif-toggle"
    const gifImages = document.querySelectorAll('.aud-toggle');

    // Para cada imagen, agregamos los eventos para cambiar la imagen al pasar el mouse
    gifImages.forEach(img => {
        const staticImageUrl = img.src; // URL de la imagen estática
        const gifUrl = 'img/posts/original/audio.gif'; // Cambia esta línea para que siempre use "audio.gif"

        // Cuando el mouse pase por encima, cambia la fuente a "audio.gif"
        img.addEventListener('mouseover', () => {
            img.src = gifUrl;
        });

        // Cuando el mouse salga de la imagen, vuelve a la imagen estática
        img.addEventListener('mouseout', () => {
            img.src = staticImageUrl;
        });
    });
});