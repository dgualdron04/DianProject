<div class="modal-container modal-container-crear" id="modal-crear">

    <div class="container modal-close" id="cont-modal-crear">
        <div class="row">
            <div class="col-md-4 offset-md-4 form login-form">
                <p class="close text-center" id="close-modal-crear">&times;</p>
                <form action="#" method="POST" autocomplete="" id="form-crear">
                    <h2 class="text-center">
                        Crear Parámetros</h2>

                    <div class="progress-bar">
                        <div class="step">
                            <p class="stepcrear">Periodo Fiscal</p>
                            <div class="bullet bulletcrear">
                                <span>1</span>
                            </div>
                            <div class="check checkcrear fas fa-check"></div>
                        </div>
                        <div class="step">
                            <p class="stepcrear">Parametros</p>
                            <div class="bullet bulletcrear">
                                <span>2</span>
                            </div>
                            <div class="check checkcrear fas fa-check"></div>
                        </div>
                    </div>

                    <div class="slide-page slide-page-crear">
                        <label for="" class="form-label">Anio</label>
                        <div class="form-group">
                            <input class="form-control btn-disabled" disabled type="number" min="<?php $fecha = getdate(); echo $fecha['year'] - 1; ?>" max="<?php echo $fecha['year'] - 1; ?>" value="<?php  echo $fecha['year'] - 1;?>" name="anioparametros" placeholder="Anio" require>
                        </div>
                        <label for="" class="form-label">Marco Legal</label>
                        <div class="form-group">
                            <textarea class="form-control" name="marcolegalp" cols="30" rows="10" require></textarea>
                        </div>
                        <label for="" class="form-label">Marco Calendario</label>
                        <div class="form-group">
                            <textarea class="form-control" name="marcocalendariop" cols="30" rows="10" require></textarea>
                        </div>
                        <div class="form-group">
                            <button class="form-control button firstNext">Siguiente</button>
                        </div>
                    </div>

                    <div class="slide-page-2 slide-page-crear-2">
                        <label for="" class="form-label">Valor tributario</label>
                        <div class="form-group">
                            <input class="form-control" type="number" name="valortributario" min="0" placeholder="000000000" require>
                        </div>
                        <label for="" class="form-label">Tope 1</label>
                        <div class="form-group">
                            <input class="form-control" type="number" name="tope1" min="0" placeholder="000000000" require>
                        </div>
                        <label for="" class="form-label">Tope 2</label>
                        <div class="form-group">
                            <input class="form-control" type="number" name="tope2" min="0" placeholder="000000000" require>
                        </div>
                        <div class="form-group">
                            <button class="form-control button firstPrev">Anterior</button>
                            <input class="form-control button" type="submit" name="parametros" value="Crear">
                        </div>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>


