<h1>Iniciar sesion</h1>
<form method="POST">
    <label>Nombre de usuario</label>
    <input type="text" name="nombre" required>
    <br>
    <br>
    <label>Contraseña</label>
    <input type="text" name="contra" required>
    <br>
    <br>
    <input type="submit" value="Log in">
</form>
<br>
<?php if(isset($_GET['exito']) && $_GET['exito'] == "si"){ ?>
    <p>¡Se ha registrado con exito usuario <?php echo $_SESSION['usuario']['usu_nombre']; ?>!</p>    
<?php } else if(isset($_GET['exito']) && $_GET['exito'] == "no"){ ?>
    <p>La contraseña o nombre de usuario es incorrecta</p>    
<?php } ?>