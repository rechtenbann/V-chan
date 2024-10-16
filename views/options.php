<div>
    <form method="POST">
        <input type="hidden" name="Options">
        
        
        <div>
            <input type="checkbox" name="DM" value="DARK MODE" <?php if ($_COOKIE['dark_mode'] == 'true') {
                echo "checked";
            } else if ($_COOKIE['dark_mode'] == 'false' || !isset($_COOKIE['dark_mode'])){
                echo "";
            } ?>> <a style="<?php  if ($_COOKIE['dark_mode']=="true") {echo "color:white";}else{echo "";} ?>">Dark Mode<?php if ($_COOKIE['dark_mode']=="true") {echo "⚉";}else if ($_COOKIE['dark_mode'] == 'false' || !isset($_COOKIE['dark_mode'])){echo "⚇";}?></a>
        </div>
        <br>
        <div>
            <input type="submit" value="Guardar Cambios">
        </div>
    </form>
</div>