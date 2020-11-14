<div class="modal-container " id="modal-crear-periodo">

    <div class="container modal-close width-normal" id="cont-modal-crear-periodo">
        <div class="row">
            <div class="col-md-4 offset-md-4 form login-form">
                <p class="close text-center" id="close-modal-crear-periodo">&times;</p>
                <form action="#" method="POST" autocomplete="" id="form-periodo-crear">
                    <h2 class="text-center">
                        Crear Periodo de <br> declaración</h2>
                    <br>
                    <br>
                    <div>
                    
                        <label for="" class="form-label">Primer digito</label>
                        <div class="form-group">
                            <input class="form-control" type="number" name="primerdigitocrear" id="primerdigitocrear" require min="0" maxlength="2">
                        </div>
                        <label for="" class="form-label">Segundo Digito</label>
                        <div class="form-group">
                            <input class="form-control" type="number" name="segundodigitocrear" id="segundodigitocrear" require min="0" maxlength="2">
                        </div>

                        <label for="" class="form-label">Fecha</label>
                        <div class="form-group">
                            <input class="form-control" type="date" name="fechacrear" require id="fechacrear">
                        </div>
                        <br>
                        <div class="form-group">
                            <input class="form-control button" type="submit" name="periodocrear" value="Crear" >
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>