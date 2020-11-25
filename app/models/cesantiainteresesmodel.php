<?php 


class Cesantiainteresesmodel extends Models{

    private $tablascesantiaintereses = "cesantiaintereses";

    public function crear($nombre, $valor, $idingresobruto, $idrentaexenta){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablascesantiaintereses.'(nombre, valor, idingresobruto, idrentaexenta) VALUES (?,?,?,?)')) {

            $query->execute([$nombre,$valor, $idingresobruto, $idrentaexenta]);

/*             $idsalario = $connect->lastInsertId(); */
            
            return true;
        } else {

            return false;

        }

    }


}

?>