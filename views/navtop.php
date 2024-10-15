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
    <div class="navlink ace">
      <a href="settings.php" class="section2"><u class="gumi" style="text-decoration:none;font-size: 20px;">D </u><b class="underline<?php if($section=="settings"){echo '2';}?>">Settings</b></a>
    </div>
    <div class="navlink ace">
      <a href="posts.php?pag=1&tag=1" class="section2"><u class="gumi" style="text-decoration:none;font-size: 20px;">c </u><b class="underline<?php if($section=="posts"){echo '2';}?>">Posts</b></a>
    </div>
    <div class="navlink ace">
      <a href="Forum.php?pag=1" class="section2"><u class="gumi" style="text-decoration:none;font-size: 20px;">4 </u><b class="underline<?php if($section=="forum"){echo '2';}?>">Forum</b></a>
    </div>
    <div class="navlink ace">
      <a href="chat.php?pag=1" class="section2" <?php if (!isset($_SESSION['usuario'])) {
        echo 'style="pointer-events:none; color:grey"';
      } ?>><u class="gumi" style="text-decoration:none;font-size: 20px;">5 </u><b class="underline<?php if($section=="chat"){echo '2';}?>">Community</b></a>
    </div>
    <div class="navlink ace">
      <a href="sites.php" class="section2"><u class="gumi" style="text-decoration:none;font-size: 20px;">i </u><b class="underline<?php if($section=="sites"){echo '2';}?>">Sites</b></a>
    </div>
    <div class="navlink ace">
      <?php if (isset($_SESSION['usuario']) && $_SESSION['usuario']['rango'] == "administrador") { ?><a class="section2"
          href="test.php"><u class="gumi" style="text-decoration:none;font-size: 20px;">j </u><b class="underline<?php if($section=="test"){echo '2';}?>">Test Zone</b></a><?php } ?>
    </div>
    <div class="navlink ace">
      <?php if (isset($_SESSION['usuario']) && $_SESSION['usuario']['rango'] == "administrador") { ?><a class="section2"
          href="admin.php"><u class="gumi" style="text-decoration:none;font-size: 20px;">E </u><b class="underline<?php if($section=="admin"){echo '2';}?>">Administrar</b></a><?php } ?>
    </div>
    <div class="navlink ace">
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