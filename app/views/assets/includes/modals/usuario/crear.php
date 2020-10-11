<div class="modal-container" id="modal-crear">

    <div class="container modal-close" id="cont-modal-crear">
        <div class="row">
            <div class="col-md-4 offset-md-4 form login-form">
                <p class="close text-center" id="close-modal-crear">&times;</p>
                <form action="#" method="POST" autocomplete="" id="form-create">
                    <h2 class="text-center">
                        Crear Usuario</h2>
                    <p class="text-center">
                        Crea un usuario fácil y rápido.</p>
                    <div class="alert alert-danger text-center collapse"></div>
                    <div class="alert alert-success text-center collapse"></div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="nombrecrear" placeholder="Nombres" required>
                        <input class="form-control input-separe" type="text" name="apellidocrear" placeholder="Apellidos" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="emailcrear" placeholder="Correo Electronico" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="telefonocrear" placeholder="Telefono" required>
                        <input class="form-control input-separe" type="text" name="cedulacrear" placeholder="Cedula" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="passcrear" placeholder="Password" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="cpasscrear" placeholder="Confirmar Password" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="rolcrear" required>
                            <option selected="true" disabled="disabled" class="noselected">Seleccione el rol</option>
                            <?php if (strtolower($infouser['nomrol']) == "superadmin") { ?>
                                <option value="coordinador">Coordinador</option>
                                <option value="contador">Contador</option>
                                <option value="declarante">Declarante</option>
                            <?php } else { ?>
                            <option value="contador">Contador</option>
                            <option value="declarante">Declarante</option>
                            <?php } ?>
                        </select>
                        <select class="form-control input-separe" name="estadocrear" required>
                            <option selected="true" disabled="disabled" class="noselected">Seleccione el estado</option>
                            <option value="activo">Activo</option>
                            <option value="inactivo">Inactivo</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="login" value="Crear Usuario">
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
