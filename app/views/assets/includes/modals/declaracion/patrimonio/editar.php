<div class="modal-container" id="modal-editar-patrimonio">

    <div class="container modal-close" id="cont-modal-editar-patrimonio">
        <div class="row">
            <div class="col-md-4 offset-md-4 form login-form">
                <p class="close text-center" id="close-modal-editar-patrimonio">&times;</p>
                <form action="#" method="POST" autocomplete="" id="form-editar-patrimonio">
                    <h2 class="text-center">
                    editar Tipos de Patrimonio</h2>

                    <div class="progress-bar">
                        <div class="step">
                            <p class="stepeditarpatrimonio">Patrimonio</p>
                            <div class="bullet bulleteditarpatrimonio">
                                <span>1</span>
                            </div>
                            <div class="check checkeditarpatrimonio fas fa-check"></div>
                        </div>
                        <div class="step">
                            <p class="stepeditarpatrimonio">Valores</p>
                            <div class="bullet bulleteditarpatrimonio">
                                <span>2</span>
                            </div>
                            <div class="check checkeditarpatrimonio fas fa-check"></div>
                        </div>
                    </div>

                    <div class="slide-page slide-page-editar-patrimonio">
                        
                    <label for="" class="form-label">Tipo de Patrimonio</label>
                        <div class="form-group">
                        <p class="form-control" id="tipopatrimonioeditar"></p>
                        </div>

                        <label for="" class="form-label">Tipo de <span id="spantipopatrimonioeditar"></span></label>
                        <div class="form-group">
                            <select class="form-control" name="tipo1patrimonioeditar" id="tipo1patrimonioeditar">
                                
                            </select>
                        </div>

                        <div class="form-group">
                            <button class="form-control button firstNexteditarpatrimonio ">Siguiente</button>
                        </div>
                    </div>

                    <div class="slide-page-2 slide-page-editar-2-patrimonio">
                        
                        <label for="" class="form-label">Valor</label>
                        <div class="form-group">
                            <input class="form-control" type="number" min="0" name="valorpatrimonioeditar" id="valorpatrimonioeditar" placeholder="Valor">
                        </div>
                        <label for="" class="form-label">Tipo de Moneda</label>
                        <div class="form-group">
                            <select class="form-control" name="tipomonedaeditarpatrimonio" id="tipomonedaeditarpatrimonio">
                                
                            </select>
                        </div>

                        <label for="" class="form-label">Tipo de Modelo</label>
                        <div class="form-group">
                            <select class="form-control" name="tipomodeloeditarpatrimonio" id="tipomodeloeditarpatrimonio">
                                
                            </select>
                        </div>
                        <input type="text" class="scond scond-2" name="iddob" id="iddob"> 
                        <div class="form-group">
                            <button class="form-control button firstPreveditarpatrimonio">Anterior</button>
                            <input class="form-control button" type="submit" name="patrimonio" value="editar">
                        </div>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>