<script>
    document.title = "Declaracion";
</script>

<div class="content-header">
    <div class="fluid">
        <div class="fila">
            <div class="columna">
                <p class="h1">Lista de Declaraciones</p>
            </div>
            <div class="columna">
                <ol class="historialpaginas float-derecha">
                    <li class="historialpaginas-item"><a href="<?php echo constant('URL'); ?>">Inicio</a></li>
                    <li class="historialpaginas-item activo">Lista de Declaraciones</li>
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
                            <p>Aquí podrás crear tu declaración de renta.</p>
                        </div>
                        <div class='columna-5'>
                        </div>
                        <div class='columna-2'>
                            <a href="<?php echo constant('URL'); ?>declaracion/crear" class="btn btn-block btn-usuarios">Crear Declaración de Renta</a>
                        </div>
                    </div>
                </div>

                <div class="cardsgrid cardsgrid-patrimonio">
                    <div class="carddeclaracion">

                        <div class="clip clip-declaracion"></div>

                        <div class="skill-container">
                            <div class="skill progreso load"><span>0%</span></div>
                        </div>

                        <div class="text-center ">
                            <p class="subtitle-text formatear-p"><b>Anio</b></p>
                            <p>0000</p>
                        </div>


                        <div class="text-center flex-2">

                            <a class="btn btn-block btn-declaracion" href=""><i class="fas fa-edit"></i>Editar</a>
                            <a class="btn btn-block btn-declaracion" href=""><i class='fas fa-trash-alt'></i>Eliminar</a>
                            <a class="btn btn-block btn-declaracion btn-disabled" href="">Crear PDF</a>

                        </div>



                    </div>
                </div>

                <div class="tab-footer"></div>


            </div>
        </div>
    </div>
</div>


<?php require_once './app/views/assets/includes/modals/declaracion/eliminar.php'; ?>



