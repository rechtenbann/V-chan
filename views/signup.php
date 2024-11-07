<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha384-ZM+Igh7tGha7ZoD/eSJK2FAzWy0Z6q95u7XN2ogb+NLKpZvgTqTcBE8t+/xDSm/C" crossorigin="anonymous">
<link rel="stylesheet" href="css/form.css">

<div align="center">
    <div class="containerForm">
        <h3>Signup</h3>
        <form method="POST" >
            <div style="margin-bottom:20px;">
                <label for="login__username">Username</label>
                <input autocomplete="username" id="login__username" type="text" name="nombre" class="form__input inputTextForm" placeholder="Nombre de usuario" required>
            </div>
            <div style="margin-bottom:20px;">
                <label for="login__username">E-mail</label>
                <input autocomplete="username" id="login__username" type="text" name="email" class="form__input inputTextForm" placeholder="E-mail del usuario" required>
            </div>
            <div style="margin-bottom:20px;">
                <label for="login__password">Password</label>
                <input id="login__password" type="password" name="contra" class="form__input inputTextForm" placeholder="Contraseña" required>
            </div>
            <div style="margin-top:10px;">
                <input type="submit" value="Iniciar Sesion" class="inputSubmitForm">
            </div>
        </form>
        <p class="text--center" style="font-family:AnimeAce;">¿Ya tienes una cuenta? <a href="login.php"  style="color:#212121; text-decoration:none;">Inicia sesión</a>
            <!-- <svg class="icon">
                <use xlink:href="#icon-arrow-right"></use>
            </svg> -->
        </p>
    </div>
</div>
