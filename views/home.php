<?php
require_once "includes/config.php";
?>
<div align="center">
<h1 style="font-size: 50px;<?php if(isset($_COOKIE['dark_mode'])&&$_COOKIE['dark_mode']=='true'){echo "color: white;";} ?>"><b><u>V-Chan</u></b></h1>
<br>
<a href="posts.php?pag=1&tag=1"><b>All posts</b></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="crear.php">Forum</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="crear.php">Wiki</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="settings.php">Settings</a>
<br>
<form>
<input type="text" placeholder="Browse:..." style="width:500px">&nbsp;<input type="submit" value="Search" style="width:100px">
</form>
</div>

