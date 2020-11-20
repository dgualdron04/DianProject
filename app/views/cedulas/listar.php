<script>
    document.title = "Lista de Cedulas";
</script>

<div class="content-header">
    <div class="fluid">
        <div class="fila">
            <div class="columna">
                <p class="h1">Lista de Tipo de Cédulas</p>
            </div>
            <div class="columna">
                <ol class="historialpaginas float-derecha">
                    <li class="historialpaginas-item"><a href="<?php echo constant('URL'); ?>">Inicio</a></li>
                    <li class="historialpaginas-item activo">Lista de Tipo de Cédulas</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="card-2">
    <div class="card-header-2 card-header-2-tabs card-header-2-primary">
        <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active show" href="#" id="nav-1">
                            Cédula general
                            <div class="ripple-container"></div>
                            <div class="ripple-container"></div>
                        </a>
                    </li>
                    <li class="nav-item cardseparador">
                        <a class="nav-link" href="#" id="nav-2">
                            Cédula de pensiones
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
            <div class="tab-pane active show" id="cedulageneral">
                <p></p>

                <div>
                    <table id="datatable-cedulageneral" class="datatable">
                        <thead>
                            <tr>
                                <!-- <th></th> -->
                                <th>Renta</th>
                                <th>Tipo de Renta</th>
                                <th>Aspecto</th>
                                <th>Nombre</th>
                                <th>icon:far fa-edit</th>
                                <th>icon:far fa-trash-alt</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            if (!empty($data)) {
                                foreach ($data as $datos) : ?>
                                    <tr>
                                        <td><?php echo $datos['renta']; ?></td>
                                        <td><?php echo $datos['tipoderenta']; ?></td>
                                        <td><?php echo $datos['aspecto']; ?></td>
                                        <td><?php echo $datos['nombre']; ?></td>
                                        <td><?php echo 'actionlink:user-edit simbollink;icon:far fa-edit;name:Editar;id:editb-' . $datos['id'] . '-'.$datos['renta'].'-'.$datos['tipoderenta'].'-'.$datos['aspecto'].';onclick:editarcedulageneral'; ?></td>
                                        <td><?php echo 'actionlink:user-edit simbollink;icon:far fa-trash-alt;name:eliminar;id:deleteb-' . $datos['id'] . '-'.$datos['renta'].'-'.$datos['tipoderenta'].'-'.$datos['aspecto'].';onclick:eliminarcedulageneral'; ?></td>
                                    </tr>
                            <?php endforeach;
                            } ?>
                        </tbody>
                    </table>
                </div>

                <div class="tab-footer"></div>


            </div>
            <div class="tab-pane" id="cedulapensiones">
                <p></p>

                <div>
                    <table id="datatable-cedulapensiones" class="datatable">
                        <thead>
                            <tr>
                                <!-- <th></th> -->
                                <th>Ingreso o Renta</th>
                                <th>Tipo</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>icon:far fa-edit</th>
                                <th>icon:far fa-trash-alt</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            if (!empty($data)) {
                                foreach ($data[1] as $datos) : ?>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><?php echo $datos['nombre']; ?></td>
                                        <td><?php echo 'actionlink:user-edit simbollink;icon:far fa-edit;name:Editar;id:editd-' . $datos['idtipodeuda'] . ';onclick:editartipodeuda'; ?></td>
                                        <td><?php echo 'actionlink:user-edit simbollink;icon:far fa-trash-alt;name:eliminar;id:deleted-' . $datos['idtipodeuda'] . ';onclick:eliminartipodeuda'; ?></td>
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


<?php require_once './app/views/assets/includes/modals/cedulas/cedulageneral/crear.php'; ?>
<?php require_once './app/views/assets/includes/modals/cedulas/cedulapensiones/crear.php'; ?>
<?php require_once './app/views/assets/includes/modals/cedulas/cedulageneral/editar.php'; ?>
<?php require_once './app/views/assets/includes/modals/cedulas/cedulageneral/eliminar.php'; ?>

<script src="<?php echo constant('URL') . 'app/views/assets/js/template/funciones.js' ?>"></script>
<script src="<?php echo constant('URL') . 'app/views/assets/js/template/datatables.js' ?>"></script>
<script src="<?php echo constant('URL') . 'app/views/assets/js/cedulas/cedulas.js' ?>"></script>
<script src="<?php echo constant('URL') . 'app/views/assets/js/cedulas/cedulageneral/listar.js' ?>"></script>
<script src="<?php echo constant('URL') . 'app/views/assets/js/cedulas/cedulapensiones/listar.js' ?>"></script>
