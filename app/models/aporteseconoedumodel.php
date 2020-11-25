
<?php 

class Aporteseconoedumodel extends Models{

    private $tablaaporteseconoedu = "aporteseconoedu";

    public function crear($nombre, $valor, $idingresonoconse){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablaaporteseconoedu.'(nombre, valor, idingresonoconse) VALUES (?,?,?)')) {

            $query->execute([$nombre,$valor, $idingresonoconse]);

/*             $idsalario = $connect->lastInsertId(); */
            
            return true;
        } else {

            return false;

        }

    }


}

?>