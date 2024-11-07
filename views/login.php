<link rel="stylesheet" href="css/form.css">

<div align="center">
    <div class="containerForm">
        <h3>Log in</h3>
        <form method="POST">
            <div>
                <label for="login_username"> Username </label>
                <input autocomplete="username" id="login__username" type="text" name="nombre" class="form__input inputTextForm" placeholder="Nombre de usuario" required>
            </div>
            <div style="margin-top:20px; margin-bottom:20px;">
                <label for="login__password">Password</label>
                <input id="login__password" type="password" name="contra" class="form__input inputTextForm" placeholder="Contraseña" required>
            </div>
            <div style="font-family:AnimeAce; margin-bottom:10px;">
                <input type="checkbox" name="cookie"> Mantener sesión iniciada
            </div>      
            <div>
                <input type="submit" value="Iniciar Sesion" class="inputSubmitForm">
            </div>
        </form>
        <p class="text--center" style="font-family:AnimeAce;">¿No tienes cuenta? <a href="signup.php" style="color:#212121; text-decoration:none;">Registrate</a>
            <!-- <svg class="icon">
                <use xlink:href="#icon-arrow-right"></use>
            </svg> -->
        </p>
    </div>
</div>
    