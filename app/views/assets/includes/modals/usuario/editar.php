<div class="modal-container" id="modal-edit">

    <div class="container modal-close" id="cont-modal-edit">
        <div class="row">
            <div class="col-md-4 offset-md-4 form login-form">
                <p class="close text-center" id="close-modal-edit">&times;</p>
                <form action="#" method="POST" autocomplete="" id="form-edit">
                    <h2 class="text-center">
                        Editar Usuario</h2>
                    <p class="text-center">
                        Edita un usuario fácil y rápido.</p>
                    <div class="alert alert-danger text-center collapse"></div>
                    <div class="alert alert-success text-center collapse"></div>
                    <div class="form-group">
                        <input class="form-control scond" type="text" name="codeditar" id="codeditar" disabled required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="nombreeditar" id="nombreeditar" placeholder="Nombres" required>
                        <input class="form-control input-separe" type="text" id="apellidoeditar" name="apellidoeditar" placeholder="Apellidos" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="emaileditar" id="emaileditar" placeholder="Correo Electronico" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="telefonoeditar" id="telefonoeditar" placeholder="Telefono" required>
                        <input class="form-control input-separe" type="text" name="cedulaeditar" id="cedulaeditar" placeholder="Cedula" required>
                    </div>
                    <!-- <div class="form-group">
                        <input class="form-control" type="password" name="passeditar" id="passeditar" placeholder="Password" autocomplete="off" required>
                    </div> -->
                    <div class="form-group">
                        <select class="form-control" name="roleditar" id="roleditar" required >
                            <option selected="true" disabled="disabled" class="noselected">Seleccione el rol</option>
                            <option value="contador">Contador</option>
                            <option value="declarante">Declarante</option>
                        </select>
                        <select class="form-control input-separe" name="estadoeditar" id="estadoeditar" required>
                            <option selected="true" disabled="disabled" class="noselected">Seleccione el estado</option>
                            <option value="activo">Activo</option>
                            <option value="inactivo">Inactivo</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="login" value="Actualizar">
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>