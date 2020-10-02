
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
                <p><?php 
                $nombre = explode(' ', $infouser['nombre']);
                $apellido = explode(' ', $infouser['apellido']);
                echo $nombre[0].' '.$apellido[0]; ?></p>
                <p><?php echo $infouser['nomrol']; ?></p>
            </center>
            <?php 

            if (strtolower($infouser['nomrol']) == "superadmin") {
               
                include "./app/views/assets/includes/botones/botonessuperadmin.php";

            } else if (strtolower($infouser['nomrol']) == "coordinador") {
                
                include "./app/views/assets/includes/botones/botonescoordinador.php";
                
            }else if (strtolower($infouser['nomrol']) == "declarante") {

                include "./app/views/assets/includes/botones/botonesdeclarante.php";

            }else if (strtolower($infouser['nomrol']) == "contador") {
                # Aquí va el contador :)
                include "./app/views/assets/includes/botones/botonescontador.php";

            } else{

                include "./app/views/assets/includes/botones/botonessinrol.php";

            }

            ?>
        </div>
    </div>
    <!--Sidebar Final-->
    <!--Main Container Inicio-->
   
    <!--Main Container Final-->
</div>
<!--Wrapper Final-->

