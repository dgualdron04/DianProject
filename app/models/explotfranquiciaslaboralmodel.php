
<?php 

class Explotfranquiciaslaboralmodel extends Models{

    private $tablaexplotfranquiciaslaboral = "explotfranquiciaslaboral";

    public function crear($nombre, $valor, $idingresobrutolaboral){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablaexplotfranquiciaslaboral.'(nombre, valor, idingresobrutolaboral) VALUES (?,?,?)')) {

            $query->execute([$nombre, $valor, $idingresobrutolaboral]);

           /*  $iddeducciones = $connect->lastInsertId(); */
            
            return true;
        } else {

            return false;

        }

    }


}

?>