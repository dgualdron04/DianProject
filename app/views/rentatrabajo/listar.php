<script>
    document.title = "Renta de trabajo";
</script>

<div class="content-header">
    <div class="fluid">
        <div class="fila">
            <div class="columna">
                <p class="h1">Renta de Trabajo</p>
            </div>
            <div class="columna">
                <ol class="historialpaginas float-derecha">
                    <li class="historialpaginas-item"><a href="<?php echo constant('URL'); ?>">Inicio</a></li>
                    <li class="historialpaginas-item activo">Renta de trabajo</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="card-2">
    <div class="card-header-2 card-header-2-tabs card-header-2-primary">
        <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
                <span class="nav-tabs-title">Declaración de Renta:</span>
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active show" href="#" id="nav-1">
                            Prestación
                            <div class="ripple-container"></div>
                            <div class="ripple-container"></div>
                        </a>
                    </li>
                    <li class="nav-item cardseparador">
                        <a class="nav-link show" href="#" id="nav-2">
                            Aporte Obligatorio
                            <div class="ripple-container"></div>
                            <div class="ripple-container"></div>
                        </a>
                    </li>
                    <li class="nav-item cardseparador">
                        <a class="nav-link show" href="#" id="nav-3">
                            Aporte Voluntario
                            <div class="ripple-container"></div>
                            <div class="ripple-container"></div>
                        </a>
                    </li>
                    <li class="nav-item cardseparador">
                        <a class="nav-link show" href="#" id="nav-4">
                            Pago de Alimentación
                            <div class="ripple-container"></div>
                            <div class="ripple-container"></div>
                        </a>
                    </li>
                    <li class="nav-item cardseparador">
                        <a class="nav-link show" href="#" id="nav-5">
                            Deducción
                            <div class="ripple-container"></div>
                            <div class="ripple-container"></div>
                        </a>
                    </li>
                    <li class="nav-item cardseparador">
                        <a class="nav-link show" href="#" id="nav-6">
                            Indemnización
                            <div class="ripple-container"></div>
                            <div class="ripple-container"></div>
                        </a>
                    </li>
                    <li class="nav-item cardseparador">
                        <a class="nav-link show" href="#" id="nav-7">
                            Prima
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
            <div class="tab-pane active show" id="prestacion">
                <p></p>


                <div class="tab-header">
                    <div class='filausuarios'>
                        <div class='columna-5'>
                            <p>Aquí podrás crear el tipo de Prestaciones, segun la normativa de la DIAN.</p>
                        </div>
                        <div class='columna-5'>
                        </div>
                        <div class='columna-2'>
                            <a class="btn btn-block btn-usuarios">Crear tipo de Prestación</a>
                        </div>
                    </div>
                </div>

                <div class="cardsgrid cardsgrid-patrimonio">
                    <div class="cardparametros">

                        <div class="clip clip-prestacion"></div>

                        <div class="text-center ">
                            <p class="subtitle-text formatear-p"><b>Nombre</b></p>
                            <p>Lorem ipsum dolor sit amet.</p>
                        </div>

                        <div class="text-center ">
                            <p class="subtitle-text formatear-p"><b>Descripción</b></p>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur commodi aperiam adipisci reprehenderit sed! Laudantium nam necessitatibus fuga quaerat omnis.</p>
                        </div>

                        <div class="text-center flex-2">

                            <a class="btn btn-block btn-parametros" href=""><i class="fas fa-edit"></i>Editar</a>
                            <a class="btn btn-block btn-parametros" href=""><i class='fas fa-trash-alt'></i>Eliminar</a>

                        </div>



                    </div>
                </div>

                <div class="tab-footer"></div>


            </div>


            <div class="tab-pane" id="aporteobligatorio">


                <div class="tab-header">
                    <div class='filausuarios'>
                        <div class='columna-5'>
                            <p>Aquí podrás crear el tipo de Aporte Obligatorio, segun la normativa de la DIAN.</p>
                        </div>
                        <div class='columna-5'>
                        </div>
                        <div class='columna-2'>
                            <a class="btn btn-block btn-usuarios">Crear el Tipo de Aporte Obligatorio</a>
                        </div>
                    </div>
                </div>

                <div class="cardsgrid cardsgrid-patrimonio">
                    <div class="cardparametros">

                        <div class="clip clip-obligatorio"></div>

                        <div class="text-center ">
                            <p class="subtitle-text formatear-p"><b>Nombre</b></p>
                            <p>Lorem ipsum dolor sit amet.</p>
                        </div>

                        <div class="text-center ">
                            <p class="subtitle-text formatear-p"><b>Descripción</b></p>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur commodi aperiam adipisci reprehenderit sed! Laudantium nam necessitatibus fuga quaerat omnis.</p>
                        </div>

                        <div class="text-center flex-2">

                            <a class="btn btn-block btn-parametros" href=""><i class="fas fa-edit"></i>Editar</a>
                            <a class="btn btn-block btn-parametros" href=""><i class='fas fa-trash-alt'></i>Eliminar</a>

                        </div>



                    </div>
                </div>

                <div class="tab-footer"></div>

            </div>


            <div class="tab-pane" id="aportevoluntario">


                <div class="tab-header">
                    <div class='filausuarios'>
                        <div class='columna-5'>
                            <p>Aquí podrás crear el tipo de Aporte Voluntario, segun la normativa de la DIAN.</p>
                        </div>
                        <div class='columna-5'>
                        </div>
                        <div class='columna-2'>
                            <a class="btn btn-block btn-usuarios">Crear el Tipo de Aporte Voluntario</a>
                        </div>
                    </div>
                </div>

                <div class="cardsgrid cardsgrid-patrimonio">
                    <div class="cardparametros">

                        <div class="clip clip-voluntario"></div>

                        <div class="text-center ">
                            <p class="subtitle-text formatear-p"><b>Nombre</b></p>
                            <p>Lorem ipsum dolor sit amet.</p>
                        </div>

                        <div class="text-center ">
                            <p class="subtitle-text formatear-p"><b>Descripción</b></p>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur commodi aperiam adipisci reprehenderit sed! Laudantium nam necessitatibus fuga quaerat omnis.</p>
                        </div>

                        <div class="text-center flex-2">

                            <a class="btn btn-block btn-parametros" href=""><i class="fas fa-edit"></i>Editar</a>
                            <a class="btn btn-block btn-parametros" href=""><i class='fas fa-trash-alt'></i>Eliminar</a>

                        </div>



                    </div>
                </div>

                <div class="tab-footer"></div>

            </div>


            <div class="tab-pane" id="pagoalimentacion">


                <div class="tab-header">
                    <div class='filausuarios'>
                        <div class='columna-5'>
                            <p>Aquí podrás crear el tipo de Pago de Alimentación, segun la normativa de la DIAN.</p>
                        </div>
                        <div class='columna-5'>
                        </div>
                        <div class='columna-2'>
                            <a class="btn btn-block btn-usuarios">Crear el Tipo de Pago de Alimentación</a>
                        </div>
                    </div>
                </div>

                <div class="cardsgrid cardsgrid-patrimonio">
                    <div class="cardparametros">

                        <div class="clip clip-alimentacion"></div>

                        <div class="text-center ">
                            <p class="subtitle-text formatear-p"><b>Nombre</b></p>
                            <p>Lorem ipsum dolor sit amet.</p>
                        </div>

                        <div class="text-center ">
                            <p class="subtitle-text formatear-p"><b>Descripción</b></p>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur commodi aperiam adipisci reprehenderit sed! Laudantium nam necessitatibus fuga quaerat omnis.</p>
                        </div>

                        <div class="text-center flex-2">

                            <a class="btn btn-block btn-parametros" href=""><i class="fas fa-edit"></i>Editar</a>
                            <a class="btn btn-block btn-parametros" href=""><i class='fas fa-trash-alt'></i>Eliminar</a>

                        </div>



                    </div>
                </div>

                <div class="tab-footer"></div>

            </div>


            <div class="tab-pane" id="deduccion">


                <div class="tab-header">
                    <div class='filausuarios'>
                        <div class='columna-5'>
                            <p>Aquí podrás crear el tipo de Deduccion, segun la normativa de la DIAN.</p>
                        </div>
                        <div class='columna-5'>
                        </div>
                        <div class='columna-2'>
                            <a class="btn btn-block btn-usuarios">Crear el Tipo de Deduccion</a>
                        </div>
                    </div>
                </div>

                <div class="cardsgrid cardsgrid-patrimonio">
                    <div class="cardparametros">

                        <div class="clip clip-deduccion"></div>

                        <div class="text-center ">
                            <p class="subtitle-text formatear-p"><b>Nombre</b></p>
                            <p>Lorem ipsum dolor sit amet.</p>
                        </div>

                        <div class="text-center ">
                            <p class="subtitle-text formatear-p"><b>Descripción</b></p>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur commodi aperiam adipisci reprehenderit sed! Laudantium nam necessitatibus fuga quaerat omnis.</p>
                        </div>

                        <div class="text-center flex-2">

                            <a class="btn btn-block btn-parametros" href=""><i class="fas fa-edit"></i>Editar</a>
                            <a class="btn btn-block btn-parametros" href=""><i class='fas fa-trash-alt'></i>Eliminar</a>

                        </div>



                    </div>
                </div>

                <div class="tab-footer"></div>

            </div>


            <div class="tab-pane" id="indemnizacion">


                <div class="tab-header">
                    <div class='filausuarios'>
                        <div class='columna-5'>
                            <p>Aquí podrás crear el tipo de Indemnizacion, segun la normativa de la DIAN.</p>
                        </div>
                        <div class='columna-5'>
                        </div>
                        <div class='columna-2'>
                            <a class="btn btn-block btn-usuarios">Crear el Tipo de Indemnizacion</a>
                        </div>
                    </div>
                </div>

                <div class="cardsgrid cardsgrid-patrimonio">
                    <div class="cardparametros">

                        <div class="clip clip-indemnizacion"></div>

                        <div class="text-center ">
                            <p class="subtitle-text formatear-p"><b>Nombre</b></p>
                            <p>Lorem ipsum dolor sit amet.</p>
                        </div>

                        <div class="text-center ">
                            <p class="subtitle-text formatear-p"><b>Descripción</b></p>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur commodi aperiam adipisci reprehenderit sed! Laudantium nam necessitatibus fuga quaerat omnis.</p>
                        </div>

                        <div class="text-center flex-2">

                            <a class="btn btn-block btn-parametros" href=""><i class="fas fa-edit"></i>Editar</a>
                            <a class="btn btn-block btn-parametros" href=""><i class='fas fa-trash-alt'></i>Eliminar</a>

                        </div>



                    </div>
                </div>

                <div class="tab-footer"></div>

            </div>


            <div class="tab-pane" id="prima">


                <div class="tab-header">
                    <div class='filausuarios'>
                        <div class='columna-5'>
                            <p>Aquí podrás crear el tipo de Prima, segun la normativa de la DIAN.</p>
                        </div>
                        <div class='columna-5'>
                        </div>
                        <div class='columna-2'>
                            <a class="btn btn-block btn-usuarios">Crear el Tipo de Prima</a>
                        </div>
                    </div>
                </div>

                <div class="cardsgrid cardsgrid-patrimonio">
                    <div class="cardparametros">

                        <div class="clip clip-prima"></div>

                        <div class="text-center ">
                            <p class="subtitle-text formatear-p"><b>Nombre</b></p>
                            <p>Lorem ipsum dolor sit amet.</p>
                        </div>

                        <div class="text-center ">
                            <p class="subtitle-text formatear-p"><b>Descripción</b></p>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur commodi aperiam adipisci reprehenderit sed! Laudantium nam necessitatibus fuga quaerat omnis.</p>
                        </div>

                        <div class="text-center flex-2">

                            <a class="btn btn-block btn-parametros" href=""><i class="fas fa-edit"></i>Editar</a>
                            <a class="btn btn-block btn-parametros" href=""><i class='fas fa-trash-alt'></i>Eliminar</a>

                        </div>



                    </div>
                </div>

                <div class="tab-footer"></div>

            </div>

        </div>
    </div>
