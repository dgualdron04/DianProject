
<?php 

class Aportevoluntariocapitalmodel extends Models{

    private $tablaaportevoluntariocapital = "aportevoluntariocapital";

    public function crear($nombre, $valor, $idtipoaportevoluntariocapital, $idingresonoconsecapital){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablaaportevoluntariocapital.'(nombre, valor, idtipoaportevoluntariocapital, idingresonoconsecapital) VALUES (?,?,?,?)')) {

            $query->execute([$nombre, $valor, $idtipoaportevoluntariocapital, $idingresonoconsecapital]);

           /*  $iddeducciones = $connect->lastInsertId(); */
            
            return true;
        } else {

            return false;

        }

    }


}

?>