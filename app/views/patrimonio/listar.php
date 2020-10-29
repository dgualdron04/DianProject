<script>
    document.title = "Lista de Patrimonios";
</script>

<div class="content-header">
    <div class="fluid">
        <div class="fila">
            <div class="columna">
                <p class="h1">Lista de Patrimonios</p>
            </div>
            <div class="columna">
                <ol class="historialpaginas float-derecha">
                    <li class="historialpaginas-item"><a href="<?php echo constant('URL'); ?>">Inicio</a></li>
                    <li class="historialpaginas-item activo">Lista de Patrimonios</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="card-2">
    <div class="card-header-2 card-header-2-tabs card-header-2-primary">
        <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
                <span class="nav-tabs-title">Tipo de Patrimonio:</span>
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active show" href="#" id="nav-1">
                            Bienes
                            <div class="ripple-container"></div>
                            <div class="ripple-container"></div>
                        </a>
                    </li>
                    <li class="nav-item cardseparador">
                        <a class="nav-link" href="#" id="nav-2">
                            Deudas
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
            <div class="tab-pane active show" id="patrimonio">
                <p></p>


                <div class="tab-header">
                    <div class='filausuarios'>
                        <div class='columna-5'>
                            <p>Aquí podrás crear el tipo de Bien, segun la normativa de la DIAN.</p>
                        </div>
                        <div class='columna-5'>
                        </div>
                        <div class='columna-2'>
                            <a class="btn btn-block btn-usuarios">Crear el Tipo de Bienes</a>
                        </div>
                    </div>
                </div>

                <div class="cardsgrid cardsgrid-patrimonio">
                    <div class="cardparametros">

                        <div class="clip clip-bienes"></div>

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
            <div class="tab-pane" id="deudas">


                <div class="tab-header">
                    <div class='filausuarios'>
                        <div class='columna-5'>
                            <p>Aquí podrás crear el tipo de Deudas, segun la normativa de la DIAN.</p>
                        </div>
                        <div class='columna-5'>
                        </div>
                        <div class='columna-2'>
                            <a class="btn btn-block btn-usuarios">Crear el Tipo de Deudas</a>
                        </div>
                    </div>
                </div>

                <div class="cardsgrid cardsgrid-patrimonio">
                    <div class="cardparametros">

                        <div class="clip clip-deudas"></div>

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


<?php require_once './app/views/assets/includes/modals/patrimonio/bienes/crear.php'; ?>
<?php require_once './app/views/assets/includes/modals/patrimonio/deudas/crear.php'; ?>
<?php require_once './app/views/assets/includes/modals/patrimonio/bienes/editar.php'; ?>
<?php require_once './app/views/assets/includes/modals/patrimonio/deudas/editar.php'; ?>
<?php require_once './app/views/assets/includes/modals/patrimonio/bienes/eliminar.php'; ?>
<?php require_once './app/views/assets/includes/modals/patrimonio/deudas/eliminar.php'; ?>


<script type="text/javascript">
    const nav1 = document.getElementById("nav-1");
    const nav2 = document.getElementById("nav-2");
    const patrimonio = document.getElementById("patrimonio");
    const deudas = document.getElementById("deudas");

    nav1.addEventListener('click', (e) => {

        e.preventDefault();

        nav1.classList.add("active");
        nav2.classList.remove("active");
        patrimonio.classList.add("active");
        deudas.classList.remove("active");

    });

    nav2.addEventListener('click', (e) => {
        e.preventDefault();

        nav1.classList.remove("active");
        nav2.classList.add("active");
        patrimonio.classList.remove("active");
        deudas.classList.add("active");


    });
    
</script>