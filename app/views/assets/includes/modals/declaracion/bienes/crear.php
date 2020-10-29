<div class="modal-container" id="modal-crear">

    <div class="container modal-close" id="cont-modal-crear">
        <div class="row">
            <div class="col-md-4 offset-md-4 form login-form">
                <p class="close text-center" id="close-modal-crear">&times;</p>
                <form action="#" method="POST" autocomplete="" id="form-crear">
                    <h2 class="text-center">
                        Crear Bienes</h2>

                    <div class="progress-bar">

                    </div>

                    <div class="slide-page slide-page-crear">
                        <label for="" class="form-label">Nombre</label>
                        <div class="form-group">
                            <input class="form-control" type="text" name="anioparametros" placeholder="Mansión">
                        </div>
                        <label for="" class="form-label">Valor</label>
                        <div class="form-group">
                            <input class="form-control" type="text" name="valor" placeholder="000000000">
                        </div>

                        <label for="" class="form-label">Tipo de Moneda</label>
                        <div class="form-group">
                        <select class="form-control" name="tipomoneda" required>
                            <option selected="true" disabled="disabled" class="noselected">Seleccione el Tipo de Moneda</option>
                            <option value="pesoscolombianos">Pesos Colombianos</option>
                            <option value="pesoschilenos">Pesos Chilenos</option>
                            <option value="dolareseeuu">Dolares EEUU</option>
                        </select>
                        </div>
                        <label for="" class="form-label">Tipo de Bien</label>
                        <div class="form-group">
                        <select class="form-control" name="tipomoneda" required>
                            <option selected="true" disabled="disabled" class="noselected">Seleccione el Tipo de Bien</option>
                            <option value="pesoscolombianos">Pesos Colombianos</option>
                            <option value="pesoschilenos">Pesos Chilenos</option>
                            <option value="dolareseeuu">Dolares EEUU</option>
                        </select>
                        </div>
                        <div class="form-group">
                            <!-- <button class="form-control button firstNext">Siguiente</button> -->
                            <input class="form-control button" type="submit" name="parametros" value="Crear">
                        </div>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>