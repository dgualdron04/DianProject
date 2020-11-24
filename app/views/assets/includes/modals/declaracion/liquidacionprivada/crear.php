<div class="modal-container" id="modal-crear-liquidacionprivada">

    <div class="container modal-close" id="cont-modal-crear-liquidacionprivada">
        <div class="row">
            <div class="col-md-4 offset-md-4 form login-form">
                <p class="close text-center" id="close-modal-crear-liquidacionprivada">&times;</p>
                <form action="#" method="POST" autocomplete="" id="form-crear-liquidacionprivada">
                    <h2 class="text-center">
                    Crear Tipos de <br>
                Liquidación Privada</h2>

                    <div class="progress-bar">
                        <div class="step">
                            <p class="stepcrearliquidacionprivada">Tipos</p>
                            <div class="bullet bulletcrearliquidacionprivada">
                                <span>1</span>
                            </div>
                            <div class="check checkcrearliquidacionprivada fas fa-check"></div>
                        </div>
                        <div class="step">
                            <p class="stepcrearliquidacionprivada">Valores</p>
                            <div class="bullet bulletcrearliquidacionprivada">
                                <span>2</span>
                            </div>
                            <div class="check checkcrearliquidacionprivada fas fa-check"></div>
                        </div>
                    </div>

                    <div class="slide-page slide-page-crear-liquidacionprivada">
                        
                    <label for="" class="form-label">Tipo de Liquidación privada</label>
                        <div class="form-group">
                        <select class="form-control" name="tipoliquidacionprivadacrear" id="tipoliquidacionprivadacrear" required>
                            <option selected="true" disabled="disabled" class="noselected">Seleccione el Tipo de Liquidación privada</option>
                            <option value="anticiporenta">Anticipo de Renta</option>
                            <option value="sanciones">Sanciones</option>
                            <option value="saldofavor">Saldo a Favor</option>
                            <option value="retenciondeclarar">Retención a declarar</option>
                            <option value="descuentoimpuext">Descuento de Impuesto Exterior</option>
                        </select>
                        </div>
                        <div class="form-group">
                            <button class="form-control button firstNextliquidacionprivada isdisabled">Siguiente</button>
                        </div>
                    </div>

                    <div class="slide-page-2 slide-page-crear-2-liquidacionprivada">
                        
                        <label for="" class="form-label">Nombre</label>
                        <div class="form-group">
                            <input class="form-control" type="text" min="0" name="nombreliquidacionprivadacrear" id="nombreliquidacionprivadacrear" placeholder="Nombre">
                        </div>    
                        <label for="" class="form-label">Valor</label>
                        <div class="form-group">
                            <input class="form-control" type="number" min="0" name="valorliquidacionprivadacrear" placeholder="Valor">
                        </div>
                        <label for="" class="form-label">Descripción</label>
                        <div class="form-group">
                            <textarea class="form-control" name="descripcionliquidacionprivadacrear" cols="30" rows="10"></textarea>
                        </div>

                        <div class="form-group">
                            <button class="form-control button firstPrevliquidacionprivada">Anterior</button>
                            <input class="form-control button" type="submit" name="liquidacionprivada" value="Crear">
                        </div>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>