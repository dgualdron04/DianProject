
<?php 

class Rentaexededuccioncapitalmodel extends Models{

    private $tablarentaexededuccioncapital = "rentaexededuccioncapital";

    public function crear($nombre, $valor, $idtiporentaexededuccioncapital){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablarentaexededuccioncapital.'(nombre, valor, idtiporentaexededuccioncapital) VALUES (?,?,?)')) {

            $query->execute([$nombre, $valor, $idtiporentaexededuccioncapital]);

            $idrentaexededuccioncapital = $connect->lastInsertId();
            
            return $idrentaexededuccioncapital;
        } else {

            return false;

        }

    }


}

?>