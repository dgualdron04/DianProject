
<?php 

class Seguromuertemodel extends Models{

    private $tablaseguromuerte = "seguromuerte";

    public function crear($valor, $idfuerzapublica){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablaseguromuerte.'(valor, idfuerzapublica) VALUES (?,?)')) {

            $query->execute([$valor, $idfuerzapublica]);

           /*  $iddeducciones = $connect->lastInsertId(); */
            
            return true;
        } else {

            return false;

        }

    }


}

?>