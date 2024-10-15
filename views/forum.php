<?php
foreach ($questions as $question) {
	?>
	<div>
		<a href="question.php?id=<?php echo $question['id'];?>"><?php echo $question['title'];?></a>
	</div>
	<?php
}
?>


<form action="forum.php" method="post" enctype="multipart/form-data">
	Pregunta
	<input type="text" name="title" id="title" required><br>
	Detalles
	<textarea type="text" name="description" id="description" style="width:25rem"></textarea><br>
	<input type="file" name="images[]" id="img" multiple>
	<button type="submit" name="submit">Subir</button>
</form>