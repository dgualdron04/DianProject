
<?php 

class Indemnizacionnolaboralmodel extends Models{

    private $tablaindemnizacionnolaboral = "indemnizacionnolaboral";

    public function crear($nombre, $valor, $idingresobrutolaboral){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablaindemnizacionnolaboral.'(nombre, valor, idingresobrutolaboral) VALUES (?,?,?)')) {

            $query->execute([$nombre, $valor, $idingresobrutolaboral]);

           /*  $iddeducciones = $connect->lastInsertId(); */
            
            return true;
        } else {

            return false;

        }

    }


}

?>