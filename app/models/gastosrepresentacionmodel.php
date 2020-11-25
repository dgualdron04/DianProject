
<?php 

class Gastosrepresentacionmodel extends Models{

    private $tablagastosrepresentacion = "gastosrepresentacion";

    public function crear($valor, $idrentaexenta){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablagastosrepresentacion.'(valor, idrentaexenta) VALUES (?,?)')) {

            $query->execute([$valor, $idrentaexenta]);

           /*  $iddeducciones = $connect->lastInsertId(); */
            
            return true;
        } else {

            return false;

        }

    }


}

?>