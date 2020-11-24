<script>
    document.title = "Lista de Ganacias";
</script>

<div class="content-header">
    <div class="fluid">
        <div class="fila">
            <div class="columna">
                <p class="h1">Lista de Tipo de Ganancias</p>
            </div>
            <div class="columna">
                <ol class="historialpaginas float-derecha">
                    <li class="historialpaginas-item"><a href="<?php echo constant('URL'); ?>">Inicio</a></li>
                    <li class="historialpaginas-item activo">Lista de Tipo de Ganancias</li>
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
                            Tipo de Ganancias No Gravadas
                            <div class="ripple-container"></div>
                            <div class="ripple-container"></div>
                        </a>
                    </li>
                    <li class="nav-item cardseparador">
                        <a class="nav-link" href="#" id="nav-2">
                            Tipo de Ingresos de Ganancias Ocasionales
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
            <div class="tab-pane active show" id="gananciasnogravadas">
                <p></p>

                <div>
                    <table id="datatable-gananciasnogravadas" class="datatable">
                        <thead>
                            <tr>
                                <!-- <th></th> -->
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Ayuda</th>
                                <th>icon:far fa-edit</th>
                                <th>icon:far fa-trash-alt</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            if (!empty($data)) {
                                foreach ($data[0] as $datos) : ?>
                                    <tr>
                                        <td><?php echo $datos['nombre']; ?></td>
                                        <td><?php echo $datos['descripcion']; ?></td>
                                        <td><?php echo $datos['ayuda']; ?></td>
                                        <td><?php echo 'actionlink:user-edit simbollink;icon:far fa-edit;name:Editar;id:editgng-' . $datos['idtipogananciasnogravadas'] . ';onclick:editargananciasnogravadas'; ?></td>
                                        <td><?php echo 'actionlink:user-edit simbollink;icon:far fa-trash-alt;name:eliminar;id:deletegng-' . $datos['idtipogananciasnogravadas'] . ';onclick:eliminargananciasnogravadas'; ?></td>
                                    </tr>
                            <?php endforeach;
                            } ?>
                        </tbody>
                    </table>
                </div>

                <div class="tab-footer"></div>


            </div>
            <div class="tab-pane" id="ingresosganancias">
                <p></p>

                <div>
                    <table id="datatable-ingresosganancias" class="datatable">
                        <thead>
                            <tr>
                                <!-- <th></th> -->
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Ayuda</th>
                                <th>icon:far fa-edit</th>
                                <th>icon:far fa-trash-alt</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            if (!empty($data)) {
                                foreach ($data[1] as $datos) : ?>
                                    <tr>
                                        <td><?php echo $datos['nombre']; ?></td>
                                        <td><?php echo $datos['descripcion']; ?></td>
                                        <td><?php echo $datos['ayuda']; ?></td>
                                        <td><?php echo 'actionlink:user-edit simbollink;icon:far fa-edit;name:Editar;id:editig-' . $datos['idtipoingresosganancias'] . ';onclick:editartipoingresosganancias'; ?></td>
                                        <td><?php echo 'actionlink:user-edit simbollink;icon:far fa-trash-alt;name:eliminar;id:deleteig-' . $datos['idtipoingresosganancias'] . ';onclick:eliminartipoingresosganancias'; ?></td>
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


<?php require_once './app/views/assets/includes/modals/ganancias/gananciasnogravadas/crear.php'; ?>
<?php require_once './app/views/assets/includes/modals/ganancias/ingresos/crear.php'; ?>
<?php require_once './app/views/assets/includes/modals/ganancias/gananciasnogravadas/editar.php'; ?>
<?php require_once './app/views/assets/includes/modals/ganancias/ingresos/editar.php'; ?>
<?php require_once './app/views/assets/includes/modals/ganancias/gananciasnogravadas/eliminar.php'; ?>
<?php require_once './app/views/assets/includes/modals/ganancias/ingresos/eliminar.php'; ?>

<script src="<?php echo constant('URL') . 'app/views/assets/js/template/funciones.js' ?>"></script>
<script src="<?php echo constant('URL') . 'app/views/assets/js/template/datatables.js' ?>"></script>
<script src="<?php echo constant('URL') . 'app/views/assets/js/ganancias/ganancias.js' ?>"></script>
<script src="<?php echo constant('URL') . 'app/views/assets/js/ganancias/gananciasnogravadas/listar.js' ?>"></script>
<script src="<?php echo constant('URL') . 'app/views/assets/js/ganancias/ingresos/listar.js' ?>"></script>