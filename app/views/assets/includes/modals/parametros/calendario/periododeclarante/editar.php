<div class="modal-container " id="modal-editar-periodo">

    <div class="container modal-close width-normal" id="cont-modal-editar-periodo">
        <div class="row">
            <div class="col-md-4 offset-md-4 form login-form">
                <p class="close text-center" id="close-modal-editar-periodo">&times;</p>
                <form action="#" method="POST" autocomplete="" id="form-periodo-editar">
                    <h2 class="text-center">
                        Editar Periodo</h2>
                    <br>
                    <br>
                    <div>
                    
                        <label for="" class="form-label">Primer digito</label>
                        <div class="form-group">
                            <input class="form-control" type="number" name="primerdigitoeditar" id="primerdigitoeditar" require min="0" maxlength="2">
                        </div>
                        <label for="" class="form-label">Segundo Digito</label>
                        <div class="form-group">
                            <input class="form-control" type="number" name="segundodigitoeditar" id="segundodigitoeditar" require min="0" maxlength="2">
                        </div>

                        <label for="" class="form-label">Fecha</label>
                        <div class="form-group">
                            <input class="form-control" type="date" name="fechaeditar" require id="fechaeditar">
                        </div>
                        <br>
                        <input type="text" class="scond scond-2" name="idper" id="idper">
                        <div class="form-group">
                            <input class="form-control button" type="submit" name="periodoeditar" value="Editar" >
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>