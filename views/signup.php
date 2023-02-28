<h1>Registrarse</h1>
<form method="POST">
    <label>Nombre de usuario</label>
    <input type="text" name="nombre" required>
    <br>
    <br>
    <label>Correo electrónico</label>
    <input type="email" name="email" required>
    <br>
    <br>
    <label>Contraseña</label>
    <input type="password" name="contra" required>
    <br>
    <br>
    <input type="submit" value="Signup">
</form>
<br>
<?php if(isset($_GET['r']) && $_GET['r'] == "t"){ ?>
    <p>¡Se ha registrado con exito usuario!</p>    
<?php } else if(isset($_GET['r']) && $_GET['r'] == "f"){ ?>
    <p>Error al registrarse</p>    
<?php } ?>