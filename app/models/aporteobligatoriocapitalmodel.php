
<?php 

class Aporteobligatoriocapitalmodel extends Models{

    private $tablaaporteobligatoriocapital = "aporteobligatoriocapital";

    public function crear($nombre, $valor, $idtipoaporteobligatoriocapital, $idingresonoconsecapital){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablaaporteobligatoriocapital.'(nombre, valor, idtipoaporteobligatoriocapital, idingresonoconsecapital) VALUES (?,?,?,?)')) {

            $query->execute([$nombre, $valor, $idtipoaporteobligatoriocapital, $idingresonoconsecapital]);

           /*  $iddeducciones = $connect->lastInsertId(); */
            
            return true;
        } else {

            return false;

        }

    }


}

?>