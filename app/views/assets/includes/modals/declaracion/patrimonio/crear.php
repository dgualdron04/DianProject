<div class="modal-container" id="modal-crear-patrimonio">

    <div class="container modal-close" id="cont-modal-crear-patrimonio">
        <div class="row">
            <div class="col-md-4 offset-md-4 form login-form">
                <p class="close text-center" id="close-modal-crear-patrimonio">&times;</p>
                <form action="#" method="POST" autocomplete="" id="form-crear-patrimonio">
                    <h2 class="text-center">
                    Crear Tipos de Patrimonio</h2>

                    <div class="progress-bar">
                        <div class="step">
                            <p class="stepcrearpatrimonio">Patrimonio</p>
                            <div class="bullet bulletcrearpatrimonio">
                                <span>1</span>
                            </div>
                            <div class="check checkcrearpatrimonio fas fa-check"></div>
                        </div>
                        <div class="step">
                            <p class="stepcrearpatrimonio">Valores</p>
                            <div class="bullet bulletcrearpatrimonio">
                                <span>2</span>
                            </div>
                            <div class="check checkcrearpatrimonio fas fa-check"></div>
                        </div>
                    </div>

                    <div class="slide-page slide-page-crear-patrimonio">
                        
                    <label for="" class="form-label">Tipo de Patrimonio</label>
                        <div class="form-group">
                        <select class="form-control" name="tipopatrimoniocrear" id="tipopatrimoniocrear" required>
                            <option selected="true" disabled="disabled" class="noselected">Seleccione el Tipo de Patrimonio</option>
                            <option value="bienes">Bienes</option>
                            <option value="deudas">Deudas</option>
                        </select>
                        </div>
                        <div class="scond" id="divtipopatrimoniocrear">
                        <label for="" class="form-label">Tipo de <span id="spantipopatrimoniocrear"></span></label>
                        <div class="form-group">
                            <select class="form-control" disabled name="tipo1patrimoniocrear" id="tipo1patrimoniocrear">
                                
                            </select>
                        </div>
                        </div>
                        <div class="form-group">
                            <button class="form-control button firstNextpatrimonio isdisabled">Siguiente</button>
                        </div>
                    </div>

                    <div class="slide-page-2 slide-page-crear-2-patrimonio">
                        
                        <label for="" class="form-label">Valor</label>
                        <div class="form-group">
                            <input class="form-control" type="number" min="0" name="valorpatrimoniocrear" placeholder="Valor">
                        </div>
                        <label for="" class="form-label">Tipo de Moneda</label>
                        <div class="form-group">
                            <select class="form-control" name="tipomonedacrearpatrimonio" id="tipomonedacrearpatrimonio">
                                
                            </select>
                        </div>

                        <label for="" class="form-label">Tipo de Modelo</label>
                        <div class="form-group">
                            <select class="form-control" name="tipomodelocrearpatrimonio" id="tipomodelocrearpatrimonio">
                                
                            </select>
                        </div>

                        <div class="form-group">
                            <button class="form-control button firstPrevpatrimonio">Anterior</button>
                            <input class="form-control button" type="submit" name="patrimonio" value="Crear">
                        </div>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>