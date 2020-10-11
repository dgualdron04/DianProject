<div class="row" id="login">
    <div class="col-md-4 offset-md-4 form login-form">
        <p class="close text-center">&times;</p>
        <form action="#" method="POST" autocomplete="" id="form-login">
            <h2 class="text-center">
                Iniciar Sesión</h2>
            <p class="text-center">
                Inicie sesión con su correo electrónico y contraseña.</p>
            <div class="alert alert-danger text-center collapse" id="logalert-danger"></div>
            <div class="alert alert-success text-center collapse" id="logalert-success"></div>
            <div class="form-group">
                <input class="form-control" type="email" name="correo" id="correologin" placeholder="Correo Electrónico" required>
            </div>
            <div class="form-group">
                <input class="form-control" type="password" name="password" id="contralogin" placeholder="Password" required autocomplete="off">
            </div>
            <div class="form-group">
                <input class="form-control button" type="submit" name="login" value="Entrar">
            </div>
            <div class="link login-link text-center">
                ¿Todavía no eres miembro? <a href="#" id="boton-register">Regístrate ahora</a></div>
        </form>
    </div>
</div>