<?php
require_once "includes/config.php";
?>
<link rel="stylesheet" href="css/home.css">
<div align="center">
    <div style="position: relative; width: 100%;">
        <div style="position: relative;top: 0; left: 0; width: 100%;">
            <img src="img/org_2.png" alt="" style="opacity: 0.7; position: relative; filter: drop-shadow(8px 8px 10px gray);">
        </div>
    </div>
    <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);  width: 100%;">
    <h1 style="font-size: 50px;<?php if (isset($_COOKIE['dark_mode']) && $_COOKIE['dark_mode'] == 'true') {
        echo "color: white; text-shadow: 2px 0 #000, -2px 0 #000, 0 2px #000, 0 -2px #000,
        1px 1px #000, -1px -1px #000, 1px -1px #000, -1px 1px #000;";}?>">
        <b class="ace" style="font-size: 5rem; color: #212121;">{</b><b class="HWNAT26" style="font-size: 10rem; "><u style="text-decoration:none; color: #212121;">V-Chan</u></b><b class="ace" style="font-size: 5rem; color: #212121;">}</b>
    </h1>
    <!-- <form action="result_search.php" method="GET">
        <input type="text" placeholder="Buscar usuarios (@), tags (#) o foro (/)" class="inputTextHome" style="width: 30%;">
        <input type="submit" value="Search" class="inputSubmitHome">
    </form> -->
    <div style="width: 75%;">
        <?php require_once "navsrh.php"?>
    </div>
    
</div>
</div>