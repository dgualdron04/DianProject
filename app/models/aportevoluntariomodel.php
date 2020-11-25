<?php 


class Aportevoluntariomodel extends Models{

    private $tablaaportevoluntario = "aportevoluntario";

    public function crear($nombre, $valor, $idingresonoconse, $idtipoaportevoluntario, $idrentaexenta){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablaaportevoluntario.'(nombre, valor, idingresonoconse, idtipoaportevoluntario, idrentaexenta) VALUES (?,?,?,?,?)')) {

            $query->execute([$nombre,$valor, $idingresonoconse, $idtipoaportevoluntario, $idrentaexenta]);

/*             $idsalario = $connect->lastInsertId(); */
            
            return true;
        } else {

            return false;

        }

    }


}

?>