
<?php 

class Interesesprestamoscapitalmodel extends Models{

    private $tablainteresesprestamoscapital = "interesesprestamoscapital";

    public function crear($nombre, $valor, $idcostogastosprocecapital){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablainteresesprestamoscapital.'(nombre, valor, idcostogastosprocecapital) VALUES (?,?,?)')) {

            $query->execute([$nombre, $valor, $idcostogastosprocecapital]);

           /*  $iddeducciones = $connect->lastInsertId(); */
            
            return true;
        } else {

            return false;

        }

    }


}

?>