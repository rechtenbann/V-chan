
<div >
<form method="POST">
        <div>
            <label for="login_username">
                <span class="hidden">Username</span>
            </label>
            <input autocomplete="username" id="login__username" type="text" name="nombre" class="form__input" placeholder="Nombre de usuario" required>
        </div>
        <div>
            <label for="login__password">
                <span class="hidden">Password</span>
            </label>
            <input id="login__password" type="password" name="contra" class="form__input" placeholder="Contraseña" required>
        </div>
        <input type="checkbox" name="cookie"> Mantener sesión iniciada
        <div>
            <input type="submit" value="Iniciar Sesion">
        </div>
    </form>
        <p class="text--center">No tienes cuenta? <a href="signup.php">Registrate</a>
            <svg class="icon">
                <use xlink:href="#icon-arrow-right"></use>
            </svg>
        </p>
    </div>
    </div>
    