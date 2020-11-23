<script>
    document.title = "Crear Declaración";
</script>

<div class="content-header">
    <div class="fluid">
        <div class="fila">
            <div class="columna">
                <p class="h1">Editar Declaración</p>
            </div>
            <div class="columna">
                <ol class="historialpaginas float-derecha">
                    <li class="historialpaginas-item"><a href="<?php echo constant('URL'); ?>">Inicio</a></li>
                    <li class="historialpaginas-item"><a href="<?php echo constant('URL'); ?>declaracion/index">Declaraciones</a></li>
                    <li class="historialpaginas-item activo">Editar Declaración</li>
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
                        <i class="far fa-address-card"></i>Información Personal
                            <div class="ripple-container"></div>
                            <div class="ripple-container"></div>
                        </a>
                    </li>
                    <li class="nav-item cardseparador">
                        <a class="nav-link show" href="#" id="nav-2">
                        <i class="fas fa-sign"></i> Patrimonio
                            <div class="ripple-container"></div>
                            <div class="ripple-container"></div>
                        </a>
                    </li>
                    <li class="nav-item cardseparador">
                        <a class="nav-link show" href="#" id="nav-3">
                        <i class="fas fa-file-signature"></i> Cédulas
                            <div class="ripple-container"></div>
                            <div class="ripple-container"></div>
                        </a>
                    </li>
                    <li class="nav-item cardseparador">
                        <a class="nav-link show" href="#" id="nav-4">
                        <i class="far fa-file-alt"></i> Liquidación Privada
                            <div class="ripple-container"></div>
                            <div class="ripple-container"></div>
                        </a>
                    </li>
                    <li class="nav-item cardseparador">
                        <a class="nav-link show" href="#" id="nav-5">
                        <i class="fas fa-comment-dollar"></i> Ganancias Ocasionales
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
            <div class="tab-pane active show" id="informacionpersonal">
                <p></p>

                <div>
                    <table id="datatable-informacionpersonal" class="datatable">
                        <thead>
                            <tr>
                                <!-- <th></th> -->
                                <th>Clase</th>
                                <th>Tipo</th>
                                <th>icon:far fa-edit</th>
                                <th>icon:far fa-trash-alt</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            if (!empty($data)) {
                                foreach ($data[1] as $datos) : ?>
                                    <tr>
                                        <td><?php echo $datos['clase']; ?></td>
                                        <td><?php echo $datos['nombre']; ?></td>
                                        <td><?php echo 'actionlink:user-edit simbollink;icon:far fa-edit;name:Editar;id:editip-' . $datos['id'] .'-'.$datos['clase'].';onclick:editarinformacionpersonal'; ?></td>
                                        <td><?php echo 'actionlink:user-edit simbollink;icon:far fa-trash-alt;name:eliminar;id:deleteip-' . $datos['id'].'-'.$datos['clase'].'-'.$datos['nombre'].';onclick:eliminarinformacionpersonal'; ?></td>
                                    </tr>
                            <?php endforeach;
                            } ?>
                        </tbody>
                    </table>
                </div>

                <div class="tab-footer"></div>


            </div>

            <div class="tab-pane show" id="patrimonio">
                
                <p></p>
                <p class="scond scond-2" id="idpatrimonio"><?php echo $data[0][0] ?></p>
                
                <div class="only-flex">
                    <p class="scond scond-2" id="idtotalpatrimonio">Total Patrimonio: <?php echo empty($data[2]) ? "0" : $data[2][0]['patliquitotal']; ?></p>
                    <p class="scond scond-2" id="idtotaldeuda">Deuda Total: <?php echo empty($data[2]) ? "0" : $data[2][0]['deudatotal']; ?></p>
                    <p class="scond scond-2" id="idtotalbien">Bienes Total: <?php echo empty($data[2]) ? "0" : $data[2][0]['patbrutototal']; ?></p>
                </div>

                <div>
                    <?php /* print_r($data[2]); */ ?>
                    <table id="datatable-patrimonio" class="datatable">
                        <thead>
                            <tr>
                                <!-- <th></th> -->
                                <th>Clase</th>
                                <th>Tipo</th>
                                <th>Valor</th>
                                <th>icon:far fa-edit</th>
                                <th>icon:far fa-trash-alt</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            if (!empty($data)) {
                                foreach ($data[2] as $datos) : ?>
                                    <tr>
                                        <td><?php echo $datos['clase']; ?></td>
                                        <td><?php echo $datos['tipo']; ?></td>
                                        <td><?php echo $datos['valor']; ?></td>
                                        <td><?php echo 'actionlink:user-edit simbollink;icon:far fa-edit;name:Editar;id:editip-' . $datos['id'] .'-'.$datos['clase'].';onclick:editarpatrimonio'; ?></td>
                                        <td><?php echo 'actionlink:user-edit simbollink;icon:far fa-trash-alt;name:eliminar;id:deletep-' . $datos['id'].'-'.$datos['clase'].'-'.$datos['tipo'].'-'.$datos['valor'].';onclick:eliminarpatrimonio'; ?></td>
                                    </tr>
                            <?php endforeach;
                            } ?>
                        </tbody>
                    </table>
                </div>

                <div class="tab-footer"></div>


            </div>

            <div class="tab-pane show" id="cedulas">
                <p></p>

                <div class="tab-footer"></div>


            </div>


            <div class="tab-pane show" id="liquidacionprivada">
                <p></p>

                <p class="scond scond-2" id="idliquidacionprivada"><?php echo $data[0][2] ?></p>
                
                <!--div class="only-flex"!-->
                    <!--p class="scond scond-2" id="idtotalganancias">Total Liquidación Privada:!--> <!--?php echo empty($data[2]) ? "0" : $data[2][0]['patliquitotal']; ?!--><!--/p!-->
                <!--/div!-->

                <div>
                    <table id="datatable-liquidacionprivada" class="datatable">
                        <thead>
                            <tr>
                                <th>Clase</th>
                                <th>Valor</th>
                                <th>Descripción</th>
                                <th>icon:far fa-edit</th>
                                <th>icon:far fa-trash-alt</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            if (!empty($data)) {
                                foreach ($data[4] as $datos) : ?>
                                    <tr>
                                        <td><?php echo $datos['clase']; ?></td>
                                        <td><?php echo $datos['valor']; ?></td>
                                        <td><?php echo $datos['descripcion']; ?></td>
                                        <td><?php echo 'actionlink:user-edit simbollink;icon:far fa-edit;name:Editar;id:editlp-' . $datos['id'] .'-'.$datos['clase'].';onclick:editarliquidacionprivada'; ?></td>
                                        <td><?php echo 'actionlink:user-edit simbollink;icon:far fa-trash-alt;name:Eliminar;id:deletelp-' . $datos['id'].'-'.$datos['clase'].'-'.$datos['valor'].';onclick:eliminarliquidacionprivada'; ?></td>
                                    </tr>
                            <?php endforeach;
                            } ?>
                        </tbody>
                    </table>
                </div>

                <div class="tab-footer"></div>


            </div>


            <div class="tab-pane show" id="gananciasocasionales">
                <p></p>
                
                <p class="scond scond-2" id="idpatrimonio"><!--?php echo $data[0][0] ?!--></p>
                
                <div class="only-flex">
                    <p class="scond scond-2" id="idtotalganancias">Total Ganancias Ocasionales: <!--?php echo empty($data[2]) ? "0" : $data[2][0]['patliquitotal']; ?!--></p>
                </div>

                <div>
                    <table id="datatable-gananciasocasionales" class="datatable">
                        <thead>
                            <tr>
                                <th>Clase</th>
                                <th>Tipo</th>
                                <th>Valor</th>
                                <th>icon:far fa-edit</th>
                                <th>icon:far fa-trash-alt</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            if (!empty($data)) {
                                foreach ($data[5] as $datos) : ?>
                                    <tr>
                                        <td><?php echo $datos['clase']; ?></td>
                                        <td><?php echo $datos['tipo']; ?></td>
                                        <td><?php echo $datos['valor']; ?></td>
                                        <td><?php echo 'actionlink:user-edit simbollink;icon:far fa-edit;name:Editar;id:editip-' . $datos['id'] .'-'.$datos['clase'].';onclick:editarpatrimonio'; ?></td>
                                        <td><?php echo 'actionlink:user-edit simbollink;icon:far fa-trash-alt;name:eliminar;id:deletep-' . $datos['id'].'-'.$datos['clase'].'-'.$datos['tipo'].'-'.$datos['valor'].';onclick:eliminarpatrimonio'; ?></td>
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


<?php require_once './app/views/assets/includes/modals/declaracion/informacionpersonal/crear.php'; ?>
<?php require_once './app/views/assets/includes/modals/declaracion/informacionpersonal/editar.php'; ?>
<?php require_once './app/views/assets/includes/modals/declaracion/informacionpersonal/eliminar.php'; ?>
<?php require_once './app/views/assets/includes/modals/declaracion/patrimonio/crear.php'; ?>
<?php require_once './app/views/assets/includes/modals/declaracion/patrimonio/editar.php'; ?>
<?php require_once './app/views/assets/includes/modals/declaracion/patrimonio/eliminar.php'; ?>
<?php require_once './app/views/assets/includes/modals/declaracion/liquidacionprivada/crear.php'; ?>
<?php require_once './app/views/assets/includes/modals/declaracion/liquidacionprivada/editar.php'; ?>
<?php require_once './app/views/assets/includes/modals/declaracion/liquidacionprivada/eliminar.php'; ?>

<script src="<?php echo constant('URL') . 'app/views/assets/js/template/funciones.js' ?>"></script>
<script src="<?php echo constant('URL') . 'app/views/assets/js/template/datatables.js' ?>"></script>
<script src="<?php echo constant('URL') . 'app/views/assets/js/declaracion/declaracion.js' ?>"></script>
<script src="<?php echo constant('URL') . 'app/views/assets/js/declaracion/informacionpersonal/listar.js' ?>"></script>
<script src="<?php echo constant('URL') . 'app/views/assets/js/declaracion/patrimonio/listar.js' ?>"></script>
<script src="<?php echo constant('URL') . 'app/views/assets/js/declaracion/liquidacionprivada/listar.js' ?>"></script>