</div>


<?php require_once './app/views/assets/includes/modals/rentatrabajo/prestacion/crear.php'; ?>
<?php require_once './app/views/assets/includes/modals/rentatrabajo/prestacion/editar.php'; ?>
<?php require_once './app/views/assets/includes/modals/rentatrabajo/prestacion/eliminar.php'; ?>



<script type="text/javascript">
    const nav1 = document.getElementById("nav-1");
    const nav2 = document.getElementById("nav-2");
    const nav3 = document.getElementById("nav-3");
    const nav4 = document.getElementById("nav-4");
    const nav5 = document.getElementById("nav-5");
    const nav6 = document.getElementById("nav-6");
    const nav7 = document.getElementById("nav-7");
    const prestacion = document.getElementById("prestacion");
    const aporteobligatorio = document.getElementById("aporteobligatorio");
    const aportevoluntario = document.getElementById("aportevoluntario");
    const pagoalimentacion = document.getElementById("pagoalimentacion");
    const deduccion = document.getElementById("deduccion");
    const indemnizacion = document.getElementById("indemnizacion");
    const prima = document.getElementById("prima");

    nav1.addEventListener('click', (e) => {
        e.preventDefault();

        activarboton(nav1, nav2, nav3, nav4, nav5, nav6, nav7);
        activartab(prestacion, aporteobligatorio, aportevoluntario, pagoalimentacion, deduccion, indemnizacion, prima );

    });

    nav2.addEventListener('click', (e) => {
        e.preventDefault();

        activarboton(nav2, nav1, nav3, nav4, nav5, nav6, nav7);
        activartab(aporteobligatorio, prestacion, aportevoluntario, pagoalimentacion, deduccion, indemnizacion, prima );

    });

    nav3.addEventListener('click', (e) => {
        e.preventDefault();

        activarboton(nav3, nav1, nav2, nav4, nav5, nav6, nav7);
        activartab(aportevoluntario, prestacion, aporteobligatorio, pagoalimentacion, deduccion, indemnizacion, prima );

    });

    nav4.addEventListener('click', (e) => {
        e.preventDefault();

        activarboton(nav4, nav1, nav2, nav3, nav5, nav6, nav7);
        activartab(pagoalimentacion, prestacion, aporteobligatorio, aportevoluntario, deduccion, indemnizacion, prima );

    });

    nav5.addEventListener('click', (e) => {
        e.preventDefault();

        activarboton(nav5, nav1, nav2, nav3, nav4, nav6, nav7);
        activartab(deduccion, prestacion, aporteobligatorio, aportevoluntario, pagoalimentacion, indemnizacion, prima );

    });

    nav6.addEventListener('click', (e) => {
        e.preventDefault();

        activarboton(nav6, nav1, nav2, nav3, nav4, nav5, nav7);
        activartab(indemnizacion, prestacion, aporteobligatorio, aportevoluntario, pagoalimentacion, deduccion, prima );

    });

    nav7.addEventListener('click', (e) => {
        e.preventDefault();

        activarboton(nav7, nav1, nav2, nav3, nav4, nav5, nav6);
        activartab(prima, prestacion, aporteobligatorio, aportevoluntario, pagoalimentacion, deduccion, indemnizacion);

    });


    function activarboton(botonactivo, botoninactivo1, botoninactivo2, botoninactivo3, botoninactivo4, botoninactivo5, botoninactivo6){

        botonactivo.classList.add("active");
        botoninactivo1.classList.remove("active");
        botoninactivo2.classList.remove("active");
        botoninactivo3.classList.remove("active");
        botoninactivo4.classList.remove("active");
        botoninactivo5.classList.remove("active");
        botoninactivo6.classList.remove("active");

    }



    function activartab (tabactivo, tabinactivo1, tabinactivo2, tabinactivo3, tabinactivo4, tabinactivo5, tabinactivo6) {

        tabactivo.classList.add("active");
        tabinactivo1.classList.remove("active");
        tabinactivo2.classList.remove("active");
        tabinactivo3.classList.remove("active");
        tabinactivo4.classList.remove("active");
        tabinactivo5.classList.remove("active");
        tabinactivo6.classList.remove("active");

    }
    
</script>