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
                            <i class="fas fa-user"></i> Perfil
                            <div class="ripple-container"></div>
                            <div class="ripple-container"></div>
                        </a>
                    </li>
                    <li class="nav-item cardseparador">
                        <a class="nav-link show" href="#" id="nav-2">
                            <i class="fas fa-user-cog"></i> Editar Perfil
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
            <div class="tab-pane active show" id="perfil">
                <p></p>



                <div class="container-perfil">
                    <div class="container-head-perfil">
                    </div>
                    <div class="container-body-perfil">
                        <div class="profile-picture-perfil">
                            <img src="http://localhost/dianproject/public/images/avatar1.svg">
                        </div>
                        <div class="name-perfil">
                            <p id="nombreperfil"><?php
                                $nombre = explode(' ', $infouser['nombre']);
                                $apellido = explode(' ', $infouser['apellido']);
                                echo $nombre[0] . ' ' . $apellido[0];  ?></p>
                        </div>
                        <div class="location-perfil">
                            <p><?php echo $infouser['nomrol']; ?></p>
                        </div><br>
                        <div class="stats-perfil">
                            <div class="">
                                <p>Correo</p>
                                <h3 class="margin-perfil"><?php echo $infouser['correo']; ?></h3>
                            </div>

                        </div>
                        <br>
                        <div class="stats-perfil">
                            <div class="followers-perfil">
                                <p>Cedula</p>
                                <h3 class="margin-perfil" id="cedulaperfil">
                                    <?php
                                    if (strlen(trim($infouser['cedula'])) == 0) {
                                        echo "Sin Cédula";
                                    } else {
                                        echo $infouser['cedula'];
                                    }
                                    ?>
                                </h3>
                            </div>
                            <div>
                                <p>Telefono</p>
                                <h3 class="margin-perfil" id="telefonoperfil">
                                    <?php
                                    if (strlen(trim($infouser['telefono'])) == 0) {
                                        echo "Sin Teléfono";
                                    } else {
                                        echo $infouser['telefono'];
                                    }
                                    ?>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="tab-footer"></div>


            </div>

            <div class="tab-pane" id="editar-perfil">
                <p></p>


                <div class="flex">

                    <div class="container-perfil edit">
                        <div class="container-head-perfil">
                        </div>
                        <form action="" method="POST" id="formperfil">
                        <div class="container-body-perfil">
                            <div class="profile-picture-perfil">
                                <img src="http://localhost/dianproject/public/images/avatar1.svg">
                            </div>
                            <div class="name-perfil">
                                <div class="form-group flex-2">
                                    <input type="text" class="form-control edit" name="nombresperfil" value="<?= $infouser['nombre']; ?>">
                                    <input type="text" class="form-control edit" name="apellidosperfil" value="<?= $infouser['apellido']; ?>">
                                </div>
                            </div>
                            <div class="location-perfil">
                                <p><?php echo $infouser['nomrol']; ?></p>
                            </div><br>
                            <div class="stats-perfil">
                                <div class="">
                                    <p>Correo</p>
                                    <h3 class="margin-perfil-edit form-control btn-disabled"><?= $infouser['correo']; ?></p>
                                </div>

                            </div>
                            <br>
                            <div class="stats-perfil">
                                <div class="followers-perfil">
                                    <p>Cedula</p>
                                    <input type="text" class="margin-perfil-edit form-control"  name="cedulaperfil" value="<?php
                                                                                                    if (strlen(trim($infouser['cedula'])) == 0) {
                                                                                                        echo "Sin Cédula";
                                                                                                    } else {
                                                                                                        echo $infouser['cedula'];
                                                                                                    }
                                                                                                    ?>">
                                </div>
                                <div>
                                    <p>Telefono</p>
                                    <input type="text" class="margin-perfil-edit form-control"  name="telefonoperfil" value="<?php
                                                                                                    if (strlen(trim($infouser['telefono'])) == 0) {
                                                                                                        echo "Sin Teléfono";
                                                                                                    } else {
                                                                                                        echo $infouser['telefono'];
                                                                                                    }
                                                                                                    ?>">
                                    </h3>
                                </div>
                            </div>
                            <?php 
                            $id = $infouser['id'];
                                if ($id % 2 == 0) {
                                    $id = "asx2".$infouser['id']."1xgbbvj4scbvfhd2xcnt4dcnji,dck4memje".$infouser['id'].",4m32m1m12m34ddddfdf233".$infouser['id'];
                                }else{
                                    $id = "asx2".$infouser['id']."xj3m4kdxhkhdh2n2ekdjh3jk4djkxkxmemje".$infouser['id'].",NNB9WnuCYjyd3Y7vUh2se3".$infouser['id'];
                                }
                             ?>
                            <input type="text" class="scond" name="idperfil" value="<?= $id ?>">
                            <input type="submit" value="Actualizar Datos" class="btn btn-block btn-usuarios">
                        </div>
                        </form>
                    </div>
                    
                    <div class="container-pass">
                        <form action="" method="POST" id="formpass">
                        
                        <p class="h2">Change password</p>
                        
                        <label for="Password Actual" class="form-label">Password Actual</label>
                        <div class="form-group">
                            <input type="password" class="form-control" name="passact" autocomplete="off">
                        </div>
                        <label for="Password Actual" class="form-label">Password Nueva</label>
                        <div class="form-group">
                            <input type="password" class="form-control" name="passnuev" autocomplete="off">
                        </div>
                        <label for="Password Actual" class="form-label">Confirmar Password</label>
                        <div class="form-group">
                            <input type="password" class="form-control" name="confirmpassnuev" autocomplete="off">
                        </div>
                        <?php 
                            $id = $infouser['id'];
                                if ($id % 2 == 0) {
                                    $id = "pxe3".$infouser['id']."1xgbbv2332s334jsdmxbwhxjkk,xvr4memje".$infouser['id'].",5m324d25edf3e25212334m".$infouser['id'];
                                }else{
                                    $id = "pxe3".$infouser['id']."2xgb3dkdjdksjmchridfoldjdk,lxo4memje".$infouser['id'].",NNB9WnuCYjyd3Y7vUh2se3".$infouser['id'];
                                }
                             ?>
                            <input type="text" class="scond" name="idpss" value="<?= $id ?>">
                        <input type="submit" value="Cambiar Password" class="btn btn-block btn-usuarios">
                        </form>
                    </div>
                </div>




                <div class="tab-footer"></div>


            </div>
        </div>
    </div>
</div>

<script src="<?php echo constant('URL') . 'app/views/assets/js/usuario/perfil.js' ?>"></script>
