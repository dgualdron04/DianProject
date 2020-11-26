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
                    <li class="historialpaginas-item"><a href="<?php echo constant('URL'); ?>declaracion/revision/2019">Revisión</a></li>
                    <li class="historialpaginas-item activo">Ver Declaración</li>
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
                    <li class="nav-item cardseparador">
                        <a class="nav-link show" href="#" id="nav-6">
                        <i class="fas fa-file"></i> Exogenas
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
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            if (!empty($data)) {
                                foreach ($data[0] as $datos) : ?>
                                    <tr>
                                        <td><?php echo $datos['clase']; ?></td>
                                        <td><?php echo $datos['nombre']; ?></td>
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
                                <th>Nombre</th>
                                <th>Valor</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            if (!empty($data)) {
                                foreach ($data[1] as $datos) : ?>
                                    <tr>
                                        <td><?php echo $datos['clase']; ?></td>
                                        <td><?php echo $datos['tipo']; ?></td>
                                        <td><?php echo $datos['nombre']; ?></td>
                                        <td><?php echo $datos['valor']; ?></td>
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
            

                <div>
                    <table id="datatable-cedulas" class="datatable">
                        <thead>
                            <tr>
                                <th>Clase</th>
                                <th>Tipo</th>
                                <th>Valor</th>
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
                                    </tr>
                            <?php endforeach;
                            } ?>
                        </tbody>
                    </table>
                </div>

                <div class="tab-footer"></div>


            </div>


            <div class="tab-pane show" id="liquidacionprivada">
                <p></p>

                <div>
                    <table id="datatable-liquidacionprivada" class="datatable">
                        <thead>
                            <tr>
                                <th>Clase</th>
                                <th>Nombre</th>
                                <th>Valor</th>
                                <th>Descripción</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            if (!empty($data)) {
                                foreach ($data[3] as $datos) : ?>
                                    <tr>
                                        <td><?php echo $datos['clase']; ?></td>
                                        <td><?php echo $datos['nombre']; ?></td>
                                        <td><?php echo $datos['valor']; ?></td>
                                        <td><?php echo $datos['descripcion']; ?></td>
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
                
                <div>
                    <table id="datatable-gananciasocasionales" class="datatable">
                        <thead>
                            <tr>
                                <th>Clase</th>
                                <th>Tipo</th>
                                <th>Valor</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            if (!empty($data)) {
                                foreach ($data[4] as $datos) : ?>
                                    <tr>
                                        <td><?php echo $datos['clase']; ?></td>
                                        <td><?php echo $datos['tipo']; ?></td>
                                        <td><?php echo $datos['valor']; ?></td>
                                    </tr>
                            <?php endforeach;
                            } ?>
                        </tbody>
                    </table>
                </div>

                <div class="tab-footer"></div>


            </div>

            <div class="tab-pane show" id="exogenas">
                <p></p>

                <div>
                    <table id="datatable-exogenas" class="datatable">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            if (!empty($data)) {
                                foreach ($data[5] as $datos) : ?>
                                    <tr>
                                        <td>
                                            <!--?php 
                                            $cadena = str_replace("./app/views/assets/files/exogenas/","",$datos['ruta']);
                                            echo str_replace($infouser['nombre'].$infouser['apellido'].'-', "", $cadena) ?!-->
                                        <?php echo "download:".$datos['ruta'].";" ?>
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


<script src="<?php echo constant('URL') . 'app/views/assets/js/template/funciones.js' ?>"></script>
<script src="<?php echo constant('URL') . 'app/views/assets/js/template/datatables.js' ?>"></script>
<script src="<?php echo constant('URL') . 'app/views/assets/js/declaracion/declaracion.js' ?>"></script>
<script src="<?php echo constant('URL') . 'app/views/assets/js/declaracion/ver/listar.js' ?>"></script>

