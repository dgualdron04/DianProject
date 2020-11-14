<div class="modal-container " id="modal-crear-calendario">

    <div class="container modal-close" id="cont-modal-crear-cal">
        <div class="row">
            <div class="col-md-4 offset-md-4 form login-form">
                <p class="close text-center" id="close-modal-crear-cal">&times;</p>
                <form action="#" method="POST" autocomplete="" id="form-calendario-crear">
                    <h2 class="text-center">
                        Crear Calendario</h2>
                    <br>
                    <br>
                    <div class="slide-page slide-page-editar">
                    <label for="" class="form-label">Anno del Parametro</label>
                        <div class="form-group">
                        <input class="form-control btn-disabled" disabled type="number" min="<?php $fecha = getdate(); echo $fecha['year'] - 1; ?>" max="<?php echo $fecha['year'] - 1; ?>" value="<?php echo $fecha['year'] - 1; ?>" name="aniocalendario" 
                        id="aniocalendario-<?php foreach ($data[0] as $datos) { if ($datos['annoperiodo'] == $fecha['year'] - 1) { echo $datos['idparametro']; } } ?> " placeholder="Anio" require>
                        </div>
                        <label for="" class="form-label">Fecha de inicio del Calendario Tributario</label>
                        <div class="form-group">
                            <input class="form-control" type="date" name="dia1crear" require min="<?php echo $fecha['year']."-01-01"; ?>" max="<?php echo $fecha['year']."-12-31"; ?>">
                        </div>
                        <label for="" class="form-label">Fecha de cierre del Calendario Tributario</label>
                        <div class="form-group">
                            <input class="form-control" type="date" name="dia2crear" require min="<?php echo $fecha['year']."-01-01"; ?>" max="<?php echo $fecha['year']."-12-31"; ?>">
                        </div>
                        <br>
                        <div class="form-group">
                            <input class="form-control button" type="submit" name="calendariocrear" value="Crear" >
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>