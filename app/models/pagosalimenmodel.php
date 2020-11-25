
<?php 

class Pagosalimenmodel extends Models{

    private $tablapagosalimen = "pagosalimen";

    public function crear($nombre, $valor, $cantidadmeses, $idingresonoconse, $idtipopagoalimen){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablapagosalimen.'(nombre, cantidadmeses, valor, idingresonoconse, idtipopagoalimen) VALUES (?,?,?,?,?)')) {

            $query->execute([$nombre, $cantidadmeses, $valor, $idingresonoconse, $idtipopagoalimen]);

/*             $idsalario = $connect->lastInsertId(); */
            
            return true;
        } else {

            return false;

        }

    }


}

?>