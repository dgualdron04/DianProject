<div class="modal-container" id="modal-crear-gananciasocasionales">

    <div class="container modal-close" id="cont-modal-crear-gananciasocasionales">
        <div class="row">
            <div class="col-md-4 offset-md-4 form login-form">
                <p class="close text-center" id="close-modal-crear-gananciasocasionales">&times;</p>
                <form action="#" method="POST" autocomplete="" id="form-crear-gananciasocasionales">
                    <h2 class="text-center">
                    Crear Tipos de <br>Ganancias Ocasionales</h2>

                    <div class="progress-bar">
                        <div class="step">
                            <p class="stepcreargananciasocasionales">Tipos</p>
                            <div class="bullet bulletcreargananciasocasionales">
                                <span>1</span>
                            </div>
                            <div class="check checkcreargananciasocasionales fas fa-check"></div>
                        </div>
                        <div class="step">
                            <p class="stepcreargananciasocasionales">Valores</p>
                            <div class="bullet bulletcreargananciasocasionales">
                                <span>2</span>
                            </div>
                            <div class="check checkcreargananciasocasionales fas fa-check"></div>
                        </div>
                    </div>

                    <div class="slide-page slide-page-crear-gananciasocasionales">
                        
                    <label for="" class="form-label">Tipo de Ganacias Ocasionales</label>
                        <div class="form-group">
                        <select class="form-control" name="tipogananciasocasionalescrear" id="tipogananciasocasionalescrear" required>
                            <option selected="true" disabled="disabled" class="noselected">Seleccione el Tipo de Ganancias Ocasionales</option>
                            <option value="ingresosganancias">Ingresos por Ganancias Ocasionales</option>
                            <option value="ingresosnoconse">Ingresos no Constitutivos</option>
                            <option value="gananciasnogravadas">Ganancias Ocasionales no Gravadas Y Exentas</option>
                        </select>
                        </div>
                        <div class="scond" id="divtipogananciasocasionalescrear">
                        <label for="" class="form-label">Tipo de <span id="spantipogananciasocasionalescrear"></span></label>
                        <div class="form-group">
                            <select class="form-control" disabled name="tipo1gananciasocasionalescrear" id="tipo1gananciasocasionalescrear">
                                
                            </select>
                        </div>
                        </div>
                        <div class="form-group">
                            <button class="form-control button firstNextgananciasocasionales isdisabled">Siguiente</button>
                        </div>
                    </div>

                    <div class="slide-page-2 slide-page-crear-2-gananciasocasionales">
                        
                        <label for="" class="form-label">Valor</label>
                        <div class="form-group">
                            <input class="form-control" type="number" min="0" name="valorgananciasocasionalescrear" placeholder="Valor">
                        </div>
                        <div class="form-group">
                            <button class="form-control button firstPrevgananciasocasionales">Anterior</button>
                            <input class="form-control button" type="submit" name="gananciasocasionales" value="Crear">
                        </div>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>