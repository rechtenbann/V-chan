<?php if (!isset($_GET['usr']) || $_GET['usr'] == $_SESSION['usuario']['id']) { ?>
    <div align="center">
        <div class="profile-img" style="margin:2rem">
            <div style="position:relative">
                <div>
                    <a href="#ei" rel="modal:open" style="margin: auto; width: 50%;" id="image"><img src="img/users/<?php echo $_SESSION['usuario']['foto_perfil']; ?>" alt="" class="profile"></a>
                </div>
                <div id="text" style="position:absolute; width: 100%; top:50%"></div>
            </div>

            <div id="ei" class="modal" style="width:29rem;">
                <?php if($_SESSION['usuario']['rango']=="administrador"){ ?>
                    <a href="#secret" rel="modal:open" style="text-decoration: none; color: black; cursor: default;">
                    <h3>Default</h3>
                </a>
                    <?php }else{ ?>
                        <a style="text-decoration: none; color: black; cursor: default;">
                    <h3>Default</h3>
                </a>
                        <?php } ?>
                <div id="secret" class="modal" style="width:25rem; height:25rem; text-align: center; background-color: hotpink;">
                    <div class="Height">
                        <form method="post">
                            <br>
                            <input type="image" src="img/users/default1.png" class="void-secret" disabled>
                            <label class="lbl">Useless</label>
                        </form>
                    </div>
                    <div style="display: inline-block;">
                        <form method="post" class="option-form-secret">
                            <input type="hidden" name="default-secret" value="default-secret.png" class="Height">
                            <input title="Set H-Chan as profile photo" type="image" id="default-secret" class="option-photo-secret" name="default-secret" value="default-secret.png" alt="Login" src="img/users/default-secret_full2.png">
                            <label >H-Chan</label>
                        </form>
                    </div>
                </div>

                <div style="border-bottom: 1px solid black;border-top: 1px solid black;">
                    <div>
                        <div class="Height">
                            <form method="post" class="option-form" style="user-select:none">
                                <br>
                                <input type="image" src="img/users/default1.png" class="void" disabled>
                                <label class="lbl">Useless</label>
                            </form>
                        </div>
                        <div style="display: inline-block;">
                            <form method="post" class="option-form">
                                <input type="hidden" name="default1" value="default1.png" class="Height">
                                <input title="Set V-Chan as profile photo" type="image" id="default1" class="option-photo" name="default1" value="default1.png" alt="Login" src="img/users/default1.png">
                                <label style="display: block; text-align: center;">V-chan</label>
                            </form>
                        </div>
                        <div style="display: inline-block;">
                            <form method="post" class="option-form">
                                <input type="hidden" name="default2" value="default2.png" class="Height">
                                <input title="Set D-Kun as profile photo" type="image" id="default2" class="option-photo" name="default2" value="default2.png" alt="Login" src="img/users/default2.png">
                                <label style="display: block; text-align: center;">V-kun</label>
                            </form>
                        </div>
                        <div style="display: inline-block;">
                            <form method="post" class="option-form">
                                <input type="hidden" name="default3" value="default3.png" class="Height">
                                <input title="Set D-Chan as profile photo" type="image" id="default3" class="option-photo" name="default3" value="default4.png" alt="Login" src="img/users/default3.png">
                                <label style="display: block; text-align: center;">D-chan</label>
                            </form>
                        </div>
                    </div>
                    <div>
                        <div class="Height">
                            <form method="post" class="option-form" style="user-select:none">
                                <br>
                                <input type="image" src="img/users/default1.png" class="void" disabled>
                                <label class="lbl">Useless</label>
                            </form>
                        </div>
                        <div style="display: inline-block;">
                            <form method="post" class="option-form">
                                <input type="hidden" name="default4" value="default4.png" class="Height">
                                <input title="Set P-Chan as profile photo" type="image" id="default4" class="option-photo" name="default4" value="default4.png" alt="Login" src="img/users/default4.png">
                                <label style="display: block; text-align: center;">P-chan</label>
                            </form>
                        </div>
                        <div style="display: inline-block;" class="cont">
                            <form method="post" class="option-form">
                                <input type="hidden" name="default5" value="default5.png" class="Height">
                                <input title="Set K-Chan as profile photo" type="image" id="default5" class="option-photo" name="default5" value="default5.png" alt="Login" src="img/users/default5.png">
                                <label style="display: block; text-align: center;">K-chan</label>
                            </form>
                        </div>
                        <div style="display: inline-block;">
                            <form method="post" class="option-form">
                                <input type="hidden" name="default6" value="default6.png" class="Height">
                                <input title="Set S-Chan as profile photo" type="image" id="default6" class="option-photo" name="default6" value="default6.png" alt="Login" src="img/users/default6.png">
                                <label style="display: block; text-align: center;">S-chan</label>
                            </form>
                        </div>
                    </div>
                </div>
                <h3>Custom</h3>
                <div style="height: 30%; width: 100%; border-radius: 1rem; background-color: gray; background-image:url(img/users/upload.png); background-size:contain; background-repeat:no-repeat; background-position:center">
                    <form method="post" style="width: 8rem;display: inline-block">
                        <input type="hidden" name="default6" value="default6.png" style="width: 8rem;">
                        <input type="hidden" style="width: 8rem;">
                    </form>
                    <a href="#uf" rel="modal:open"><img src="img/users/blank.png" alt="" style="height: 3rem;width: 100%; border-radius: 50%; object-fit: cover; "></a>

                    <div id="uf" class="modal" style="width:29rem">
                        <!-- <form method="post" style="width: 29rem;display: inline-block">
                        <input type="file" name="upload" id="upload">
                        <input type="submit" value="Upload">
                    </form> -->
                        Work in progress
                    </div>
                    <form method="post" style="width: 8rem;display: inline-block">
                        <input type="hidden" name="default6" value="default6.png" style="width: 8rem;">
                        <input type="hidden" style="width: 8rem;">
                    </form>
                </div>
                <label style="display: block; text-align: center;">Local</label>
            </div>
        </div>
        <a style='font-size: larger'>
            <?php echo ($_SESSION['usuario']['usu_nombre']); if($_SESSION['usuario']['fecha_baja']!=null){echo " | BANNED";}?>
        </a>
       
        <!-- <br>
        <a>
            <?php echo $_SESSION['usuario']['rango']; ?>
        </a> -->
        <br>
        <a style="color: gray; font-size: small;">
            <?php echo ($_SESSION['usuario']['usu_email']); ?>
        </a>
        <!-- <br>
        <a>La cuenta fue creada:
            <?php echo ($_SESSION['usuario']['fecha_alta']); ?>
        </a> -->

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
                        <input type="submit" value="Confirmar ✓" style="float: left;">
                        <button style="float: right;"> <a href="#ep" rel="modal:open" style="text-decoration:none; color:black">Cancelar ✗</a></button>
                </div>
                </form>
            </div>

            <!--Fin edit nombre-->
            <!--Edit mail-->
            <p><a href="#em" rel="modal:open">Cambiar email</a></p>
            <div id="em" class="modal" style="width:15rem">
                <div style="margin: top 0;padding: top 0;border-bottom: 1px solid cadetblue;">
                    <h4 style="vertical-align: top;">Editar mail</h4>
                </div>
                <br>
                <div>
                    <form method="post">
                        <input type="password" name="actpass" id="actpass" placeholder="Contraseña actual" required>
                        <br><br>
                        <input type="password" name="newpass" id="newpass" placeholder="Contraseña nueva" required>
                        <br><br>
                        <input type="submit" value="Confirmar ✓" style="float: left;">
                        <button style="float: right;"> <a href="#ep" rel="modal:open" style="text-decoration:none; color:black">Cancelar ✗</a></button>
                    </form>
                </div>
            </div>
            <!--Fin edit mail-->
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
                        <input type="submit" value="Confirmar ✓" style="float: left;">
                        <button style="float: right;"> <a href="#ep" rel="modal:open" style="text-decoration:none; color:black">Cancelar ✗</a></button>
                    </form>
                </div>
            </div>
            <!--Fin edit contra-->
        </div>
    </div>



<?php } else { ?>
    <div align="center">
        <div class="profile-img" style="margin:2rem">
            <div class="container" style="position:relative">

                <div>
                    <a style="margin: auto; width: 50%;"><img src="img/users/<?php echo $user['foto_perfil']; ?>" alt="" style="height: 20rem;width: 20rem; border-radius: 50%; object-fit: cover; background-color: white;"></a>


                </div>
                <div id="text" style="position:absolute; width: 100%; top:50%"></div>

            </div>
        </div>
        <a style='font-size: larger'><?php  echo $user['usu_nombre']; if($user['fecha_baja']!=null){echo " | BANNED";}?>
        
        </a>
        <!-- <br>
        <a>Rango:
            <?php
            echo $userrank['rango'];
            ?>
        </a> -->
        <br>
        <a style="color: gray; font-size: small;">
            <?php echo ($user['usu_email']); ?>
        </a>
        <!-- <br>
        <a>La cuenta fue creada:
            <?php echo ($user['fecha_alta']); ?>
        </a> -->
    </div>
<?php } ?>