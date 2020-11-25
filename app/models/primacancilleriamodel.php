
<?php 

class Primacancilleriamodel extends Models{

    private $tablaprimacancilleria = "primacancilleria";

    public function crear($valor, $idtipoprimacancilleria, $idrentaexenta){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablaprimacancilleria.'(valor, idtipoprimacancilleria, idrentaexenta) VALUES (?,?,?)')) {

            $query->execute([$valor, $idtipoprimacancilleria, $idrentaexenta]);

           /*  $iddeducciones = $connect->lastInsertId(); */
            
            return true;
        } else {

            return false;

        }

    }


}

?>