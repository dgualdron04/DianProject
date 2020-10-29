<script>
    document.title = "Crear Declaración";
</script>

<div class="content-header">
    <div class="fluid">
        <div class="fila">
            <div class="columna">
                <p class="h1">Crear Declaración</p>
            </div>
            <div class="columna">
                <ol class="historialpaginas float-derecha">
                    <li class="historialpaginas-item"><a href="<?php echo constant('URL'); ?>">Inicio</a></li>
                    <li class="historialpaginas-item"><a href="<?php echo constant('URL'); ?>declaracion/index">Lista de Declaraciones</a></li>
                    <li class="historialpaginas-item activo">Crear Declaración</li>
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
                        <i class="fas fa-edit"></i>Bienes
                            <div class="ripple-container"></div>
                            <div class="ripple-container"></div>
                        </a>
                    </li>
                    <li class="nav-item cardseparador">
                        <a class="nav-link show" href="#" id="nav-2">
                        <i class="fas fa-edit"></i> Deudas
                            <div class="ripple-container"></div>
                            <div class="ripple-container"></div>
                        </a>
                    </li>
                    <li class="nav-item cardseparador">
                        <a class="nav-link show" href="#" id="nav-3">
                        <i class="fas fa-edit"></i> Renta de Trabajo
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


                <div class="tab-header">
                    <div class='filausuarios'>
                        <div class='columna-5'>
                            <p>Aquí podrás crear tus Bienes.</p>
                        </div>
                        <div class='columna-5'>
                        </div>
                        <div class='columna-2'>
                            <a class="btn btn-block btn-usuarios">Crear Bienes</a>
                        </div>
                    </div>
                </div>

                <div class="cardsgrid cardsgrid-patrimonio">
                    <div class="card-mini">

                        <div class="clip-mini clip-bienes"></div>

                        <div class="text-center ">
                            <p class="subtitle-text formatear-p"><b>Nombre</b></p>
                            <p>Lorem ipsum dolor sit amet.</p>
                        </div>

                        <div class="text-center flex-2">

                            <a class="btn btn-block btn-declaracion" href=""><i class="fas fa-edit"></i>Editar</a>
                            <a class="btn btn-block btn-declaracion" href=""><i class='fas fa-trash-alt'></i>Eliminar</a>

                        </div>



                    </div>
                </div>

                <div class="tab-footer"></div>


            </div>

            <div class="tab-pane show" id="deudas">
                <p></p>


                <div class="tab-header">
                    <div class='filausuarios'>
                        <div class='columna-5'>
                            <p>Aquí podrás crear tus Deudas.</p>
                        </div>
                        <div class='columna-5'>
                        </div>
                        <div class='columna-2'>
                            <a class="btn btn-block btn-usuarios">Crear Deudas</a>
                        </div>
                    </div>
                </div>

                <div class="cardsgrid cardsgrid-patrimonio">
                    <div class="card-mini">

                        <div class="clip-mini clip-deudas"></div>

                        <div class="text-center ">
                            <p class="subtitle-text formatear-p"><b>Nombre</b></p>
                            <p>Lorem ipsum dolor sit amet.</p>
                        </div>

                        <div class="text-center flex-2">

                            <a class="btn btn-block btn-declaracion" href=""><i class="fas fa-edit"></i>Editar</a>
                            <a class="btn btn-block btn-declaracion" href=""><i class='fas fa-trash-alt'></i>Eliminar</a>

                        </div>



                    </div>
                </div>

                <div class="tab-footer"></div>


            </div>

            <div class="tab-pane show" id="rentatrabajo">
                <p></p>


                <div class="tab-header">
                    <div class='filausuarios'>
                        <div class='columna-5'>
                            <p>Aquí podrás crear todo lo equivalente a la renta de trabajo.</p>
                        </div>
                        <div class='columna-5'>
                        </div>
                        <div class='columna-2'>
                            <a class="btn btn-block btn-usuarios">Crear renta de trabajo</a>
                        </div>
                    </div>
                </div>

                <div class="cardsgrid cardsgrid-patrimonio">
                    <div class="card-mini">

                        <div class="clip-mini clip-prestacion"></div>

                        <div class="text-center ">
                            <p class="subtitle-text formatear-p"><b>Nombre</b></p>
                            <p>Lorem ipsum dolor sit amet.</p>
                        </div>

                        <div class="text-center flex-2">

                            <a class="btn btn-block btn-declaracion" href=""><i class="fas fa-edit"></i>Editar</a>
                            <a class="btn btn-block btn-declaracion" href=""><i class='fas fa-trash-alt'></i>Eliminar</a>

                        </div>



                    </div>
                </div>

                <div class="tab-footer"></div>


            </div>

        </div>
    </div>
</div>


<?php require_once './app/views/assets/includes/modals/declaracion/bienes/crear.php'; ?>
<?php require_once './app/views/assets/includes/modals/declaracion/bienes/editar.php'; ?>
<?php require_once './app/views/assets/includes/modals/declaracion/bienes/eliminar.php'; ?>


<script type="text/javascript">
    const nav1 = document.getElementById("nav-1");
    const nav2 = document.getElementById("nav-2");
    const nav3 = document.getElementById("nav-3");
    const bienes = document.getElementById("bienes");
    const deudas = document.getElementById("deudas");
    const rentatrabajo = document.getElementById("rentatrabajo");

    nav1.addEventListener('click', (e) => {
        e.preventDefault();

        activarboton(nav1, nav2, nav3);
        activartab(bienes, deudas, rentatrabajo);

    });

    nav2.addEventListener('click', (e) => {
        e.preventDefault();

        activarboton(nav2, nav1, nav3);
        activartab(deudas, bienes, rentatrabajo);

    });

    nav3.addEventListener('click', (e) => {
        e.preventDefault();

        activarboton(nav3, nav1, nav2);
        activartab(rentatrabajo, bienes, deudas);

    });

    function activarboton(botonactivo, botoninactivo1, botoninactivo2){

        botonactivo.classList.add("active");
        botoninactivo1.classList.remove("active");
        botoninactivo2.classList.remove("active");

    }



    function activartab (tabactivo, tabinactivo1, tabinactivo2) {

        tabactivo.classList.add("active");
        tabinactivo1.classList.remove("active");
        tabinactivo2.classList.remove("active");

    }
    
</script>