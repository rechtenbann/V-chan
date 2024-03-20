<?php if(session_status() !== PHP_SESSION_ACTIVE)session_start();?>
<div style="margin: auto; width: 80%; border: 0px solid black; padding: 10px; <?php if ($op['id'] == $_SESSION['usuario']['id']) {
    echo "background-color:lightblue; border-radius: 5px 5px 5px 5px";
} else {
    echo "background-color:white; border-radius: 5px 5px 5px 5px";
} ?>">
    <div style="display: inline-block; padding-left: 1rem;padding-top: 1rem; padding-right: 1rem;" class="profile"><a
            href="profile.php?usr=<?php echo $op['id'] ?>"><img src="img/users/<?php echo $op['foto_perfil']; ?>" alt=""
                class="note-img" width="50rem" height="50rem" style="vertical-align: middle;"></a></div>
    <div style="display: inline-block;"><a href="profile.php?usr=<?php echo $op['id'] ?>"><b>
                <?php if ($op['usu_nombre'] == $_SESSION['usuario']['usu_nombre']) {
                    echo "You";
                } else {
                    echo $op['usu_nombre'];
                } ?>
            </b></a>
    </div>
    <br><br>
    <p style="padding-left: 1rem;padding-bottom: 1rem; padding-right: 1rem;">
        <?php echo $main['content'] ?>
    </p>
    <a style="color: gray; float: right; padding-right: 2rem;">
        <?php echo $main['fecha_alta'] ?>
    </a> <br>
</div>
<br>

<?php if (isset($_SESSION['usuario'])) { ?>
    <div style="width: 100%; padding-left: 25%; height:100px">
        <form method="post">
            <textarea  type="text" placeholder="Leave a comment" name="ans" style="width: 50%;height:90px"></textarea>
            <br><br>
            <input type="submit" value="publish" style="width: 50%;">
        </form>
    </div>
<?php } ?><br>
<br><br>





<?php if(isset($anss) && $anss!=null){ foreach ($anss as $ans) {
    $query = "SELECT usuarios.id,usuarios.usu_nombre,usuarios.foto_perfil FROM usuarios LEFT JOIN online_chat_ans ON online_chat_ans.usuario_id = usuarios.id WHERE online_chat_ans.id = '" . $ans['id'] . "'";
    $query = mysqli_query($link, $query);
    $usudata = mysqli_fetch_assoc($query);
    $sql = "SELECT * FROM online_chat_ans WHERE fecha_baja IS NULL AND id = $msgid";
    $query = mysqli_query($link, $sql);
    if (!$query) {
        echo "";
    } else { ?>
        <div style="margin: auto; width: 50%; border: 0px solid black; padding: 10px; <?php if ($usudata['id'] == $_SESSION['usuario']['id']) {
            echo "background-color:lightblue; border-radius: 5px 5px 5px 5px; padding-right:1rem; margin-bottom: 1rem; ";
        } else {
            echo "background-color:white; border-radius: 5px 5px 5px 5px; padding-left:1rem; margin-bottom: 1rem;";
        } ?>">

            <?php if ($usudata['id'] == $_SESSION['usuario']['id']) { ?>
                <div style="float:left">
                    
                        <div style="display: inline-block; padding-left: 1rem;padding-top: 1rem; "
                            class="profile">
                            <a href="profile.php?usr=<?php echo $usudata['id'] ?>"><img
                                    src="img/users/<?php echo $usudata['foto_perfil']; ?>" alt="" class="note-img" width="50rem"
                                    height="50rem" style="vertical-align: middle;"></a>
                        </div>
                        <div style="display: inline-block;"><a href="profile.php?usr=<?php echo $usudata['id'] ?>"><b>You</b></a><a style="color: dimgrey;"> | OP</a>
                    </div>
                </div>
                <br>
            <?php } else { ?>
                <div style="float:left">
                    <div style="display: inline-block; padding-left: 1rem;padding-top: 1rem; padding-right: 1rem;" class="profile">
                        <a href="profile.php?usr=<?php echo $usudata['id'] ?>"><img
                                src="img/users/<?php echo $usudata['foto_perfil']; ?>" alt="" class="note-img" width="50rem"
                                height="50rem" style="vertical-align: middle;"></a>
                    </div>
                    <div style="display: inline-block;"><a href="profile.php?usr=<?php echo $usudata['id'] ?>"><b>
                                <?php echo $usudata['usu_nombre']; ?>
                            </b></a><a style="color: dimgrey;"> | USER</a>

                    </div>
                </div>
                <br>
            <?php } ?>

            <br><br>
            <p style="padding-left: 2rem;padding-bottom: 1rem;">
                <?php echo $ans['content'] ?>
            </p>
            <a style="color: gray; float: right; padding-left: 2rem;">
                <?php echo $ans['fecha_alta'] ?>
            </a>
            <br>
        </div>
        <br><br>
    <?php }
}}else{ ?>
<div>
    <a style="width: 100%; padding-left: 45%;">No comments</a>
</div>
<?php } ?>


<div class="paginador" style="text-align: center;">
    <p>
        <?php for ($i = 1; $i <= ceil(intval($cant["n"]) / 2); $i++) { ?>
            <a href="chat_ans.php?comment=<?php echo $msgid ?>&pag=<?php echo $i; ?>"><button>
                    <?php echo $i; ?>
                </button></a>
        <?php } ?>
    </p>
</div>