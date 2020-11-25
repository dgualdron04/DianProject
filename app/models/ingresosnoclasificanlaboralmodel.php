
<?php 

class Ingresosnoclasificanlaboralmodel extends Models{

    private $tablaingresosnoclasificanlaboral = "ingresosnoclasificanlaboral";

    public function crear($valor, $idingresobrutolaboral){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablaingresosnoclasificanlaboral.'(valor, idingresobrutolaboral) VALUES (?,?)')) {

            $query->execute([$valor, $idingresobrutolaboral]);

           /*  $iddeducciones = $connect->lastInsertId(); */
            
            return true;
        } else {

            return false;

        }

    }


}

?>