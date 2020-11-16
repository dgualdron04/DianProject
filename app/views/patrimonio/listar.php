<script>
    document.title = "Lista de Patrimonios";
</script>

<div class="content-header">
    <div class="fluid">
        <div class="fila">
            <div class="columna">
                <p class="h1">Lista de Tipo de Patrimonios</p>
            </div>
            <div class="columna">
                <ol class="historialpaginas float-derecha">
                    <li class="historialpaginas-item"><a href="<?php echo constant('URL'); ?>">Inicio</a></li>
                    <li class="historialpaginas-item activo">Lista de Tipo de Patrimonios</li>
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
                            Tipo de bienes
                            <div class="ripple-container"></div>
                            <div class="ripple-container"></div>
                        </a>
                    </li>
                    <li class="nav-item cardseparador">
                        <a class="nav-link" href="#" id="nav-2">
                            Tipo de deudas
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
            <div class="tab-pane active show" id="bienes">
                <p></p>

                <div>
                    <table id="datatable-tipobienes" class="datatable">
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
                                        <td><?php echo 'actionlink:user-edit simbollink;icon:far fa-edit;name:Editar;id:editb-' . $datos['idtipobien'] . ';onclick:editartipobien'; ?></td>
                                        <td><?php echo 'actionlink:user-edit simbollink;icon:far fa-trash-alt;name:eliminar;id:deleteb-' . $datos['idtipobien'] . ';onclick:eliminartipobien'; ?></td>
                                    </tr>
                            <?php endforeach;
                            } ?>
                        </tbody>
                    </table>
                </div>

                <div class="tab-footer"></div>


            </div>
            <div class="tab-pane" id="deudas">
                <p></p>

                <div>
                    <table id="datatable-tipodeudas" class="datatable">
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


<?php require_once './app/views/assets/includes/modals/patrimonio/bienes/crear.php'; ?>
<?php require_once './app/views/assets/includes/modals/patrimonio/deudas/crear.php'; ?>
<?php require_once './app/views/assets/includes/modals/patrimonio/bienes/editar.php'; ?>
<?php require_once './app/views/assets/includes/modals/patrimonio/deudas/editar.php'; ?>
<?php require_once './app/views/assets/includes/modals/patrimonio/bienes/eliminar.php'; ?>
<?php require_once './app/views/assets/includes/modals/patrimonio/deudas/eliminar.php'; ?>

<script src="<?php echo constant('URL') . 'app/views/assets/js/template/funciones.js' ?>"></script>
<script src="<?php echo constant('URL') . 'app/views/assets/js/template/datatables.js' ?>"></script>
<script src="<?php echo constant('URL') . 'app/views/assets/js/patrimonio/patrimonio.js' ?>"></script>
<script src="<?php echo constant('URL') . 'app/views/assets/js/patrimonio/bienes/listar.js' ?>"></script>
<script src="<?php echo constant('URL') . 'app/views/assets/js/patrimonio/deudas/listar.js' ?>"></script>