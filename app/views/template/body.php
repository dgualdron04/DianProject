<div class="fondo-container collapse" id="fondo-container">
    <div class="main-container">
        <div class="mybody">
        
        
        <?php
        

    if ($controllert == "usuario" && $methodt == "index") {
        
        require_once './app/views/inicio/index.php';

    }
        
    if (isset($infouser['nomrol'])) {

        if (strtolower($infouser['nomrol']) == "superadmin") {
            
            if (($controllert == "usuario" && $methodt == "listar") || ($controllert == "usuario" && $methodt == "perfil")) {

                require_once './app/views/'.$controllert.'/'.$methodt.'.php';

            }

        } else if (strtolower($infouser['nomrol']) == "coordinador") {
            
            if (($controllert == "usuario" && $methodt == "listar") || 
            ($controllert == "usuario" && $methodt == "perfil") || 
            ($controllert == "parametros" && $methodt == "listar") || 
            ($controllert == "patrimonio" && $methodt == "listar") || 
            ($controllert == "rentatrabajo" && $methodt == "listar") || 
            ($controllert == "declaracion" && $methodt == "listar") || 
            ($controllert == "declaracion" && $methodt == "crear")) {

                require_once './app/views/'.$controllert.'/'.$methodt.'.php';

            }

        } else if (strtolower($infouser['nomrol']) == "declarante") {
        
            if (($controllert == "declaracion" && $methodt == "listar") || ($controllert == "declaracion" && $methodt == "crear") || ($controllert == "usuario" && $methodt == "perfil")) {

                require_once './app/views/'.$controllert.'/'.$methodt.'.php';

            }

        } else if (strtolower($infouser['nomrol']) == "contador") {
            
            if (($controllert == "parametros" && $methodt == "listar") || ($controllert == "patrimonio" && $methodt == "listar") || ($controllert == "rentatrabajo" && $methodt == "listar")) {
                
                require_once './app/views/'.$controllert.'/'.$methodt.'.php';

            }

        } else{
            
            require_once './app/views/'.$controllert.'/'.$methodt.'.php';

        } 
        
    } else {

        ?>
        <script> document.title = "Inicio"; </script>
         <div class="card">
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero ratione ex non porro id consectetur repudiandae iure ea quasi quod possimus at deleniti inventore obcaecati perspiciatis ipsa, iste, magni, necessitatibus alias quae fugit molestiae reiciendis. Delectus optio facilis doloribus ducimus iusto suscipit asperiores eius inventore officia corporis, consequuntur sapiente. Modi.
                </p>
            </div>
            <div class="card">
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero ratione ex non porro id consectetur repudiandae iure ea quasi quod possimus at deleniti inventore obcaecati perspiciatis ipsa, iste, magni, necessitatibus alias quae fugit molestiae reiciendis. Delectus optio facilis doloribus ducimus iusto suscipit asperiores eius inventore officia corporis, consequuntur sapiente. Modi.
                </p>
            </div>
            <div class="card">
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero ratione ex non porro id consectetur repudiandae iure ea quasi quod possimus at deleniti inventore obcaecati perspiciatis ipsa, iste, magni, necessitatibus alias quae fugit molestiae reiciendis. Delectus optio facilis doloribus ducimus iusto suscipit asperiores eius inventore officia corporis, consequuntur sapiente. Modi.
                </p>
            </div>
            <?php }?>
        </div>
    </div>
</div>