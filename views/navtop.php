<?php
if (!isset($section)) {
  header("Location: ../index.php");
}
if(session_status() !== PHP_SESSION_ACTIVE)session_start();?>
<div class="navtop">
  <div class="navitems">
    <div class="navlink navbrand">
      <a href="index.php"><img class="icon" src="img/org_3.png" width="100" height="90"></a>
    </div>
    <div class="navlink">
      <a href="settings.php" class="section"><b>Settings</b></a>
    </div>
    <div class="navlink">
      <a href="posts.php?pag=1" class="section"><b>Posts</b></a>
    </div>
    <div class="navlink">
      <a href="chat.php" class="section"><b>Online Chat</b></a>
    </div>
    <div class="navlink">
      <a href="3" class="section"><b>Home</b></a>
    </div>
    <div class="navlink">
    <a class="section" href="profile.php"><b><?php if(isset($_SESSION['usuario'])){echo($_SESSION['usuario']['usu_nombre']);} ?></b></a>
    </div>
  </div>
</div>