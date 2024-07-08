<?php
require_once "includes/config.php";
?>
<div align="center">
    <div style="position: relative; width: 100%;">
        <div style="position: relative;top: 0; left: 0; width: 100%;">
            <img src="img/org_2.png" alt="" style="opacity: 0.7; position: relative;">
        </div>
    </div>
    <div
            style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);  width: 100%;">
    <h1 style="font-size: 50px;<?php if (isset($_COOKIE['dark_mode']) && $_COOKIE['dark_mode'] == 'true') {
        echo "color: white;";
    } ?>">
        <b><u>V-Chan</u></b>
    </h1>
    <br>
    <a href="posts.php?pag=1&tag=1"><b>All posts</b></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a
        href="crear.php">Forum</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a
        href="crear.php">Wiki</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="settings.php">Settings</a>
    <br>
    <form>
        <input type="text" placeholder="Browse:..." style="width:500px">&nbsp;<input type="submit" value="Search"
            style="width:100px">
    </form>
</div>
<?php for ($i = 0; $i < 24; $i++) {
    echo "<br>";
} ?>
</div>