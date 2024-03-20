<div>
    <form method="POST">
        <input type="hidden" name="Options">
        <!-- <div>
            <input type="checkbox" name="NSFW" value="NSFW MODE" <?php if(isset($_SESSION['usuario'])&&$_SESSION['usuario']['nsfw_allow']==1){ echo "checked";} else if(isset($_SESSION['usuario'])&&$_SESSION['usuario']['nsfw_allow']==0){ echo "";}?>> Allow NSFW stuff
        </div> -->
        <div>
        <input type="checkbox" name="DM" value="DARK MODE" <?php if(isset($_SESSION['usuario'])&&$_SESSION['usuario']['dark_mode']==1){ echo "checked";} else if(isset($_SESSION['usuario'])&&$_SESSION['usuario']['dark_mode']==0){ echo "";}?>> Dark Mode
        </div>
        <div>
            <input type="submit" value="Guardar Cambios">
        </div>
    </form>
</div>