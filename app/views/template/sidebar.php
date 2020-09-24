
<!--Wrapper Inicio-->

<div class="wrapper collapse" id="wrapper">

    <!--Header-->
    <?php require_once 'header.php';  ?>
    <!--Header-->
    <!--Sidebar Inicio-->
    <div class="sidebar">
        <div class="sidebar-menu">
            <center class="profile">
                <img src="<?php echo constant('URL').'public/images/avatar1.svg'?>" alt="User">
                <p><!--?php echo $usuarios->obteneruser(); ?!-->Usuario</p>
                <p><!--?php echo $usuarios->obtenerrol(); ?!-->Rol</p>
            </center>
            <ul>
    <li class="item">
        <a href="./" class="menu-btn" id="inicioboton" title="Inicio">
            <i class="fas fa-home"></i><span>Inicio</span>
        </a>
    </li>

    <li class="item">
        <a href="#" class="menu-btn" id="perfilboton" title="Perfil">
            <i class="fas fa-user-circle"></i><span>Perfil</span>
        </a>
    </li>

    <li class="item">
        <a href="?pages=verusuarios" class="menu-btn fontusuarios" id="usuariosboton" title="Usuarios">
            <i class="fas fa-users"></i><span>Usuarios</span>
        </a>
    </li>

    <li class="item">
        <a href="#" class="menu-btn" id="bienesboton" title="Bienes">
            <i class="fas fa-boxes"></i><span>Bienes</span>
        </a>
    </li>

    <li class="item">
        <a href="#" class="menu-btn" id="declaracionboton" title="Declaración">
            <i class="fas fa-paste"></i><span>Declaración</span>
        </a>
    </li>

    <li class="item">
        <a href="#" class="menu-btn" id="graficosboton" title="Gráficos">
            <i class="fas fa-chart-bar"></i><span>Gráficos</span>
        </a>
    </li>

    <li class="item">
        <a href="#" class="menu-btn" id="ayudaboton" title="Ayuda">
            <i class="fas fa-question-circle"></i><span>Ayuda <i class="fas fa-chevron-down drop-down flecha" id="flecha"></i></span>
        </a>
        <div class="sub-menu" id="submenuayudabtn">
            <a href="#" title="Manual de Usuario"><i class="fas fa-address-book"></i><span>Manual de usuario</span></a>
            <a href="#" title="Ayuda en línea"><i class="fas fa-info-circle"></i></i><span>Ayuda en línea</span></a>
        </div>
    </li>
</ul>
            <!--?php 
            
            if ($usuarios->obtenernumrol() == 1) {
                
                include "vistas/include/botones/botonesadmin.php";
                
            }else if ($usuarios->obtenernumrol() == 2) {

                include "vistas/include/botones/botonesusuario.php";

            }else{

                include "vistas/include/botones/botonessinrol.php";

            }

            ?!-->
        </div>
    </div>
    <!--Sidebar Final-->
    <!--Main Container Inicio-->
   
    <!--Main Container Final-->
</div>
<!--Wrapper Final-->

