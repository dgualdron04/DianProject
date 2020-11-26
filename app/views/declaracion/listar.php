<script>
    document.title = "Declaracion";
</script>

<div class="content-header">
    <div class="fluid">
        <div class="fila">
            <div class="columna">
                <p class="h1">Lista de Declaraciones</p>
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
            <div class="tab-pane active show" id="declaracion">
                <p></p>

                <div id="table-place">
                    <table id="datatable" class="datatable">
                        <thead>
                            <tr>
                                <!-- <th></th> -->
                                <th>Estado</th>
                                <th>Anno</th>
                                <th>Progreso</th>
                                <th>icon:far fa-edit</th>
                                <th>icon:far fa-trash-alt</th>
                                <th>icon:fas fa-eye</th>
                                <th>icon:far fa-file-pdf</th>
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
                                        <td><?php echo $datos['annoperiodo'];
                                        if ($datos['annoperiodo'] == $fecha['year']-1) {
                                            $contanio++;
                                        }
                                        ?></td>
                                        <td><?php echo "progreso:".$datos['porcent']  ?></td>
                                        <td>
                                            <?php
                                            if ($datos['estadorevision'] == false || $datos['estadoarchivo'] == true) {
                                                echo 'actionlink:user-edit simbollink;icon:far fa-edit;name:editar;id:edit-'.$datos['iddeclaracion'].';href:'.constant('URL').'declaracion/editar/'.$datos['iddeclaracion'];
                                            } else {
                                                echo 'icon:far fa-edit;name:editar';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($datos['estadorevision'] == false || $datos['estadoarchivo'] == true) {
                                                echo 'actionlink:user-edit simbollink;icon:far fa-trash-alt;name:eliminar;id:delete-'.$datos['iddeclaracion'].';onclick:eliminardeclaracion';
                                            } else {
                                                echo 'icon:far fa-trash-alt;name:eliminar';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($datos['porcent'] == 90 && $datos['estadorevision'] == false) {
                                                echo 'actionlink:user-edit simbollink;icon:fas fa-eye;name:Revisión del Contador;id:revision-'.$datos['iddeclaracion'].';onclick:revisiondeclaracion';
                                            } else {
                                                echo 'icon:fas fa-eye-slash;name:Revisión del Contador';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($datos['estadorevision'] == true && $datos['estadoarchivo'] == true) {
                                                echo 'actionlink:user-edit simbollink;icon:far fa-file-pdf;name:Descargar Declaración;id:pdf-'.$datos['iddeclaracion'].';href:'.constant('URL').'declaracion/crearpdf/'.$datos['iddeclaracion'];
                                            } else {
                                                echo 'icon:far fa-file-pdf;name:Descargar Declaración';
                                            }
                                            ?>
                                        </td>
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
<script src="<?php echo constant('URL') . 'app/views/assets/js/declaracion/listar.js' ?>"></script>
