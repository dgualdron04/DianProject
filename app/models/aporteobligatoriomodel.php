<?php 


class Aporteobligatoriomodel extends Models{

    private $tablaaporteobligatorio = "aporteobligatorio";

    public function crear($nombre, $valor, $idingresonoconse, $idtipoaporteobligatorio){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablaaporteobligatorio.'(nombre, valor, idingresonoconse, idtipoaporteobligatorio) VALUES (?,?,?,?)')) {

            $query->execute([$nombre,$valor, $idingresonoconse, $idtipoaporteobligatorio]);

/*             $idsalario = $connect->lastInsertId(); */
            
            return true;
        } else {

            return false;

        }

    }


}

?>