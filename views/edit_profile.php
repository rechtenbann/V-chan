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
                <input type="text" name="nombre" id="nombre" value="<?php echo $_SESSION['usuario']['usu_nombre'] ?>"
                    required>
                <br><br>
                <input type="submit" value="Confirmar ✓" style="float: left;">
                <button style="float: right;"> <a href="#ep" rel="modal:open"
                        style="text-decoration:none; color:black">Cancelar ✗</a></button>
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
                <button style="float: right;"> <a href="#ep" rel="modal:open"
                        style="text-decoration:none; color:black">Cancelar ✗</a></button>
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
                <button style="float: right;"> <a href="#ep" rel="modal:open"
                        style="text-decoration:none; color:black">Cancelar ✗</a></button>
            </form>
        </div>
    </div>
    <!--Fin edit contra-->
</div>
<div id="ei" class="modal" style="width:29rem;">
    <a style="text-decoration: none; color: black; cursor: default;" <?php if (isset($_GET['RLLVTeam']) && $_GET['RLLVTeam'] == 't'&&$_SESSION['usuario']['rango']=="administrador") {
        echo "href='#sec' rel='modal:open'";
    } ?>>
        <h3 style="color: black; font-size: 2rem;">Icons</h3>
    </a>


    <div id="sec" class="modal" style="width:15rem">
        <div style="display: inline-block;">
            <div style="display: inline-block;">
                <form method="post" class="option-form">
                    <input type="hidden" name="v2" value="v2.png" class="Height">
                    <input title="Set v2 as profile photo" type="image" id="v2" class="option-photo" name="v2"
                        value="v2.png" alt="Login" src="img/users/v2.png">
                </form>
            </div>
            <div style="display: inline-block;">
                <form method="post" class="option-form">
                    <input type="hidden" name="sui" value="sui.png" class="Height">
                    <input title="Set sui as profile photo" type="image" id="sui" class="option-photo" name="sui"
                        value="sui.png" alt="Login" src="img/users/sui.png">
                </form>
            </div>
            <div style="display: inline-block;">
                <form method="post" class="option-form">
                    <input type="hidden" name="vv" value="vv.png" class="Height">
                    <input title="Set vv as profile photo" type="image" id="vv" class="option-photo" name="vv"
                        value="vv.png" alt="Login" src="img/users/vv.png">
                </form>
            </div>
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
                    <input title="Set V-Chan as profile photo" type="image" id="default1" class="option-photo"
                        name="default1" value="default1.png" alt="Login" src="img/users/default1.png">
                    <label style="display: block; text-align: center;">V (F)</label>
                </form>
            </div>
            <div style="display: inline-block;">
                <form method="post" class="option-form">
                    <input type="hidden" name="default2" value="default2.png" class="Height">
                    <input title="Set D-Kun as profile photo" type="image" id="default2" class="option-photo"
                        name="default2" value="default2.png" alt="Login" src="img/users/default2.png">
                    <label style="display: block; text-align: center;">V (M)</label>
                </form>
            </div>
            <div style="display: inline-block;">
                <form method="post" class="option-form">
                    <input type="hidden" name="default3" value="default3.png" class="Height">
                    <input title="Set D-Chan as profile photo" type="image" id="default3" class="option-photo"
                        name="default3" value="default4.png" alt="Login" src="img/users/default3.png">
                    <label style="display: block; text-align: center;">D</label>
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
                    <input title="Set P-Chan as profile photo" type="image" id="default4" class="option-photo"
                        name="default4" value="default4.png" alt="Login" src="img/users/default4.png">
                    <label style="display: block; text-align: center;">P</label>
                </form>
            </div>
            <div style="display: inline-block;" class="cont">
                <form method="post" class="option-form">
                    <input type="hidden" name="default5" value="default5.png" class="Height">
                    <input title="Set K-Chan as profile photo" type="image" id="default5" class="option-photo"
                        name="default5" value="default5.png" alt="Login" src="img/users/default5.png">
                    <label style="display: block; text-align: center;">K</label>
                </form>
            </div>
            <div style="display: inline-block;">
                <form method="post" class="option-form">
                    <input type="hidden" name="default6" value="default6.png" class="Height">
                    <input title="Set S-Chan as profile photo" type="image" id="default6" class="option-photo"
                        name="default6" value="default6.png" alt="Login" src="img/users/default6.png">
                    <label style="display: block; text-align: center;">S</label>
                </form>
            </div>
        </div>
    </div>
    <h3 style="color: black; font-size: 2rem;">Background (wip)</h3>
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
                <input type="hidden" name="blank" value="blank.png" class="Height">
                <input type="image" id="blank" class="option-photo" name="blank" value="blank.png" alt="Login"
                    src="img/users/noneB.png">
                <label style="display: block; text-align: center;">None</label>
            </form>
        </div>
        <div style="display: inline-block;">
            <form method="post" class="option-form">
                <input type="hidden" name="blank1" value="blank.png" class="Height">
                <input type="image" id="blank1" class="option-photo" name="blank1" value="blank.png" alt="Login"
                    src="img/users/blank.png" style="background-color:white">
                <label style="display: block; text-align: center;">White</label>
            </form>
        </div>
        <div style="display: inline-block;">
            <form method="post" class="option-form">
                <input type="hidden" name="blank2" value="blank.png" class="Height">
                <input type="image" id="blank2" class="option-photo" name="blank2" value="blank.png" alt="Login"
                    src="img/users/blank.png" style="background-color:black">
                <label style="display: block; text-align: center;">Black</label>
            </form>
        </div>
    </div>
</div>