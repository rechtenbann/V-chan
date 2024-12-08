<form method="post">
<input type="submit" value="test" name="test">
<input type="submit" value="test2" name="test2">
</form>
<style>
        .cnv {
            width: 300px;
            display:inline-block;
        }
    </style>
    <div>
<img class="gif-toggle cnv" src="img/users/ride.png" alt="ride.gif" data-gif="img/users/ride.gif" />
    <img class="gif-toggle cnv" src="img/users/cat.png" alt="cat.gif" data-gif="img/users/cat.gif" />
</div>



<form method="POST" enctype="multipart/form-data">
<label>
<input type="file" name="image">
</label>
    <input type="submit" name="submit" value="Upload file">
</form>
<?php
    if (isset($_FILES['image'])) {
    $fileext = $_FILES['image']['name'];
    $ee=pathinfo($_FILES['image']['name']);
    $extension=$ee['extension'];
if($extension=="gif"){
        $uploadDir = "img/posts/";
        $originalFilePath = $uploadDir . basename($_FILES['image']['name']);
        if (move_uploaded_file($_FILES['image']['tmp_name'], $originalFilePath)) {
            echo "El archivo original ha sido subido correctamente.<br>";
        } else {
            echo "Hubo un error al mover el archivo original.<br>";
        }
        $gifImage = imagecreatefromgif($originalFilePath);
        if ($gifImage === false) {
            echo "Error al cargar el archivo GIF.";
            exit;
        }
        $uploadDirPrev = "img/posts/previews/";
        $newFileName = $uploadDirPrev . basename($ee['filename']) . '.png';
        if (imagepng($gifImage, $newFileName)) {
            echo "El archivo ha sido convertido a PNG y subido correctamente.<br>";
        } else {
            echo "Hubo un error al convertir y mover el archivo a PNG.<br>";
        }
        imagedestroy($gifImage);
        }
    }
?>
<!-- <img id="gifImage" src="img/users/default.png" alt="Imagen estática" class="cnv" />
    <script>
        // Obtén la imagen por su id
const gifImage = document.getElementById('gifImage');

// Dirección de tu GIF
const gifUrl = 'img/users/hover.gif'; // Reemplázalo con la URL de tu GIF

// Dirección de la imagen estática
const staticImageUrl = 'img/users/default.png'; // Reemplázalo con la URL de tu imagen estática

// Cuando el mouse pase por encima de la imagen, cambia la fuente a la del GIF
gifImage.addEventListener('mouseover', () => {
    gifImage.src = gifUrl;
});

// Cuando el mouse salga de la imagen, vuelve a la imagen estática
gifImage.addEventListener('mouseout', () => {
    gifImage.src = staticImageUrl;
});
        </script> -->