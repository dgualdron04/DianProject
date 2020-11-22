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
                        <i class="fas fa-edit"></i>Información Personal
                            <div class="ripple-container"></div>
                            <div class="ripple-container"></div>
                        </a>
                    </li>
                    <li class="nav-item cardseparador">
                        <a class="nav-link show" href="#" id="nav-2">
                        <i class="fas fa-edit"></i> Patrimonio
                            <div class="ripple-container"></div>
                            <div class="ripple-container"></div>
                        </a>
                    </li>
                    <li class="nav-item cardseparador">
                        <a class="nav-link show" href="#" id="nav-3">
                        <i class="fas fa-edit"></i> Cedulas
                            <div class="ripple-container"></div>
                            <div class="ripple-container"></div>
                        </a>
                    </li>
                    <li class="nav-item cardseparador">
                        <a class="nav-link show" href="#" id="nav-4">
                        <i class="fas fa-edit"></i> Liquidación Privada
                            <div class="ripple-container"></div>
                            <div class="ripple-container"></div>
                        </a>
                    </li>
                    <li class="nav-item cardseparador">
                        <a class="nav-link show" href="#" id="nav-5">
                        <i class="fas fa-edit"></i> Ganancias Ocasionales
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
                                foreach ($data as $datos) : ?>
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

                <div class="tab-footer"></div>


            </div>

            <div class="tab-pane show" id="cedulas">
                <p></p>

                <div class="tab-footer"></div>


            </div>


            <div class="tab-pane show" id="liquidacionprivada">
                <p></p>

                <div class="tab-footer"></div>


            </div>


            <div class="tab-pane show" id="gananciasocasionales">
                <p></p>

                <div class="tab-footer"></div>


            </div>

        </div>
    </div>
</div>


<?php require_once './app/views/assets/includes/modals/declaracion/informacionpersonal/crear.php'; ?>
<?php require_once './app/views/assets/includes/modals/declaracion/informacionpersonal/editar.php'; ?>
<?php require_once './app/views/assets/includes/modals/declaracion/informacionpersonal/eliminar.php'; ?>

<script src="<?php echo constant('URL') . 'app/views/assets/js/template/funciones.js' ?>"></script>
<script src="<?php echo constant('URL') . 'app/views/assets/js/template/datatables.js' ?>"></script>
<script src="<?php echo constant('URL') . 'app/views/assets/js/declaracion/informacionpersonal/listar.js' ?>"></script>


<script type="text/javascript">
    const nav1 = document.getElementById("nav-1");
    const nav2 = document.getElementById("nav-2");
    const nav3 = document.getElementById("nav-3");
    const nav4 = document.getElementById("nav-4");
    const nav5 = document.getElementById("nav-5");
    const informacionpersonal = document.getElementById("informacionpersonal");
    const patrimonio = document.getElementById("patrimonio");
    const cedulas = document.getElementById("cedulas");
    const liquidacionprivada = document.getElementById("liquidacionprivada");
    const gananciasocasionales = document.getElementById("gananciasocasionales");

    nav1.addEventListener('click', (e) => {
        e.preventDefault();

        activarboton(nav1, nav2, nav3, nav4, nav5);
        activartab(informacionpersonal, patrimonio, cedulas, liquidacionprivada, gananciasocasionales);

    });

    nav2.addEventListener('click', (e) => {
        e.preventDefault();

        activarboton(nav2, nav1, nav3, nav4, nav5);
        activartab(patrimonio, informacionpersonal, cedulas, liquidacionprivada, gananciasocasionales);

    });

    nav3.addEventListener('click', (e) => {
        e.preventDefault();

        activarboton(nav3, nav1, nav2, nav4, nav5);
        activartab(cedulas, informacionpersonal, patrimonio, liquidacionprivada, gananciasocasionales);

    });

    nav4.addEventListener('click', (e) => {
        e.preventDefault();

        activarboton(nav4, nav1, nav2, nav3, nav5);
        activartab(liquidacionprivada, informacionpersonal, patrimonio, cedulas, gananciasocasionales);

    });

    nav5.addEventListener('click', (e) => {
        e.preventDefault();

        activarboton(nav5, nav1, nav2, nav3, nav4);
        activartab(gananciasocasionales, informacionpersonal, patrimonio, cedulas, liquidacionprivada);

    });

    function activarboton(botonactivo, botoninactivo1, botoninactivo2, botoninactivo3, botoninactivo4){

        botonactivo.classList.add("active");
        botoninactivo1.classList.remove("active");
        botoninactivo2.classList.remove("active");
        botoninactivo3.classList.remove("active");
        botoninactivo4.classList.remove("active");

    }



    function activartab (tabactivo, tabinactivo1, tabinactivo2, tabinactivo3, tabinactivo4) {

        tabactivo.classList.add("active");
        tabinactivo1.classList.remove("active");
        tabinactivo2.classList.remove("active");
        tabinactivo3.classList.remove("active");
        tabinactivo4.classList.remove("active");

    }
    
</script>