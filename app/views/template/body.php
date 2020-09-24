<div class="fondo-container collapse" id="fondo-container">
    <div class="main-container">
        <?php
        
        

        require_once './app/views/'.$data['controller'].'/'.$data['method'].'.php';

        /* if (isset($_GET["pages"])) {
            
            
            if ($usuarios->obtenernumrol() == 1) {
                
                if ($_GET["pages"] == "verusuarios") {
                    
                if (file_exists("vistas/pages/administrador/usuarios/" . $_GET["pages"] . ".php")) 
                  {
                      
                    include "vistas/pages/administrador/usuarios/" . $_GET["pages"] . ".php";
                  }
                  else
                  {
                    include "vistas/pages/errores/error404.php";
                  }
    
                } else {

                    include "vistas/pages/errores/error404.php";

                }

            }else if($usuarios->obtenernumrol() == 2){

                if ($_GET["pages"] == "none") {
                    
                    if (file_exists("vistas/pages/usuarios/" . $_GET["pages"] . ".php")) 
                    {
                        
                      include "vistas/pages/usuarios/" . $_GET["pages"] . ".php";
                    }
                    else
                    {
                      include "vistas/pages/errores/error404.php";
                    }

                } else {

                    include "vistas/pages/errores/error404.php";

                }

            } else {

                include "vistas/pages/errores/error404.php";

            }

        }else{ */
            

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
            <?php /* } */?>
    </div>
</div>