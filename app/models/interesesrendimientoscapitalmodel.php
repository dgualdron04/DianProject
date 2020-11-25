
<?php 

class Interesesrendimientoscapitalmodel extends Models{

    private $tablainteresesrendimientoscapital = "interesesrendimientoscapital";

    public function crear($nombre, $valor, $idtipointeresesrendicapital, $idingresobrutocapital){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablainteresesrendimientoscapital.'(nombre, valor, idtipointeresesrendicapital, idingresobrutocapital) VALUES (?,?,?,?)')) {

            $query->execute([$nombre, $valor, $idtipointeresesrendicapital, $idingresobrutocapital]);

           /*  $iddeducciones = $connect->lastInsertId(); */
            
            return true;
        } else {

            return false;

        }

    }


}

?>