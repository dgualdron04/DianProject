<?php 


class Rentacapitalmodel extends Models{

    private $tablarentacapital = "rentacapital";

    public function crear($idcedulageneral){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablarentacapital.'(rentaliquida, rentasexentasdeduccion, rentaliquidaordinaria, rentaliquidacapital, idcedulageneral) VALUES (?,?,?,?,?)')) {

            $query->execute([0,0,0,0,$idcedulageneral]);

            $idrentacapital = $connect->lastInsertId();

            return $idrentacapital;

        } else {

            return false;

        }

    }


}


?>