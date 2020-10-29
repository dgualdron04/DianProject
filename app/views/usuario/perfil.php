<script>
    document.title = "Perfil de Usuario";
</script>

<div class="content-header">
    <div class="fluid">
        <div class="fila">
            <div class="columna">
                <p class="h1">Perfil de Usuario</p>
            </div>
            <div class="columna">
                <ol class="historialpaginas float-derecha">
                    <li class="historialpaginas-item"><a href="<?php echo constant('URL'); ?>">Inicio</a></li>
                    <li class="historialpaginas-item activo">Perfil</li>
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
                            <i class="fas fa-edit"></i>Perfil
                            <div class="ripple-container"></div>
                            <div class="ripple-container"></div>
                        </a>
                    </li>
                    <li class="nav-item cardseparador">
                        <a class="nav-link show" href="#" id="nav-2">
                            <i class="fas fa-edit"></i> Editar Perfil
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



                <div class="container-perfil">
                    <div class="container-head-perfil">
                    </div>
                    <div class="container-body-perfil">
                        <div class="profile-picture-perfil">
                            <img src="http://localhost/dianproject/public/images/avatar1.svg">
                        </div>
                        <div class="name-perfil">
                            <p>Anahis Rodriguez</p>
                        </div>
                        <div class="location-perfil">
                            <p>Declarante</p>
                        </div><br>
                            <div class="stats-perfil" >
                                <div class="">
                                <p>Correo</p>
                                <h3 class="margin-perfil">arodriguez27@udi.edu.co</h3>
                                </div>
                                
                            </div>
                            <br>
                        <div class="stats-perfil">
                            <div class="followers-perfil">
                                <p>Cedula</p>
                                <h3 class="margin-perfil">0000000000</h3>
                            </div>
                            <div >
                                <p>Telefono</p>
                                <h3 class="margin-perfil">0000000000</h3>
                            </div>
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


<?php require_once './app/views/assets/includes/modals/perfil/editar.php'; ?>


