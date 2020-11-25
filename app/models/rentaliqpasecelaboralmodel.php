<?php 


class Rentaliqpasecelaboralmodel extends Models{

    private $tablarentaliqpasecelaboral = "rentaliqpasecelaboral";

    public function crear($valor){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablarentaliqpasecelaboral.'(valor) VALUES (?)')) {

            $query->execute([$valor]);

            $idrentaliqpasecelaboral = $connect->lastInsertId();

            return $idrentaliqpasecelaboral;

        } else {

            return false;

        }

    }

}

?>