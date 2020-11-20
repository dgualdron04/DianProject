<div class="modal-container" id="modal-crear-cedulapensiones">

    <div class="container modal-close" id="cont-modal-crear-cedulapensiones">
        <div class="row">
            <div class="col-md-4 offset-md-4 form login-form">
                <p class="close text-center" id="close-modal-crear-cedulapensiones">&times;</p>
                <form action="#" method="POST" autocomplete="" id="form-crear-cedulapensiones">
                    <h2 class="text-center">
                    Crear Tipos de <br>Cedula de Pensiones</h2>

                    <div class="progress-bar">
                        <div class="step">
                            <p class="stepcrearpensiones">Ingreso</p>
                            <div class="bullet bulletcrearpensiones">
                                <span>1</span>
                            </div>
                            <div class="check checkcrearpensiones fas fa-check"></div>
                        </div>
                        <div class="step">
                            <p class="stepcrearpensiones">Tipo de Ingreso</p>
                            <div class="bullet bulletcrearpensiones">
                                <span>2</span>
                            </div>
                            <div class="check checkcrearpensiones fas fa-check"></div>
                        </div>
                    </div>

                    <div class="slide-page slide-page-crear-pensiones">
                        
                        <label for="" class="form-label">Ingreso o Renta</label>
                        <div class="form-group">
                            <select class="form-control" name="ingresoscedulapensionescrear" id="ingresoscedulapensionescrear" required>
                                <option selected="true" disabled="disabled" class="noselected">Seleccione la renta</option>
                                <option value="ingresobruto">Ingreso bruto</option>
                                <option value="ingresonoconstitutivo">Ingresos no constitutivos</option>
                            </select>
                        </div>
                        <div class="scond" id="divtipoingreso">
                        <label for="" class="form-label">Tipo de Ingreso o Renta</label>
                        <div class="form-group">
                            <select class="form-control" disabled name="tipoingresopensionescrear" id="tipoingresopensionescrear" required>
                                <option selected="true" disabled="disabled" class="noselected">Seleccione el tipo renta</option>
                            </select>
                        </div>
                        </div>

                        <div class="form-group">
                            <button class="form-control button firstNextpensiones isdisabled">Siguiente</button>
                        </div>
                    </div>

                    <div class="slide-page-2 slide-page-crear-2-pensiones">
                        
                        <label for="" class="form-label">Nombre</label>
                        <div class="form-group">
                            <input class="form-control" type="text" name="nombrepensionescrear" placeholder="Nombre">
                        </div>
                        <label for="" class="form-label">Descripcion</label>
                        <div class="form-group">
                            <textarea class="form-control" name="descripcionpensionescrear" cols="30" rows="10"></textarea>
                        </div>
                        <label for="" class="form-label">Ayuda</label>
                        <div class="form-group">
                            <textarea class="form-control" name="ayudapensionescrear" cols="30" rows="10"></textarea>
                        </div>

                        <div class="form-group">
                            <button class="form-control button firstPrevpensiones">Anterior</button>
                            <input class="form-control button" type="submit" name="cedulapensiones" value="Crear">
                        </div>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>