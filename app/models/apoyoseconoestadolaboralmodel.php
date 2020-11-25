
<?php 

class Apoyoseconoestadolaboralmodel extends Models{

    private $tablaapoyoseconoestadolaboral = "apoyoseconoestadolaboral";

    public function crear($nombre, $valor, $idingresobrutolaboral){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablaapoyoseconoestadolaboral.'(nombre, valor, idingresobrutolaboral) VALUES (?,?,?)')) {

            $query->execute([$nombre, $valor, $idingresobrutolaboral]);

           /*  $iddeducciones = $connect->lastInsertId(); */
            
            return true;
        } else {

            return false;

        }

    }


}

?>