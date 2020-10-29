<ul>
    <li class="item">
        <a href="<?php echo constant('URL'); ?>" class="menu-btn" id="inicioboton" title="Inicio">
            <i class="fas fa-home"></i><span>Inicio</span>
        </a>
    </li>

    <li class="item">
        <a href="#" class="menu-btn" id="perfilboton" title="Perfil">
            <i class="fas fa-user-circle"></i><span>Perfil</span>
        </a>
    </li>

    <li class="item">
        <a href="<?php echo constant('URL'); ?>parametros/listar" class="menu-btn" id="perfilparametros" title="Perfil">
            <i class="fas fa-cogs"></i><span>Parámetros</span>
        </a>
    </li>

    <li class="item item-list">
        <a href="#" class="menu-btn" title="Ayuda">
            <i class="fas fa-paste"></i><span>Declaración <i class="fas fa-chevron-down drop-down flecha"></i></span>
        </a>
        <div class="sub-menu">
            <a href="<?php echo constant('URL'); ?>patrimonio/listar" title="Patrimonio"><i class="fas fa-sign"></i><span>Patrimonio</span></a>
            <a href="<?php echo constant('URL'); ?>rentatrabajo/listar" title="Rentas"><i class="fas fa-file-signature"></i><span>Renta de trabajo</span></a>
        </div>
    </li>

    <li class="item item-list">
        <a href="#" class="menu-btn" title="Ayuda">
            <i class="fas fa-question-circle"></i><span>Ayuda <i class="fas fa-chevron-down drop-down flecha"></i></span>
        </a>
        <div class="sub-menu">
            <a href="#" title="Manual de Usuario"><i class="fas fa-address-book"></i><span>Manual de usuario</span></a>
            <a href="#" title="Ayuda en línea"><i class="fas fa-info-circle"></i></i><span>Ayuda en línea</span></a>
        </div>
    </li>
</ul>