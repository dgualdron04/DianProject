<div class="modal-container " id="modal-editar-calendario">

    <div class="container modal-close" id="cont-modal-editar-cal">
        <div class="row">
            <div class="col-md-4 offset-md-4 form login-form">
                <p class="close text-center" id="close-modal-editar-cal">&times;</p>
                <form action="#" method="POST" autocomplete="" id="form-calendario-editar">
                    <h2 class="text-center">
                        Editar Calendario</h2>
                    <br>
                    <br>
                    <div >
                    <label for="" class="form-label">Anno del Parametro</label>
                        <div class="form-group">
                        <input class="form-control btn-disabled" disabled type="number" min="<?php $fecha = getdate(); echo $fecha['year'] - 1; ?>" max="<?php echo $fecha['year'] - 1; ?>" value="<?php echo $fecha['year'] - 1; ?>" name="anioparametro" 
                        id="anioparametro-<?php foreach ($data[0] as $datos) { if ($datos['annoperiodo'] == $fecha['year'] - 1) { echo $datos['idparametro']; } } ?> " placeholder="Anio" require>
                        </div>
                        <label for="" class="form-label">Fecha de inicio del Calendario Tributario</label>
                        <div class="form-group">
                            <input class="form-control" type="date" name="dia1editar" id="dia1" >
                        </div>
                        <label for="" class="form-label">Fecha de cierre del Calendario Tributario</label>
                        <div class="form-group">
                            <input class="form-control" type="date" name="dia2editar" id="dia2" >
                        </div>
                        <input type="text" class="scond scond-2" name="idcal" id="idcal">
                        <br>
                        <div class="form-group">
                            <input class="form-control button" type="submit" name="calendarioeditar" value="Editar">
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>