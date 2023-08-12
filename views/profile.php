<div align="center">
    <div class="profile-img" style="margin:2rem">
        <a href="#ei" rel="modal:open"><img src="img/users/<?php echo $_SESSION['usuario']['foto_perfil']; ?>" alt="" style="height: 20rem;width: 20rem; border-radius: 50%; object-fit: cover; background-color: white;"></a>
        <div id="ei" class="modal" style="width:29rem">
            <h3>Default</h3>
            <div style="border-bottom: 1px solid black;border-top: 1px solid black;">
                <form method="post" style="width: 8rem;display: inline-block">
                    <input type="hidden" name="default1" value="default1.png" style="width: 8rem;">
                    <input type="image" id="default1" name="default1" value="default1.png" alt="Login" src="img/users/default1.png" style="width: 8rem;">
                    <label style="display: block; text-align: center;">V-chan</label>
                </form>
                <form method="post" style="width: 8rem;display: inline-block">
                    <input type="hidden" name="default2" value="default2.png" style="width: 8rem;">
                    <input type="image" id="default2" name="default2" value="default2.png" alt="Login" src="img/users/default2.png" style="width: 8rem;">
                    <label style="display: block; text-align: center;">D-Kun</label>
                </form>
                <form method="post" style="width: 8rem;display: inline-block">
                    <input type="hidden" name="default3" value="default3.png" style="width: 8rem;">
                    <input type="image" id="default3" name="default3" value="default4.png" alt="Login" src="img/users/default3.png" style="width: 8rem;">
                    <label style="display: block; text-align: center;">H-chan</label>
                </form>

                <form method="post" style="width: 8rem;display: inline-block">
                    <input type="hidden" name="default4" value="default4.png" style="width: 8rem;">
                    <input type="image" id="default4" name="default4" value="default4.png" alt="Login" src="img/users/default4.png" style="width: 8rem;">
                    <label style="display: block; text-align: center;">P-chan</label>
                </form>
                <form method="post" style="width: 8rem;display: inline-block">
                    <input type="hidden" name="default5" value="default5.png" style="width: 8rem;">
                    <input type="image" id="default5" name="default5" value="default5.png" alt="Login" src="img/users/default5.png" style="width: 8rem;">
                    <label style="display: block; text-align: center;">K-chan</label>
                </form>
                <form method="post" style="width: 8rem;display: inline-block">
                    <input type="hidden" name="default6" value="default6.png" style="width: 8rem;">
                    <input type="image" id="default6" name="default6" value="default6.png" alt="Login" src="img/users/default6.png" style="width: 8rem;">
                    <label style="display: block; text-align: center;">S-chan</label>
                </form>
            </div>
            <h3>Custom</h3>
            <div style="background-color: gray; border-radius: 10%;border: 1px solid gray;">
                <form method="post" style="width: 8rem;display: inline-block">
                    <input type="hidden" name="default6" value="default6.png" style="width: 8rem;">
                    <input type="hidden" style="width: 8rem;">
                </form>
                <a href="#uf" rel="modal:open"><img src="img/users/upload.png" alt="" style="height: 8rem;width: 8rem; border-radius: 50%; object-fit: cover; "></a>
                
                <div id="uf" class="modal" style="width:29rem">
                    <form method="post" style="width: 29rem;display: inline-block">
                        <input type="file" name="upload" id="upload">
                        <input type="submit" value="Upload">
                    </form>
                </div>
                <form method="post" style="width: 8rem;display: inline-block">
                    <input type="hidden" name="default6" value="default6.png" style="width: 8rem;">
                    <input type="hidden" style="width: 8rem;">
                </form>
            </div>
            <label style="display: block; text-align: center;">Local</label>
        </div>
    </div>
    <a>Nombre de usuario:
        <?php echo ($_SESSION['usuario']['usu_nombre']); ?>
    </a>
    <br>
    <a>Correo:
        <?php echo ($_SESSION['usuario']['usu_email']); ?>
    </a>
    <br>
    <a>La cuenta fue creada:
        <?php echo ($_SESSION['usuario']['fecha_alta']); ?>
    </a>

    <p><a href="#ep" rel="modal:open">Editar perfil</a></p>
    <div id="ep" class="modal">
        <!--Edit nombre-->
        <p><a href="#en" rel="modal:open">Cambiar nombre</a></p>
        <div id="en" class="modal" style="width:15rem">
            <div style="margin: top 0;padding: top 0;border-bottom: 1px solid cadetblue;">
                <h4 style="vertical-align: top;">Editar nombre de usuario</h4>
            </div>
            <br>
            <div>
                <form method="post">
                    <input type="text" name="nombre" id="nombre" value="<?php echo $_SESSION['usuario']['usu_nombre'] ?>" required>
                    <br><br>
                    <input type="submit" value="Confirmar" style="float: left;">
                    <button style="float: right;"> <a href="#ep" rel="modal:open" style="text-decoration:none; color:black">Cancelar</a></button>
            </div>
            </form>
        </div>

        <!--Fin edit nombre-->
        <!--Edit contra-->
        <p><a href="#ec" rel="modal:open">Cambiar contraseña</a></p>
        <div id="ec" class="modal" style="width:15rem">
            <div style="margin: top 0;padding: top 0;border-bottom: 1px solid cadetblue;">
                <h4 style="vertical-align: top;">Editar contraseña</h4>
            </div>
            <br>
            <div>
                <form method="post">
                    <input type="password" name="actpass" id="actpass" placeholder="Contraseña actual" required>
                    <br><br>
                    <input type="password" name="newpass" id="newpass" placeholder="Contraseña nueva" required>
                    <br><br>
                    <input type="submit" value="Confirmar" style="float: left;">
                    <button style="float: right;"> <a href="#ep" rel="modal:open" style="text-decoration:none; color:black">Cancelar</a></button>
                </form>
            </div>
        </div>
        <!--Fin edit contra-->
        <a href="#" rel="modal:close">Close</a>
    </div>