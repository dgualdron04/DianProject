<?php 


class Salariomodel extends Models{

    private $tablasalario = "salario";

    public function crear($nombre ,$meseslaborados, $valor, $idingresobruto){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablasalario.'(nombre, meseslaborados, valor, idingresobruto) VALUES (?,?,?,?)')) {

            $query->execute([$nombre,$meseslaborados,$valor, $idingresobruto]);
            
            return true;
        } else {

            return false;

        }

    }


}

?>

