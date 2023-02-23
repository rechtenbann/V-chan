<?php
if (!isset($section)) {
    header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Placeholder</title>
    <link rel="icon" href="" height=32px weight=32px>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="img/favicon.ico" rel="icon">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <?php
    $section = (isset($section)) ? $section : 'home';
    ?>
    <header>
        <?php
        if ($section != 'home') {
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
        require_once "views/footer.php";
    }
    ?>
</body>

</html>