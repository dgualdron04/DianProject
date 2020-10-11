<div class="row collapse" id="register">
    <div class="col-md-4 offset-md-4 form">
        <p class="close text-center">&times;</p>
        <form action="#" method="POST" autocomplete="" id="form-register">
            <h2 class="text-center">
                Formulario de Registro</h2>
            <p class="text-center">
                Es rápido y sencillo.</p>
            <div class="alert alert-danger text-center collapse" id="alert-danger"></div>
            <div class="alert alert-success text-center collapse" id="alert-success"></div>
            <div class="alert alert-danger collapse"></div>
            <div class="form-group">
                <input class="form-control" type="text" name="nombreregistro" placeholder="Nombres" id="nombresregistro" required>
            </div>
            <div id="correoerror"></div>
            <div class="form-group">
                <input class="form-control" type="text" name="apellidoregistro" placeholder="Apellidos" id="apellidosregistro" required>
            </div>
            <div class="form-group">
                <input class="form-control" type="email" name="correoregistro" placeholder="Correo Electrónico" id="correosregistro" required>
            </div>
            <div class="form-group">
                <input class="form-control" type="password" name="passwordregistro" placeholder="Password" id="contraregistro" required autocomplete="off">
            </div>
            <div class="form-group">
                <input class="form-control" type="password" name="cpasswordregistro" placeholder="Confirmar password" id="ccontraregistro" required autocomplete="off">
            </div>
            <div class="form-group">
                <input class="form-control button" type="submit" name="signup" value="Completar Registro">
            </div>
            <div class="link login-link text-center">
                ¿Ya estas registrado? <a href="#" id="boton-login">Inicie Sesión Aquí</a></div>
        </form>
    </div>
</div>