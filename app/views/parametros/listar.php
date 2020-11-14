<script>
    document.title = "Lista de Parametros";
</script>

<div class="content-header">
    <div class="fluid">
        <div class="fila">
            <div class="columna">
                <p class="h1">Lista de Parámetros</p>
            </div>
            <div class="columna">
                <ol class="historialpaginas float-derecha">
                    <li class="historialpaginas-item"><a href="<?php echo constant('URL'); ?>">Inicio</a></li>
                    <li class="historialpaginas-item activo">Lista de Parámetros</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<?php $contanio = 0; $fecha = getdate(); $contcalendario = 0;?>

<div class="card-2">
    <div class="card-header-2 card-header-2-tabs card-header-2-primary">
        <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active show" href="#" id="nav-1">
                            Parámetros
                            <div class="ripple-container"></div>
                            <div class="ripple-container"></div>
                        </a>
                    </li>
                    <li class="nav-item cardseparador">
                        <a class="nav-link" href="#" id="nav-2">
                            Calendario Tributario
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
            <div class="tab-pane active show" id="parametros">
                <p></p>

                <div id="table-place">
                    <table id="datatable" class="datatable">
                        <thead>
                            <tr>
                                <!-- <th></th> -->
                                <th>Estado</th>
                                <th>Anno</th>
                                <th>Valor Tributario</th>
                                <th>Tope 1</th>
                                <th>Tope 2</th>
                                <th>icon:far fa-edit</th>
                                <th>icon:far fa-trash-alt</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            if (!empty($data)) {
                                foreach ($data[0] as $datos) : ?>
                                    <tr>
                                        <!-- <td>checkbox:</td> -->
                                        <td>
                                            <span class="<?php
                                                            if ($datos['estadoparametro'] == true) {
                                                                echo "available";
                                                            } else {
                                                                echo "offline";
                                                            }
                                                            ?>">
                                            </span>
                                        </td>
                                        <td><?php 
                                        
                                        echo $datos['annoperiodo']; 
                                        if ($datos['annoperiodo'] == $fecha['year']-1) {
                                            $contanio++;
                                        }
                                        ?></td>
                                        <td>$<?php echo number_format($datos["valortributario"], 0, '.', '.'); ?></td>
                                        <td>$<?php echo number_format($datos["tope1"], 0, '.', '.'); ?></td>
                                        <td>$<?php echo number_format($datos["tope2"], 0, '.', '.'); ?></td>
                                        <td>
                                            <?php
                                            
                                            /* if ($datos['estadoparametro'] == false && $datos['annoperiodo'] != $fecha['year']-1) {
                                                echo 'icon:far fa-edit;name:editar';
                                            } else { */
                                                echo 'actionlink:user-edit simbollink;icon:far fa-edit;name:editar;id:edit-'.$datos['idparametro'].';onclick:editarparametro';
                                            /* } */
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            /* if ($datos['estadoparametro'] == false && $datos['annoperiodo'] != $fecha['year']-1) {
                                                echo 'icon:far fa-trash-alt;name:eliminar';
                                            } else { */
                                                echo 'actionlink:user-edit simbollink;icon:far fa-trash-alt;name:eliminar;id:delete-'.$datos['idparametro'].';onclick:eliminarparametro';
                                            /* } */
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

            <div class="tab-pane show" id="calendario">
                <p></p>

                <div>
                    <table id="datatable-calendario" class="datatable">
                        <thead>
                            <tr>
                                <!-- <th></th> -->
                                <th>Anno</th>
                                <th>Día de inicio</th>
                                <th>Día final</th>
                                <th>icon:far fa-plus-square</th>
                                <th>icon:far fa-edit</th>
                                <th>icon:far fa-trash-alt</th>
                            </tr>
                        </thead>
                            
                        <tbody>
                            <?php
                            if (!empty($data)) {
                                foreach ($data[1] as $datos) : ?>
                                    <tr>
                                        <!-- <td>checkbox:</td> -->
                                        <td><?php 
                                        echo $datos['annoperiodo']; 
                                        if ($datos['annoperiodo'] == $fecha['year']-1) {
                                            $contcalendario++;
                                        }
                                        ?></td>
                                        <td><?php echo $datos["dia1"]; ?></td>
                                        <td><?php echo $datos["dia2"]; ?></td>
                                        <td>
                                            <?php
                                                echo 'actionlink:user-edit simbollink;icon:far fa-plus-square;name:Agregar NITS;id:agregarnit-'.$datos['idcalendario'].';onclick:agregarnits';
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                                echo 'actionlink:user-edit simbollink;icon:far fa-edit;name:Editar;id:editc-'.$datos['idcalendario'].';onclick:editarcalendario';
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                                echo 'actionlink:user-edit simbollink;icon:far fa-trash-alt;name:Eliminar;id:deletec-'.$datos['idcalendario'].';onclick:eliminarcalendario';
                                            ?>
                                        </td>
                                    </tr>
                            <?php endforeach;
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="alertas">
</div>

<?php 
if ($contanio > 0) {
    require_once './app/views/assets/includes/alertas/alert.php';
    
    require_once './app/views/assets/includes/modals/parametros/calendario/editar.php'; 
    require_once './app/views/assets/includes/modals/parametros/calendario/eliminar.php';
    if ($contcalendario == 0) {
        require_once './app/views/assets/includes/modals/parametros/calendario/crear.php'; 
    }else{
        require_once './app/views/assets/includes/modals/parametros/calendario/periododeclarante/listar.php'; 
        require_once './app/views/assets/includes/modals/parametros/calendario/periododeclarante/eliminar.php'; 
        require_once './app/views/assets/includes/modals/parametros/calendario/periododeclarante/editar.php'; 
        require_once './app/views/assets/includes/modals/parametros/calendario/periododeclarante/crear.php'; 
    }
     
    
    
}else{
    require_once './app/views/assets/includes/modals/parametros/crear.php'; 
}
?>
<?php require_once './app/views/assets/includes/modals/parametros/editar.php'; ?>
<?php require_once './app/views/assets/includes/modals/parametros/eliminar.php'; ?>

<script src="<?php echo constant('URL') . 'app/views/assets/js/template/datatables.js' ?>"></script>
<script src="<?php echo constant('URL') . 'app/views/assets/js/parametros/listar.js' ?>"></script>

<?php if ($contanio > 0) {?>
    <script src="<?php echo constant('URL') . 'app/views/assets/js/parametros/calendario/listar.js' ?>"></script>
<?php } ?>
