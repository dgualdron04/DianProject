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



<div class="card-2">
    <div class="card-header-2 card-header-2-tabs card-header-2-primary">
        <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
                <span class="nav-tabs-title">Declaración de Renta:</span>
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active show" href="#" id="nav-1">
                            Listar
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
            <div class="tab-pane active show" id="declaracion">
                <p></p>


                <div class="tab-header">
                    <div class='filausuarios'>
                        <div class='columna-5'>
                            <p>Aquí podrás crear los parametros, segun la normativa de la DIAN.</p>
                        </div>
                        <div class='columna-5'>
                        </div>
                        <div class='columna-2'>
                            <a class="btn btn-block btn-usuarios">Crear Parametros</a>
                        </div>
                    </div>
                </div>

                <div class="cardsgrid">
                    <div class="cardparametros">

                        <div class="clip clip-parametros"></div>

                        <div class="text-center ">
                            <p class="subtitle-text formatear-p"><b>Parámetro del Anio</b></p>
                            <p>0000</p>
                        </div>

                        <div class="text-center ">
                            <p class="subtitle-text formatear-p"><b>Valor tributario</b></p>
                            <p>$000.000.000</p>
                        </div>

                        <div class="text-center flex-2">

                            <div class="topes">
                                <p class="subtitle-text formatear-p"><b>Tope 1</b></p>
                                <p>$000.000.000</p>
                            </div>

                            <div class="topes">
                                <p class="subtitle-text formatear-p"><b>Tope 2</b></p>
                                <p>$000.000.000</p>
                            </div>

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


<?php require_once './app/views/assets/includes/modals/parametros/crear.php'; ?>
<?php require_once './app/views/assets/includes/modals/parametros/editar.php'; ?>
<?php require_once './app/views/assets/includes/modals/parametros/eliminar.php'; ?>


<script src="<?php echo constant('URL') . 'app/views/assets/js/parametros/listar.js' ?>"></script>