<div class="modal-container" id="modal-crear-cedulageneral">

    <div class="container modal-close" id="cont-modal-crear-cedulageneral">
        <div class="row">
            <div class="col-md-4 offset-md-4 form login-form">
                <p class="close text-center" id="close-modal-crear-cedulageneral">&times;</p>
                <form action="#" method="POST" autocomplete="" id="form-crear-cedulageneral">
                    <h2 class="text-center">
                    Crear Tipos de <br>Cedula General</h2>

                    <div class="progress-bar">
                        <div class="step">
                            <p class="stepcreargeneral">Renta</p>
                            <div class="bullet bulletcreargeneral">
                                <span>1</span>
                            </div>
                            <div class="check checkcreargeneral fas fa-check"></div>
                        </div>
                        <div class="step">
                            <p class="stepcreargeneral">Aspectos</p>
                            <div class="bullet bulletcreargeneral">
                                <span>2</span>
                            </div>
                            <div class="check checkcreargeneral fas fa-check"></div>
                        </div>
                    </div>

                    <div class="slide-page slide-page-crear-general">
                        
                    <label for="" class="form-label">Renta</label>
                        <div class="form-group">
                            <select class="form-control" name="rentacedulageneralcrear" id="rentacedulageneralcrear" required>
                                <option selected="true" disabled="disabled" class="noselected">Seleccione la renta</option>
                                <option value="rentatrabajo">Renta de trabajo</option>
                                <option value="rentacapital">Renta de capital</option>
                                <option value="rentanolaborales">Renta no laborales</option>
                            </select>
                        </div>
                        <label for="" class="form-label">Tipo de Renta</label>
                        <div class="form-group">
                            <select class="form-control" disabled name="tiporentacedulageneralcrear" id="tiporentacedulageneralcrear" required>
                                <option selected="true" disabled="disabled" class="noselected">Seleccione el tipo renta</option>
                            </select>
                        </div>
                        <div class="scond" id="divaspectocedulageneral">
                        <label for="" class="form-label">Aspecto</label>
                        <div class="form-group">
                            <select class="form-control" disabled name="aspectoscedulageneralcrear" id="aspectoscedulageneralcrear">
                                <option selected="true" disabled="disabled" class="noselected">Seleccione el aspecto</option>
                            </select>
                        </div>
                        </div>
                        <div class="form-group">
                            <button class="form-control button firstNextgeneral isdisabled">Siguiente</button>
                        </div>
                    </div>

                    <div class="slide-page-2 slide-page-crear-2-general">
                        
                        <label for="" class="form-label">Nombre</label>
                        <div class="form-group">
                            <input class="form-control" type="text" name="nombrecedulageneralcrear" placeholder="Nombre">
                        </div>
                        <label for="" class="form-label">Descripcion</label>
                        <div class="form-group">
                            <textarea class="form-control" name="descripcioncedulageneralcrear" cols="30" rows="10"></textarea>
                        </div>
                        <label for="" class="form-label">Ayuda</label>
                        <div class="form-group">
                            <textarea class="form-control" name="ayudacedulageneralcrear" cols="30" rows="10"></textarea>
                        </div>

                        <div class="form-group">
                            <button class="form-control button firstPrevgeneral">Anterior</button>
                            <input class="form-control button" type="submit" name="cedulageneral" value="Crear">
                        </div>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>