<?php 


class Prestasocialesmodel extends Models{

    private $tablasprestasociales = "prestasociales";

    public function crear($nombre, $valor, $idingresobruto, $idtipoprestacion){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablasprestasociales.'(nombre, valor, idingresobruto, idtipoprestacion) VALUES (?,?,?,?)')) {

            $query->execute([$nombre,$valor, $idingresobruto, $idtipoprestacion]);

/*             $idsalario = $connect->lastInsertId(); */
            
            return true;
        } else {

            return false;

        }

    }


}

?>