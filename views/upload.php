<form action="upload.php" method="POST" enctype="multipart/form-data">
<label>
    <span>Title:</span>
<input type="text" name="title"><br><br>
<span>File:</span>
<input type="file" name="image" accept="image/*,video/*,audio/*" required title="Supported file types: mp3, mp4, gif, jpg, jpeg, png, jfif, webp. Any other tyme could not work properly."><br><br>
<p style="font-family:Verdana, Geneva, Tahoma, sans-serif; font-size:10px">Supported types:<br>
&nbsp;&nbsp;-Images: any<br>
&nbsp;&nbsp;-Video: mp4<br>
&nbsp;&nbsp;-Audio: mp3
</p>
</label>
<br>
<!-- <label>
    tags: <br>
    <textarea type="text" name="tags" style="height:100px;width:25%;outline: none; resize: none;"></textarea>
    <input type="checkbox" name="checkbox" value="2"> anime
    <input type="checkbox" name="checkbox" value="3"> games
    <input type="checkbox" name="checkbox" value="4"> brands
    <input type="checkbox" name="checkbox" value="5"> animated_gif 
</label>-->
<br>
    <input type="submit" name="submit" value="Upload file">
</form>
<?php
if($confirm==1){
    echo "El archivo se ha subido correctamente";
}else if($confirm=0){
    echo "Error al subir el archivo. Compruebe la extensión del mismo";
}
?>