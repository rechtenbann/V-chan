<?php
if (!isset($section)) {
  header("Location: ../index.php");
}
if (session_status() !== PHP_SESSION_ACTIVE)
  session_start(); ?>
<div class="navtop" style="<?php if(!isset($_COOKIE['dark_mode'])||$_COOKIE['dark_mode']=='false'){echo "background-color: rgb(207, 0, 138);";}else{ echo "background-color: rgb(107, 0, 38);";} ?>">
  <div class="navitems">
    <div class="navlink navbrand">
      <a href="index.php"><img class="icon" src="img/org_3.png" width="100" height="90"></a>
    </div>
    <div class="navlink">
      <a href="settings.php" class="section"><u class="ico" style="text-decoration:none;font-size: 20px;">~ </u><b>Settings</b></a>
    </div>
    <div class="navlink">
      <a href="posts.php?pag=1&tag=1" class="section"><u class="ico" style="text-decoration:none;font-size: 20px;">R </u><b>Posts</b></a>
    </div>
    <div class="navlink">
      <a href="Forum.php?pag=1" class="section"><u class="ico" style="text-decoration:none;font-size: 20px;">6 </u><b>Forum</b></a>
    </div>
    <div class="navlink">
      <a href="chat.php?pag=1" class="section" <?php if (!isset($_SESSION['usuario'])) {
        echo 'style="pointer-events:none; color:grey"';
      } ?>><u class="heydings" style="text-decoration:none;font-size: 20px;">b </u><b>Community</b></a>
    </div>
    <!-- <div class="navlink">
      <a href="cards.php" class="section"><b>Cards</b></a>
    </div> -->
    <div class="navlink">
      <a href="sites.php" class="section"><u class="ico" style="text-decoration:none;font-size: 20px;">0 </u><b>Sites</b></a>
    </div>
    <div class="navlink">
      <?php if (isset($_SESSION['usuario']) && $_SESSION['usuario']['rango'] == "administrador") { ?><a class="section"
          href="test.php"><u class="ico" style="text-decoration:none;font-size: 20px;">} </u><b>Test Zone</b></a><?php } ?>
    </div>
    <div class="navlink">
      <?php if (isset($_SESSION['usuario']) && $_SESSION['usuario']['rango'] == "administrador") { ?><a class="section"
          href="admin.php"><u class="ico" style="text-decoration:none;font-size: 20px;">g </u><b>Administrar</b></a><?php } ?>
    </div>
    <div class="navlink">
      <?php try{
       if (isset($_SESSION['usuario']) && ($section != "profile" || (isset($_GET['usr'])&&$_GET['usr']!=$_SESSION['usuario']['id']))) { ?><a class="section"
          href="profile.php?profile=<?php echo $_SESSION['usuario']['id']?>" style="float: right;">
          <img class="profile-nav"
            src="img/users/<?php echo ($_SESSION['usuario']['foto_perfil']); ?>" height="60" width="60"
            style=""></a><?php }else if 
            (isset($_SESSION['usuario']) && ($section == "profile" || (isset($_GET['usr'])&&$_GET['usr']==$_SESSION['usuario']['id']))) { ?><a class="section"
           style="float: right;"><img 
            src="img/users/blank.png" height="60" width="60"
            style="border-radius: 100rem;user-select:none;<?php if($_COOKIE['dark_mode']=='false'){echo "background-color: rgb(207, 0, 138);";}else{ echo "background-color: rgb(107, 0, 38);";} 
            ?> object-fit: cover;"></a>
            <?php }}catch(Exception $e){?>
              <a class="section"
           style="float: right;"><img 
            src="img/users/blank.png" height="60" width="60"
            style="border-radius: 100rem;user-select:none;<?php if($_COOKIE['dark_mode']=='false'){echo "background-color: rgb(207, 0, 138);";}else{ echo "background-color: rgb(107, 0, 38);";} 
            ?> object-fit: cover;"></a>
            <?php } ?>
    </div>
  </div>
</div>