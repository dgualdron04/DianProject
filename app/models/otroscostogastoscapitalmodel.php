
<?php 

class Otroscostogastoscapitalmodel extends Models{

    private $tablaotroscostogastoscapital = "otroscostogastoscapital";

    public function crear($nombre, $valor, $idcostogastosprocecapital, $idtipootroscostogastocapital){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablaotroscostogastoscapital.'(nombre, valor, idcostogastosprocecapital, idtipootroscostogastocapital) VALUES (?,?,?,?)')) {

            $query->execute([$nombre, $valor, $idcostogastosprocecapital, $idtipootroscostogastocapital]);

           /*  $iddeducciones = $connect->lastInsertId(); */
            
            return true;
        } else {

            return false;

        }

    }


}

?>