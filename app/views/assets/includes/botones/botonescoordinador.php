<ul>
    <li class="item">
        <a href="<?php echo constant('URL'); ?>" class="menu-btn" id="inicioboton" title="Inicio">
            <i class="fas fa-home"></i><span>Inicio</span>
        </a>
    </li>

    <li class="item">
        <a href="<?php echo constant('URL'); ?>usuario/perfil" class="menu-btn" id="perfilboton" title="Perfil">
            <i class="fas fa-user-circle"></i><span>Perfil</span>
        </a>
    </li>

    <li class="item">
        <a href="<?php echo constant('URL'); ?>usuario/listar" class="menu-btn fontusuarios" id="usuariosboton" title="Usuarios">
            <i class="fas fa-users"></i><span>Usuarios</span>
        </a>
    </li>

    <li class="item">
        <a href="<?php echo constant('URL'); ?>declaracion/listar/<?php echo $infouser['id']; ?>" class="menu-btn" id="declaracionboton" title="Declaración">
            <i class="fas fa-paste"></i><span>Declaración</span>
        </a>
    </li>

    <li class="item item-list">
        <a href="#" class="menu-btn" title="Ayuda">
            <i class="fas fa-paste"></i><span>Parametrización <i class="fas fa-chevron-down drop-down flecha"></i></span>
        </a>
        <div class="sub-menu ">
            <a href="<?php echo constant('URL'); ?>parametros/listar" title="Parámetros"><i class="fas fa-address-book"></i><span>Parámetros</span></a>
            
            <div class="item-list">
                <a href="#" class="sub-menu-btn" title="Ayuda">
                    <i class="fas fa-paste quitar-padding"></i><span>Declaración <i class="quitar-padding fas fa-chevron-down drop-down flecha"></i></span>
                </a>
                <div class="sub-menu">
                    <a href="<?php echo constant('URL'); ?>patrimonio/listar" title="Patrimonio"><i class="fas fa-sign"></i><span>Patrimonio</span></a>
                    <a href="<?php echo constant('URL'); ?>rentatrabajo/listar" title="Rentas"><i class="fas fa-file-signature"></i><span>Renta de trabajo</span></a>
                </div>
            </div>

        </div>
    </li>

    <li class="item item-list">
        <a href="#" class="menu-btn" title="Ayuda">
            <i class="fas fa-question-circle"></i><span>Ayuda <i class="fas fa-chevron-down drop-down flecha"></i></span>
        </a>
        <div class="sub-menu">
            <a href="<?php echo constant('URL'); ?>app/views/assets/manuales/manualcoordinador.pdf" title="Manual de Usuario"><i class="fas fa-address-book"></i><span>Manual de usuario</span></a>
        </div>
    </li>
</ul>



