<div style="display:inline-block; text-align:center">
	<?php
	foreach ($questions as $question) {
	?>
		<div onclick="window.location='question.php?id=<?php echo $question['id']; ?>';" style="cursor: pointer;background-color: white;min-width:10rem;height:15rem;
	text-align:center; margin:1rem;display:inline-block; border: 2px solid black;">
	<div style="padding-top: 1rem;">
			<a href="question.php?id=<?php echo $question['id']; ?>" class="ace" style="color:black;text-decoration:none;"><?php echo $question['title']; ?></a>
			</div>
			<div style="width:100%; padding-top:1rem;">
				<?php $sql = "SELECT foto_perfil FROM usuarios WHERE id='".$question['uid']."'";
$query = mysqli_query($link, $sql);
$img = mysqli_fetch_assoc($query); ?>
			<img src="img/users/<?php echo $img['foto_perfil'];?>" style="background-color:black;width:5rem;object-fit:cover;border-radius:100%">
			</div>
		</div>
	<?php
	}
	?>
</div>
<!-- <?php if (isset($_SESSION['usuario'])) { ?>
<div style="background-color: white; width:7rem; height:7rem; text-align:center;float:left; margin-left: 2rem;; border-radius: 50%; border: 2px solid black" class="tooltip">
<span class="tooltiptext ace">Ask a question</span>
<a href="#ei" rel="modal:open" id="image" class="gumi" style="font-size:5rem; text-decoration:none; color: black;">F</a>
<?php } ?> -->
<?php if (isset($_SESSION['usuario'])) { ?>
	<div style="width:100%">
		<div class="tooltip">
		<a href="#ei" rel="modal:open" id="image" style="color:black; text-decoration: none;"><button class="tooltiptext ace">Ask</button></a>
			<a href="#ei" rel="modal:open" id="image" style="color:black; text-decoration: none;"><button class="ace" style="font-size: 1rem;height:2rem;width:4rem">+?</button></a>
		<?php } ?>
		</div>
	</div>
	<div id="ei" class="modal">
		<form action="forum.php" method="post" enctype="multipart/form-data">
			<input type="text" name="title" id="title" placeholder="Título" required style="width:100%; font-size:2rem"><br><br>
			<textarea type="text" name="description" id="description" placeholder="Descripcion" style="width:100%; height:10rem; font-size:1rem"></textarea><br>
			<input type="file" name="images[]" id="img" multiple><br>
			<button type="submit" name="submit" class="upload"><a class="over" style="border: 1px solid black">UPLOAD</a></button>
		</form>
	</div>