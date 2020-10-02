<script>
    document.title = "Lista de Usuarios";
</script>

<div class="content-header">
    <div class="fluid">
        <div class="fila">
            <div class="columna">
                <p class="h1">Lista de Usuarios</p>
            </div>
            <div class="columna">
                <ol class="historialpaginas float-derecha">
                    <li class="historialpaginas-item"><a href="./">Inicio</a></li>
                    <li class="historialpaginas-item activo">Lista de Usuarios</li>
                </ol>
            </div>
        </div>
    </div>

</div>

<div class="card" id="table-place">

</div>

</div>

<?php require_once './app/views/assets/includes/modals/usuario/crear.php'; ?>
<?php require_once './app/views/assets/includes/modals/usuario/editar.php'; ?>
<?php require_once './app/views/assets/includes/modals/usuario/eliminar.php'; ?>

<script src="<?php echo constant('URL') . 'app/views/assets/js/usuario/listar.js' ?>"></script>
<script src="<?php echo constant('URL').'app/views/assets/js/usuario/modal.js'?>"></script>