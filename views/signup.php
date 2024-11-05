<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha384-ZM+Igh7tGha7ZoD/eSJK2FAzWy0Z6q95u7XN2ogb+NLKpZvgTqTcBE8t+/xDSm/C" crossorigin="anonymous">

    <div >
        <form method="POST" >
            <div>
                <label for="login__username">
                    <span class="hidden">Username</span>
                </label>
                <input autocomplete="username" id="login__username" type="text" name="nombre" class="form__input" placeholder="Nombre de usuario" required>
            </div>
            <div >
                <label for="login__username">
                    <span class="hidden">E-mail</span>
                </label>
                <input autocomplete="username" id="login__username" type="text" name="email" class="form__input" placeholder="Nombre de usuario" required>
            </div>
            <div >
                <label for="login__password">
                    <span class="hidden">Password</span>
                </label>
                <input id="login__password" type="password" name="contra" class="form__input" placeholder="Contraseña" required>
            </div>
            <div >
                <input type="submit" value="Iniciar Sesion">
            </div>
        </form>
        <p class="text--center">¡Ya tienes una cuenta? <a href="login.php"  style="color:#212121;">Inicia sesión</a>
            <svg class="icon">
                <use xlink:href="#icon-arrow-right"></use>
            </svg>
        </p>
    </div>
    </div>
    
