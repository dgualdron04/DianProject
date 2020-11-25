
<?php 

class Rentaliqpasececapitalmodel extends Models{

    private $tablarentaliqpasececapital = "rentaliqpasececapital";

    public function crear($valor){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablarentaliqpasececapital.'(valor) VALUES (?)')) {

            $query->execute([$valor]);

            $idrentaliqpasececapital = $connect->lastInsertId();
            
            return $idrentaliqpasececapital;
        } else {

            return false;

        }

    }


}

?>