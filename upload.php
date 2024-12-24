<?php
require_once "includes/config.php";
$confirm = 0;

if (isset($_FILES['image'])) {
    $fileext = $_FILES['image']['name'];
    $ee = pathinfo($_FILES['image']['name']);
    $extension = strtolower($ee['extension']); // Convertir a minúsculas para manejar extensiones sin importar mayúsculas

    // Carpeta original y preview
    $uploadDirOriginal = "img/posts/original/";
    $uploadDirPreview = "img/posts/preview/";

    // Generar un nombre temporal para la imagen o video (puede ser un timestamp o un nombre aleatorio)
    $tempFileName = uniqid('temp_') . "." . $extension;

    // Obtener el título del formulario (si existe)
    $title = isset($_POST['title']) && !empty($_POST['title']) ? $_POST['title'] : '';

    // Mover el archivo original a la carpeta "original" con un nombre temporal
    if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadDirOriginal . $tempFileName)) {
        // Insertar en la base de datos, usando el título proporcionado (o el ID si está vacío)
        $titleToInsert = $title ? $title : "ID-" . uniqid(); // Si no hay título, usamos el ID temporal
        $sql = "INSERT INTO posts (usuario_id, fecha_alta, original, title) VALUES (1, NOW(), '" . $tempFileName . "', '" . mysqli_real_escape_string($link, $titleToInsert) . "');";
        $query = mysqli_query($link, $sql);
        $lid = mysqli_insert_id($link);  // Obtener el ID insertado

        // Ahora que tenemos el $lid, podemos actualizar el nombre del archivo con el ID correcto
        $newOriginalFileName = $lid . "." . $extension;
        rename($uploadDirOriginal . $tempFileName, $uploadDirOriginal . $newOriginalFileName);

        // Verificar si es un video o una imagen
        if (in_array($extension, ['mp4', 'avi', 'mov', 'mkv'])) {
            // Para los videos, renombramos el archivo original con el ID
            rename($uploadDirOriginal . $newOriginalFileName, $uploadDirOriginal . $lid . "." . $extension);
            $newOriginalFileName = $lid . "." . $extension;

            // Usar FFmpeg para generar una miniatura en PNG del video
            $thumbnailPath = $uploadDirPreview . $lid . ".png";
            $command = "ffmpeg -i " . $uploadDirOriginal . $newOriginalFileName . " -ss 00:00:02.000 -vframes 1 " . $thumbnailPath;
            exec($command); // Ejecutar el comando para crear la miniatura
            $sql = "UPDATE posts SET original='" . $newOriginalFileName . "' WHERE id = '" . $lid . "'";
            $query = mysqli_query($link ,$sql);

            // Si la miniatura fue creada correctamente, actualizamos la base de datos
            if (file_exists($thumbnailPath)) {
                $previewFileName = $lid . ".png";
                $sql = "UPDATE posts SET image='" . $previewFileName ."' WHERE id = '" . $lid . "'";
                $query = mysqli_query($link, $sql);
            } else {
                echo "Error al generar la miniatura del video.";
                exit;
            }
        } elseif (in_array($extension, ['mp3', 'm4a', 'wav', 'flac'])) {
            // Para los archivos de audio, asignamos 'audio.png' tanto al original como a la miniatura
            $newOriginalFileName = $lid.'.'.$extension;  // Nombre para el archivo original de audio
            $previewFileName = 'audio.png';      // Nombre para la miniatura de audio (la misma imagen para audio)

            // Actualizamos la base de datos con "audio.png"
            $sql = "UPDATE posts SET original='" . $newOriginalFileName . "', image='" . $previewFileName . "' WHERE id = '" . $lid . "'";
            $query = mysqli_query($link, $sql);
        } else {
            // Para las imágenes, generamos una versión en miniatura (como en tu código original)
            $imagePath = $uploadDirOriginal . $newOriginalFileName;

            if ($extension == "gif") {
                $image = imagecreatefromgif($imagePath);
            } elseif ($extension == "jpeg" || $extension == "jpg") {
                $image = imagecreatefromjpeg($imagePath);
            } elseif ($extension == "png") {
                // Cargar la imagen PNG y asegurar que se preserve la transparencia
                $image = imagecreatefrompng($imagePath);

                // Habilitar la transparencia para el fondo de la imagen
                imagealphablending($image, false); // Desactivar la mezcla de colores
                imagesavealpha($image, true); // Mantener la transparencia en el PNG
            } else {
                echo "Formato de imagen no soportado.";
                exit;
            }

            // Redimensionar la imagen a un ancho de 150px, manteniendo la relación de aspecto
            $width = 150;
            $height = (imagesy($image) / imagesx($image)) * $width;

            // Crear una nueva imagen redimensionada con transparencia preservada
            $resizedImage = imagecreatetruecolor($width, $height);
            imagealphablending($resizedImage, false); // Desactivar la mezcla de colores
            imagesavealpha($resizedImage, true); // Mantener la transparencia

            // Copiar y redimensionar la imagen original en la nueva imagen
            imagecopyresampled($resizedImage, $image, 0, 0, 0, 0, $width, $height, imagesx($image), imagesy($image));

            // Definir el nombre para la versión redimensionada en PNG
            $previewFileName = $lid . ".png"; // Usamos el ID para el nombre de archivo en la carpeta "preview"

            // Guardar la versión reducida en la carpeta "preview"
            if (imagepng($resizedImage, $uploadDirPreview . $previewFileName)) {
                echo "Versión reducida en PNG guardada correctamente.";
            } else {
                echo "Error al guardar la versión reducida en PNG.";
            }

            // Limpiar los recursos de las imágenes
            imagedestroy($image);
            imagedestroy($resizedImage);

            // Actualizar la base de datos con el nombre del archivo PNG de la versión reducida
            $sql = "UPDATE posts SET image='" . $previewFileName . "', original='" . $newOriginalFileName . "' WHERE id = '" . $lid . "'";
            $query = mysqli_query($link, $sql);
        }

        // Redirigir a la página de posts
        header("location:posts.php?pag=1&tag=1");

    } else {
        echo "Error al mover el archivo original.";
    }
}

$section = "upload";
$title = "Upload";
require_once "views/layout.php";
?>
