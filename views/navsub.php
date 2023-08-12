<?php
if (!isset($section)) {
  header("Location: ../index.php");
  $total_posts=mysqli_num_rows($mysqliquery);
}
?>
<nav class="navsub">
<div class="subnavitems">
  <a href="options.php">Settings</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <a href="upload.php">Upload</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <a href="post.php?id=<?php echo rand(1, $total_posts); ?>">Random</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <a href="#">Wiki</a>
</div>
</nav>