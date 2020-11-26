<script>
    document.title = "Revisión de declaración";
</script>

<div class="content-header">
    <div class="fluid">
        <div class="fila">
            <div class="columna">
                <p class="h1">Revisión de Declaraciones</p>
            </div>
            <div class="columna">
                <ol class="historialpaginas float-derecha">
                    <li class="historialpaginas-item"><a href="<?php echo constant('URL'); ?>">Inicio</a></li>
                    <li class="historialpaginas-item activo">Lista de Declaraciones</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<?php $contanio = 0; $fecha = getdate();?>

<div class="card-2">
    <div class="card-header-2 card-header-2-tabs card-header-2-primary">
        <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active show" href="#" id="nav-1">
                            Listar
                            <div class="ripple-container"></div>
                            <div class="ripple-container"></div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="card-body-2">
        <div class="tab-content">
            <div class="tab-pane active show" id="revision">
                <p></p>

                <div id="table-place">
                    <table id="datatable-revision" class="datatable">
                        <thead>
                            <tr>
                                <!-- <th></th> -->
                                <th>Estado</th>
                                <th>Anno</th>
                                <th>Nombre del declarante</th>
                                <th>icon:fas fa-eye</th>
                                <th>icon:fas fa-check</th>
                                <th>icon:fas fa-times</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            if (!empty($data)) {
                                foreach ($data as $datos) : ?>
                                    <tr>
                                        <!-- <td>checkbox:</td> -->
                                        <td>
                                            <span class="<?php

                                                            if ($datos['estadorevision'] == true && $datos['estadodeclaracion'] == true && $datos['estadoarchivo'] == false) {
                                                                echo "away";
                                                            } else if ($datos['estadorevision'] == false && $datos['estadodeclaracion'] == true) {
                                                                echo "available";
                                                            } else if ($datos['estadodeclaracion'] == false) {
                                                                echo "offline";
                                                            } else if ($datos['estadorevision'] == true && $datos['estadoarchivo'] == true) {
                                                                echo "finish";
                                                            }

                                                            ?>">

                                            </span>
                                        </td>
                                        <td><?php echo $datos['annoperiodo']; ?></td>
                                        <td><?php echo $datos['nombre']." ".$datos['apellido'] ?></td>
                                        <td><?php echo 'actionlink:user-edit simbollink;icon:fas fa-eye;name:Ver Declaración;id:revision-'.$datos['iddeclaracion'].';href:'.constant('URL').'declaracion/ver/'.$datos['iddeclaracion']; ?></td>
                                        <td><?php echo 'actionlink:user-edit simbollink;icon:fas fa-check;name:Aprobar Declaración;id:revision-'.$datos['iddeclaracion'].';onclick:aceptardeclaracion'; ?></td>
                                        <td><?php echo 'actionlink:user-edit simbollink;icon:fas fa-times;name:Reprobar Declaración;id:revision-'.$datos['iddeclaracion'].';onclick:denegardeclaracion'; ?></td>
                                    </tr>
                            <?php endforeach;
                            } ?>
                        </tbody>
                    </table>
                </div>

                <div class="tab-footer"></div>


            </div>
        </div>
    </div>
</div>


<?php require_once './app/views/assets/includes/modals/declaracion/eliminar.php'; ?>

<?php

if ($contanio > 0) {
    require_once './app/views/assets/includes/alertas/alert.php';
}

?>


<script src="<?php echo constant('URL') . 'app/views/assets/js/template/funciones.js' ?>"></script>
<script src="<?php echo constant('URL') . 'app/views/assets/js/template/datatables.js' ?>"></script>
<script src="<?php echo constant('URL') . 'app/views/assets/js/declaracion/revision/listar.js' ?>"></script>
