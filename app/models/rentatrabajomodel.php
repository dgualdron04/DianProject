<?php 


class Rentatrabajomodel extends Models{

    private $tablarentatrabajo = "rentatrabajo";

    public function crear($idcedulageneral){
        $connect = $this->db->connect();

        if ($query = $connect->prepare('INSERT INTO '.$this->tablarentatrabajo.'(rentaliquida, rentasexentasdeduccion, rentaliquidatrabajo, idcedulageneral) VALUES (?,?,?,?)')) {

            $query->execute([0,0,0,$idcedulageneral]);

            return true;

        } else {

            return false;

        }

    }


}


?>