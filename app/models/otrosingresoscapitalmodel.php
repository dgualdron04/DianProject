
<?php 

class Otrosingresoscapitalmodel extends Models{

    private $tablaotrosingresoscapital = "otrosingresoscapital";

    public function crear($nombre, $valor, $idtipootrosingresoscapital, $idingresobrutocapital){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablaotrosingresoscapital.'(nombre, valor, idtipootrosingresoscapital, idingresobrutocapital) VALUES (?,?,?,?)')) {

            $query->execute([$nombre, $valor, $idtipootrosingresoscapital, $idingresobrutocapital]);

           /*  $iddeducciones = $connect->lastInsertId(); */
            
            return true;
        } else {

            return false;

        }

    }


}

?>