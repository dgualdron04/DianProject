<div class="modal-container" id="modal-crear-cedulas">

    <div class="container modal-close" id="cont-modal-crear-cedulas">
        <div class="row">
            <div class="col-md-4 offset-md-4 form login-form">
                <p class="close text-center" id="close-modal-crear-cedulas">&times;</p>
                <form action="#" method="POST" autocomplete="" id="form-crear-cedulas">
                    <h2 class="text-center">
                    Crear <br>Cedulas</h2>

                    <div class="slide-page slide-page-crear-cedulas">
                        
                    <label for="" class="form-label">Cedulas</label>
                        <div class="form-group">
                            <select class="form-control" name="rentacedulascrear" id="rentacedulascrear" required>
                                <option selected="true" disabled="disabled" class="noselected">Seleccione la Cedula</option>
                                <option value="cedulageneral">Cedula General</option>
                                <option value="cedulapensiones">Cedula de pensiones</option>
                                <option value="ceduladividendosyparticipaciones">Cedula de dividendos y participaciones</option>
                            </select>
                        </div>
                        <label for="" class="form-label">Tipo de Cedula</label>
                        <div class="form-group">
                            <select class="form-control" disabled name="tipocedulacrear" id="tipocedulacrear" required>
                                <option selected="true" disabled="disabled" class="noselected">Seleccione el tipo de Cedula</option>
                            </select>
                        </div>
                        <div class="scond" id="divtiporentacrearcedula">
                        <label for="" class="form-label">Tipo de Renta</label>
                        <div class="form-group">
                            <select class="form-control" disabled name="tiporentacedulacrear" id="tiporentacedulacrear">
                                <option selected="true" disabled="disabled" class="noselected">Seleccione el Tipo de Renta</option>
                            </select>
                        </div>
                        </div>
                        <div class="scond" id="divaspectoscrearcedula">
                        <label for="" class="form-label">Aspectos</label>
                        <div class="form-group">
                            <select class="form-control" disabled name="aspectoscedulascrear" id="aspectoscedulascrear">
                                <option selected="true" disabled="disabled" class="noselected">Seleccione el Aspecto</option>
                            </select>
                        </div>
                        </div>
                        <div class="form-group">
                            <button class="form-control button firstNextcedulas isdisabled">Siguiente</button>
                        </div>
                    </div>

                    <div class="slide-page-2 slide-page-crear-2-cedulas">
                        
                        <label for="" class="form-label">Valor</label>
                        <div class="form-group">
                            <input class="form-control" type="number" min="0" name="valoraspectoscedulascrear" placeholder="Valor">
                        </div>
                        
                        <div class="form-group">
                            <button class="form-control button firstPrevcedulas">Anterior</button>
                            <input class="form-control button" type="submit" name="cedulas" value="Crear">
                        </div>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>