<?php 


class Honorariosmodel extends Models{

    private $tablashonorarios = "honorarios";

    public function crear($nombre, $valor, $idingresobruto){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablashonorarios.'(nombre, valor, idingresobruto) VALUES (?,?,?)')) {

            $query->execute([$nombre,$valor, $idingresobruto]);

/*             $idsalario = $connect->lastInsertId(); */
            
            return true;
        } else {

            return false;

        }

    }


}

?>
