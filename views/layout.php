<?php
if (!isset($section)) {
    header("Location: ../index.php");}
if(session_status() !== PHP_SESSION_ACTIVE)session_start();
require_once "includes/config.php";

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>V-Chan</title>
    <link rel="icon" href="img/Sha.png">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="icon" href="img/favicon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="js/play_gif_anim.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
</head>
<body>
    <?php
    $section = (isset($section)) ? $section : 'home';
    ?>
    <header>
        <?php
        if ($section != 'home' || $section == 'home') {
            require_once "views/navtop.php";
        }
        ?>
    </header>
    <?php
    if ($section != 'home') {
        require_once "views/navsub.php";
    }
    ?>
     <?php
    if ($section == 'profile') {
        require_once "views/navprofile.php";
    }
    ?>
    <?php
    if ($section != 'home' AND $section!='profile_other'AND $section!="profile") {
        require_once "views/navsrh.php";
    }
    ?>
    <?php
    require_once $section . ".php";
    // if ($section == 'posts') {
    //     require_once "views/paginator.php";
    // }
    ?>
    <script>
        <?php
        if ($section == 'profile') {
            require_once "js/modal.js";
        } ?>
    </script>
    <footer>
        <?php
        require_once $section . ".php";
        if ($section != 'home'||$section == 'home') {
            require_once "views/footer.php";
        }
        ?>
    </footer>
    </div>
</body>

</html>