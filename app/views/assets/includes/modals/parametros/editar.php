<div class="modal-container" id="modal-editar">

    <div class="container modal-close" id="cont-modal-editar">
        <div class="row">
            <div class="col-md-4 offset-md-4 form login-form">
                <p class="close text-center" id="close-modal-editar">&times;</p>
                <form action="#" method="POST" autocomplete="" id="form-editar">
                    <h2 class="text-center">
                        Editar Parámetros</h2>

                    <div class="progress-bar">
                        <div class="step">
                            <p class="stepeditar">Periodo Fiscal</p>
                            <div class="bullet bulleteditar">
                                <span>1</span>
                            </div>
                            <div class="check checkeditar fas fa-check"></div>
                        </div>
                        <div class="step">
                            <p class="stepeditar">Parametros</p>
                            <div class="bullet bulleteditar">
                                <span>2</span>
                            </div>
                            <div class="check checkeditar fas fa-check"></div>
                        </div>
                    </div>

                    <div class="slide-page slide-page-editar">
                        <label for="" class="form-label">Anio</label>
                        <div class="form-group">
                        <input class="form-control btn-disabled" disabled type="number" min="<?php $fecha = getdate(); echo $fecha['year'] - 1; ?>" max="<?php echo $fecha['year'] - 1; ?>" name="anioeditar" id="anioeditar" placeholder="Anio" require>
                        </div>
                        <label for="" class="form-label">Marco Legal</label>
                        <div class="form-group">
                            <textarea class="form-control" name="marcolegaleditar" id="marcoleditar" cols="30" rows="10"></textarea>
                        </div>
                        <label for="" class="form-label">Marco Calendario</label>
                        <div class="form-group">
                            <textarea class="form-control" name="marcocalendarioeditar" id="marcoceditar" cols="30" rows="10" require></textarea>
                        </div>
                        <div class="form-group">
                            <button class="form-control button firstNextEditar">Siguiente</button>
                        </div>
                    </div>

                    <div class="slide-page slide-page-editar-2">
                        <label for="" class="form-label">Valor tributario</label>
                        <div class="form-group">
                            <input class="form-control" type="text" name="valoreditar" id="valoreditar" placeholder="000000000">
                        </div>
                        <label for="" class="form-label">Tope 1</label>
                        <div class="form-group">
                            <input class="form-control" type="text" name="tope1editar" id="tope1editar" placeholder="000000000">
                        </div>
                        <label for="" class="form-label">Tope 2</label>
                        <div class="form-group">
                            <input class="form-control" type="text" name="tope2editar" id="tope2editar" placeholder="000000000">
                        </div>
                        <input type="text" class="scond scond-2" name="idpr" id="idpr"> 
                        <div class="form-group">
                            <button class="form-control button firstPrevEditar">Anterior</button>
                            <input class="form-control button" type="submit" name="parametroseditar" value="Editar">
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>