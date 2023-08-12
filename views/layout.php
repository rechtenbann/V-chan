<?php
if (!isset($section)) {
    header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>V-Chan</title>
    <link rel="icon" href="img/org_3.png" height=32px weight=32px>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="img/favicon.ico" rel="icon">
    <link href="css/styles.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

    <!-- Remember to include jQuery :) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>

<!-- jQuery Modal -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
</head>

<body style="background-color: rgb(255, 255, 255);">
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
    if ($section != 'home') {
        require_once "views/navsrh.php";
    }
    ?>
    <?php
    require_once $section . ".php";
    if ($section == 'posts') {
        require_once "views/paginator.php";
    }
    ?>
    <script>
    <?php
    if ($section == 'profile') {
        require_once "js/modal.js";
    }
    ?>
    </script>
    <footer>
        <?php
        require_once $section . ".php";
        if ($section == 'posts') {
            require_once "views/footer.php";
        }
        ?>
    </footer>
</body>

</html>