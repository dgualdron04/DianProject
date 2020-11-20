<ul>
    <li class="item">
        <a href="<?php echo constant('URL'); ?>declaracion/revision/<?php $fechas = getdate(); echo $fechas['year']-1; ?>" class="menu-btn" id="inicioboton" title="Inicio">
            <i class="fas fa-home"></i><span>Inicio</span>
        </a>
    </li>

    <li class="item">
        <a href="<?php echo constant('URL'); ?>parametros/listar" class="menu-btn" id="perfilparametros" title="Parámetros">
            <i class="fas fa-cogs"></i><span>Parámetros</span>
        </a>
    </li>

    <li class="item item-list">
        <a href="#" class="menu-btn" title="Declaración">
            <i class="fas fa-paste"></i><span>Declaración <i class="fas fa-chevron-down drop-down flecha"></i></span>
        </a>
        <div class="sub-menu">
        <a href="<?php echo constant('URL'); ?>informacionpersonal/listar" title="Información personal"><i class="far fa-address-card"></i><span>Información Personal</span></a>
            <a href="<?php echo constant('URL'); ?>patrimonio/listar" title="Patrimonio"><i class="fas fa-sign"></i><span>Patrimonio</span></a>
            <a href="<?php echo constant('URL'); ?>cedulas/listar" title="Cedulas"><i class="fas fa-file-signature"></i><span>Cédulas</span></a>
            <a href="<?php echo constant('URL'); ?>ganancias/listar" title="Ganancias Ocasionales"><i class="fas fa-comment-dollar"></i><span>Ganancias Ocasionales</span></a>
        </div>
    </li>

    <li class="item">
        <a href="<?php echo constant('URL'); ?>declaracion/revision/<?php $fechas = getdate(); echo $fechas['year']-1; ?>" class="menu-btn" id="revision" title="Revisión de declaraciones">
        <i class="fas fa-eye"></i><span>Revisión</span>
        </a>
    </li>

    <li class="item item-list">
        <a href="#" class="menu-btn" title="Ayuda">
            <i class="fas fa-question-circle"></i><span>Ayuda <i class="fas fa-chevron-down drop-down flecha"></i></span>
        </a>
        <div class="sub-menu">
            <a href="#" title="Manual de Usuario"><i class="fas fa-address-book"></i><span>Manual de usuario</span></a>
        </div>
    </li>
</ul>