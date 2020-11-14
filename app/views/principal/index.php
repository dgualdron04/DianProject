<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Declaración de Renta</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo constant('URL').'public/css/principal/principal.css'?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
</head>

<body>

    <!--Wrapper Inicio-->

    <div class="wrapper collapse" id="wrapper">

        <!--Header Inicio-->
        <div class="header">
            <div class="header-menu">


                <div class="title">Declaración de Renta</div>
                <ul>
                    <li class="movilhov"><a href="#"><p>Inicio</p></a></li>
                    <li class="movilhov"><a href="#"><p>Quiénes Somos</p></a></li>
                    <li class="movilhov"><a href="#" class="cta"><p>Iniciar Sesión</p></a></li>
                    <li>
                        <div class="sidebar-btn bars-btn" id="bars">
                            <i class="fas fa-bars"></i>
                        </div>
                    </li>
                    <li>
                        <div class="sidebar-btn-cierre bars-btn" id="closebars">
                            <i class="fas fa-times"></i>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!--Header Final-->
            <!--Sidebar Inicio-->
    <div class="sidebar">
        <div class="sidebar-menu">
            <li class="item">
                <a href="#" class="menu-btn">
                <i class="fas fa-home"></i><span>Inicio</span>
                </a>
            </li>
            <li class="item">
                <a href="#" class="menu-btn">
                <i class="fas fa-user-friends"></i></i><span>Quienes Somos</span>
                </a>
            </li>
            <li class="item">
                <a href="#" class="menu-btn cta2">
                <i class="fas fa-sign-in-alt"></i></i><span>Iniciar Sesión</span>
                </a>
            </li>
        </div>
    </div>
    <!--Sidebar Final-->
    </div>
    <!--Wrapper Final-->

    <div class="content">

    <section class="mybackground">
        <center><img class="myfinance" src="<?php echo constant('URL').'public/images/finance.svg'?>" alt=""></center>
        <center><p class="h2 othermargins">¿Aún te preguntas si tienes que declarar Renta?</p></center>
        <center><p class="reset">Puedes hacer un Formulario para averiguarlo.</p>
        <div class="flex-2">
            <a href="#" class="btn btn-block btn-principal" id="formulario-btn">¿Debo declarar Renta?</a>
            <p class="reset">o</p>
            <a href="#" class="btn btn-block btn-principal" id="register-btn">Registrarme</a>   
        </div>
    </section>
    <section class="mywaves">
        <div class="wave wave1"></div>
        <div class="wave wave2"></div>
        <div class="wave wave3"></div>
        <div class="wave wave4"></div>
    </section>

    <section class="myothersection">
    
    </section>

    </div>

    <?php require_once './app/views/assets/includes/modals/principal/encuesta.php'; ?>
    <?php require_once './app/views/assets/includes/modals/principal/login.php'; ?>
    <?php require_once './app/views/assets/includes/modals/loading/loading.php'; ?>

    <footer>
        <p>Derechos Reservados 2020 © (Inserte nombre xde)</p>
    </footer>
    
<script src="<?php echo constant('URL').'app/views/assets/js/principal/principal.js'?>"></script>
<script src="<?php echo constant('URL').'app/views/assets/js/principal/modal.js'?>"></script>
</body>

</html>
